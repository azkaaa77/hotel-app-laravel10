<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Invoice Booking Hotel - {{ $booking->nama ?? 'Tamu' }}</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body class="main-layout">
      <div class="loader_bg">
           <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#"/></div>
      </div>
      @include('home.header')

      <div class="invoice_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="card p-4 shadow-sm">
                     <div class="row mb-4 align-items-center">
                        <div class="col-sm-6">
                           <h2 class="mb-0">Invoice Booking Hotel</h2>
                           <p class="text-muted">#BOOK-{{ $booking->id ?? 'N/A' }}-{{ date('Ymd') }}</p> <p class="text-muted">Tanggal Cetak: {{ date('d M Y') }}</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                           <img src="{{ asset('images/logo.png') }}" alt="Hotel Logo" style="max-width: 150px;">
                        </div>
                     </div>

                     <hr class="my-4">

                     <div class="row mb-4">
                        <div class="col-md-6 mb-3 mb-md-0">
                           <h5 class="mb-2">Dari:</h5>
                           <address>
                              <strong>Nama Hotel Anda</strong><br>
                              Alamat Hotel Anda, Jalan Contoh No. 123<br>
                              Sumedang, West Java, Indonesia, 45311<br>
                              Email: reservation@yourhotel.com<br>
                              Telepon: (022) 123-4567
                           </address>
                        </div>
                        <div class="col-md-6 text-md-end">
                           <h5 class="mb-2">Untuk:</h5>
                           <address>
                              {{-- Mengambil data dari objek $booking --}}
                              <strong>{{ $booking->nama ?? 'Nama Tamu Tidak Diketahui' }}</strong><br>
                              Email: {{ $booking->email ?? 'email.tamu@example.com' }}<br>
                              Telepon: {{ $booking->telepon ?? '(+62) XXX-XXX-XXXX' }}
                           </address>
                        </div>
                     </div>

                     <h5 class="mb-3">Detail Pemesanan:</h5>
                     <div class="row mb-4">
                        <div class="col-md-6">
                           <p class="mb-1"><strong>Nomor Konfirmasi:</strong> #CONF-{{ $booking->id ?? 'N/A' }}</p>
                           <p class="mb-1"><strong>Tipe Kamar:</strong> {{ $booking->room->type_kamar ?? 'Tipe Kamar Tidak Ditemukan' }}</p>
                           <p class="mb-1"><strong>Jumlah Kamar:</strong> 1</p> {{-- Sesuaikan jika ada kolom jumlah_kamar di booking --}}
                           <p class="mb-1"><strong>Jumlah Tamu:</strong> 2 Dewasa, 0 Anak-anak</p> {{-- Sesuaikan jika ada kolom jumlah_tamu di booking --}}
                        </div>
                        <div class="col-md-6 text-md-end">
                           <p class="mb-1"><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</p>
                           <p class="mb-1"><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</p>
                           <p class="mb-1"><strong>Jumlah Malam:</strong> {{ $jumlahMalam }} Malam</p> {{-- Menggunakan variabel dari controller --}}
                        </div>
                     </div>

                     <h5 class="mb-3">Rincian Biaya:</h5>
                     <div class="table-responsive mb-4">
                        <table class="table table-bordered table-striped">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Deskripsi</th>
                                 <th class="text-center">Kuantitas</th>
                                 <th class="text-end">Harga Satuan</th>
                                 <th class="text-end">Total</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>Sewa Kamar {{ $booking->room->type_kamar ?? 'N/A' }}</td>
                                 <td class="text-center">{{ $jumlahMalam }} Malam</td>
                                 <td class="text-end">Rp {{ number_format($booking->room->harga ?? 0, 0, ',', '.') }}</td>
                                 <td class="text-end">Rp {{ number_format(($booking->room->harga ?? 0) * $jumlahMalam, 0, ',', '.') }}</td>
                              </tr>
                              {{-- Jika ada layanan tambahan yang disimpan di DB, Anda bisa loop di sini --}}
                              {{-- @foreach($booking->additionalServices as $service)
                              <tr>
                                 <td>{{ $loop->iteration + 1 }}</td>
                                 <td>{{ $service->name }}</td>
                                 <td class="text-center">{{ $service->quantity }}</td>
                                 <td class="text-end">Rp {{ number_format($service->price, 0, ',', '.') }}</td>
                                 <td class="text-end">Rp {{ number_format($service->total, 0, ',', '.') }}</td>
                              </tr>
                              @endforeach --}}
                           </tbody>
                           <tfoot>
                              {{-- Asumsi perhitungan total dilakukan di controller atau diisi dari DB Booking --}}
                              @php
                                  // Contoh perhitungan sederhana di view jika belum ada di DB/Controller
                                  $hargaKamarTotal = ($booking->room->harga ?? 0) * $jumlahMalam;
                                  $subtotalLayanan = 300000; // Contoh statis sarapan
                                  $subtotal = $hargaKamarTotal + $subtotalLayanan;
                                  $pajak = $subtotal * 0.10; // 10%
                                  $totalTagihan = $subtotal + $pajak;
                              @endphp

                              <tr>
                                 <th colspan="4" class="text-end">Subtotal:</th>
                                 <td class="text-end">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                              </tr>
                              <tr>
                                 <th colspan="4" class="text-end">Pajak Hotel (10%):</th>
                                 <td class="text-end">Rp {{ number_format($pajak, 0, ',', '.') }}</td>
                              </tr>
                              <tr>
                                 <th colspan="4" class="text-end">Diskon:</th>
                                 <td class="text-end">Rp 0</td>
                              </tr>
                              <tr class="table-active">
                                 <th colspan="4" class="text-end h4 mb-0">Total Tagihan:</th>
                                 <td class="text-end h4 mb-0">Rp {{ number_format($totalTagihan, 0, ',', '.') }}</td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>

                     <div class="row">
                        <div class="col-md-12">
                           <h5 class="mb-2">Catatan Pembayaran:</h5>
                           <p class="text-muted">Pembayaran harap dilakukan paling lambat tanggal **{{ \Carbon\Carbon::parse($booking->check_in)->addDays(7)->format('d M Y') }}**. <br> Terima kasih atas pemesanan Anda di Hotel Kami!</p>
                           <p class="text-muted mt-3">Metode Pembayaran: Transfer Bank (BCA: 1234567890 an. Hotel ABC)</p>
                        </div>
                     </div>

                     <div class="row mt-4">
                         <div class="col-md-12 text-center">
                             <button onclick="window.print()" class="btn btn-primary me-2"><i class="fa fa-print"></i> Cetak Invoice</button>
                             <a href="#" class="btn btn-success"><i class="fa fa-download"></i> Unduh PDF</a>
                         </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
      @include('home.footer')
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
   </body>
</html>