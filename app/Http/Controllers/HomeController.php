<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function detail_kamar($id)
    {
        $room = Room::find($id);

        if (!$room) {
            abort(404, 'Kamar tidak ditemukan.');
        }

        return view('home.detail_kamar', compact('room'));
    }

    public function booking_kamar(Request $request, $id)
    {
        $room = Room::find($id);
        if (!$room) {
            return redirect()->back()->with('massage', 'Kamar tidak ditemukan.');
        }

        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
        ], [
            'check_in.required' => 'Tanggal Check In harus diisi.',
            'check_in.date' => 'Tanggal Check In harus berupa tanggal yang valid.',
            'check_in.after_or_equal' => 'Tanggal Check In tidak boleh di masa lalu.',
            'check_out.required' => 'Tanggal Check Out harus diisi.',
            'check_out.date' => 'Tanggal Check Out harus berupa tanggal yang valid.',
            'check_out.after' => 'Tanggal Check Out harus setelah tanggal Check In.',
        ]);

        $isBooked = Booking::where('room_id', $id)
            ->where(function($query) use ($request) {
                $query->where('check_in', '<=', $request->check_out)
                      ->where('check_out', '>=', $request->check_in);
            })
            ->exists();

        if ($isBooked) {
            return redirect()->back()->with('massage', 'Kamar sudah dibooking ditanggal tersebut.');
        } else {
            $data = new Booking;
            $data->room_id = $id;

            if (Auth::check()) {
                $data->user_id = Auth::id();
                $data->nama = Auth::user()->name;
                $data->email = Auth::user()->email;
                $data->telepon = Auth::user()->phone ?? $request->telepon;
            } else {
                $data->nama = $request->nama;
                $data->email = $request->email;
                $data->telepon = $request->telepon;
            }

            $data->check_in = $request->check_in;
            $data->check_out = $request->check_out;
            $data->status = 'pending';
            $data->save();

            return redirect()->back()->with([
                'massage' => 'Kamar berhasil dipesan! Silakan klik tombol "Lihat Invoice Booking" di bawah.',
                'booking_id_for_invoice' => $data->id
            ]);
        }
    }

    public function listInvoices()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $bookings = Booking::where('user_id', Auth::id())
                            ->with('room', 'user')
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('home.invoice_list', compact('bookings'));
    }

    public function invoice($id)
    {
        $booking = Booking::with(['room', 'user'])->find($id);

        if (!$booking) {
            abort(404, 'Invoice untuk pemesanan ini tidak ditemukan.');
        }

        if (Auth::check() && $booking->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk melihat invoice ini.');
        } elseif (!Auth::check() && $booking->user_id) {
            return redirect()->route('login')->with('error', 'Anda perlu login untuk melihat invoice ini.');
        }

        $checkIn = Carbon::parse($booking->check_in);
        $checkOut = Carbon::parse($booking->check_out);
        $jumlahMalam = $checkIn->diffInDays($checkOut);

        return view('home.invoice', compact('booking', 'jumlahMalam'));
    }
}