<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        $room = Room::all();
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            if($usertype == 'user')
            {
                return view('home.index', compact('room'));
            }else if($usertype == 'admin')
            {
                return view('admin.index');
            }else{
                return redirect()->back();
            }
        }
    }

    public function admin(){
        return view('admin.index');
    }
    
    public function home()
    {
        $room = Room::all();
        return view('home.index', compact('room'));
    }
    public function halaman_tambah_kamar()
    {
        return view('admin.halaman_tambah_kamar');
    }
    public function tambah_kamar(Request $request)
    {
        $data = new Room;
        $data -> nama_kamar = $request -> kamar;
        $data -> deskripsi = $request -> desk;
        $data -> harga = $request -> harga;
        $data -> type_kamar = $request -> type;
        $data -> wifi = $request -> wifi;
        $gambar = $request -> gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar-> move('room', $gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();
        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan');
    }

    public function data_kamar(){
        $data = Room::all();
        return view('admin.data_kamar', compact('data'));
    }
    
    public function halaman_update_kamar($id){
        $data = Room::find($id);
        return view('admin.halaman_update_kamar', compact('data'));
    }

    public function update_kamar(Request $request, $id)
    {
        $data =  Room::find($id);
        $data -> nama_kamar = $request -> kamar;
        $data -> deskripsi = $request -> desk;
        $data -> harga = $request -> harga;
        $data -> type_kamar = $request -> type;
        $data -> wifi = $request -> wifi;
        $gambar = $request -> gambar;
        if($gambar)
        {
            $gambarnama=time().'.'.$gambar->getClientOriginalExtension();
            $request->gambar-> move('room', $gambarnama);
            $data -> gambar = $gambarnama;
        }
        $data->save();
        return redirect('data_kamar')->with('success', 'Kamar berhasil diupdate');
    }

    public function delete_kamar($id)
    {
        $data =  Room::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Kamar berhasil dihapus');
    }

    public function data_booking_kamar()
    {
        $data = Booking::all();
        return view('admin.data_booking_kamar', compact('data'));
    }

    public function halaman_update_booking($id){
        $data = Booking::find($id);
        return view('admin.halaman_update_booking', compact('data'));
    }
    public function update_booking(Request $request, $id)
    {
        $data =  Booking::find($id);
        $data->room_id = $request->id;
        $data->nama = $request->nama;
        $data->email = $request->email;
        $data->telepon = $request->telepon;
        $data->status = $request->status;
        $data->check_in = $request->check_in;
        $data->check_out = $request->check_out;
        $data->save();
        return redirect('data_booking_kamar')->with('success', 'Booking kamar berhasil diupdate');
    }

    public function delete_booking($id)
    {
        $data =  Booking::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Booking kamar berhasil dihapus');
    }
}