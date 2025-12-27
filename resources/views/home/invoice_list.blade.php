<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Invoice Pemesanan</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- Load aset lainnya dengan asset() --}}
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
</head>
<body>
    @include('home.header')

    <div class="container py-5">
        <h1 class="mb-4">Daftar Invoice Pemesanan Anda</h1>

        @if ($bookings->isEmpty())
            <p class="alert alert-info">Belum ada pemesanan invoice yang ditemukan.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No. Invoice</th>
                            <th>Nama Tamu</th>
                            <th>Tipe Kamar</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th class="text-end">Total Biaya</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>#BOOK-{{ $booking->id }}</td>
                                <td>{{ $booking->nama ?? ($booking->user->name ?? 'N/A') }}</td>
                                <td>{{ $booking->room->type_kamar ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                                {{-- Untuk total, idealnya simpan di kolom total_amount di tabel bookings --}}
                                <td class="text-end">
                                    Rp {{ number_format(($booking->room->harga ?? 0) * (\Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out))), 0, ',', '.') }}
                                </td>
                                <td>
                                    <a href="{{ route('invoice.show', $booking->id) }}" class="btn btn-sm btn-info">Lihat Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    @include('home.footer')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- Load script lainnya dengan asset() --}}
</body>
</html>