<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Detail Kamar - {{ $room->nama_kamar ?? 'Kamar Hotel' }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <style>
        /* CSS Kustom untuk Skema Warna Merah & Grey Tua */
        :root {
            --bs-primary: #8B0000; /* Merah Tua / Maroon */
            --bs-primary-rgb: 139, 0, 0;
            --bs-secondary: #343a40; /* Abu-abu Tua / Charcoal */
            --bs-secondary-rgb: 52, 58, 64;
            --bs-dark: #212529; /* Hampir hitam */
            --bs-light: #f8f9fa; /* Abu-abu sangat terang */
            --bs-success: #28a745; /* Tetap hijau untuk sukses */
            --bs-danger: #dc3545; /* Tetap merah standar untuk bahaya/error */
        }

        body {
            background-color: var(--bs-light); /* Latar belakang body dengan warna terang */
        }
        .our_room {
            background: #ffffff; /* Latar belakang bagian konten utama, putih bersih agar kontras */
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-top: 30px;
        }
        .titlepage h2 {
            color: var(--bs-dark); /* Judul utama lebih gelap */
            font-weight: 700;
        }
        .titlepage p {
            color: var(--bs-secondary); /* Paragraf dengan grey tua */
        }
        .room-card {
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .room-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .room-details h3 {
            color: var(--bs-dark); /* Judul kamar lebih gelap */
        }
        .room-details p {
            color: var(--bs-secondary); /* Deskripsi kamar dengan grey tua */
        }
        .room-features h4 {
            color: var(--bs-secondary); /* Fitur kamar dengan grey tua */
        }
        .room-price h3 {
            color: var(--bs-primary); /* Harga dengan warna merah dominan */
            font-weight: 700;
        }
        .room-price .fs-5.text-muted {
            color: var(--bs-secondary) !important; /* "per malam" dengan grey tua */
        }
        .booking-form-section {
            background: #f0f3f5; /* Latar belakang form yang sedikit berbeda dari putih */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .booking-form-section h1 {
            color: var(--bs-dark); /* Judul form lebih gelap */
        }
        .form-group label {
            color: var(--bs-secondary); /* Label form dengan grey tua */
        }
        /* Mengubah warna tombol utama dan tombol sukses */
        .btn-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
        }
        .btn-primary:hover {
            background-color: #A52A2A; /* Sedikit lebih terang dari maroon saat hover */
            border-color: #A52A2A;
        }
        .btn-success { /* Untuk tombol "Lihat Invoice" */
            background-color: var(--bs-primary); /* Menggunakan warna merah dominan */
            border-color: var(--bs-primary);
        }
        .btn-success:hover {
            background-color: #A52A2A; /* Sedikit lebih terang dari maroon saat hover */
            border-color: #A52A2A;
        }
        .text-primary {
            color: var(--bs-primary) !important; /* Memastikan text-primary mengikuti warna kustom */
        }
    </style>
</head>

<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
    </div>
    @include('home.header')

    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="display-4 fw-bold text-dark">Detail Kamar Kami</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">Temukan kenyamanan terbaik dalam setiap pilihan kamar kami, dirancang untuk pengalaman menginap tak terlupakan.</p>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center"> 
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="card shadow-lg h-100 border-0 rounded-4 overflow-hidden">
                    <img src="{{ asset('room/' . $room->gambar) }}" class="card-img-top img-fluid" alt="{{ $room->nama_kamar }}" style="height: 400px; object-fit: cover;">
                    <div class="card-body p-4">
                        <h3 class="card-title h2 fw-bold text-dark mb-3">{{ $room->nama_kamar ?? 'Nama Kamar' }}</h3>
                        <p class="card-text text-muted mb-4">{{ $room->deskripsi ?? 'Deskripsi kamar ini belum tersedia.' }}</p>
                        <div class="row g-3 mb-4">
                            <div class="col-sm-6">
                                <p class="card-text text-dark fw-semibold"><i class="fa fa-wifi text-primary me-2"></i> Free Wifi: {{ $room->wifi ?? 'Tidak Tersedia' }}</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="card-text text-dark fw-semibold"><i class="fa fa-bed text-primary me-2"></i> Tipe Kamar: {{ $room->type_kamar ?? 'Standard' }}</p>
                            </div>
                            @if($room->kapasitas)
                            <div class="col-sm-6">
                                <p class="card-text text-dark fw-semibold"><i class="fa fa-users text-primary me-2"></i> Kapasitas: {{ $room->kapasitas }} orang</p>
                            </div>
                            @endif
                        </div>
                        <div class="border-top pt-3 mt-3">
                            <h3 class="h1 fw-bold text-primary text-end">Rp {{ number_format($room->harga ?? 0, 0, ',', '.') }} <span class="fs-5 text-muted">/ malam</span></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow-lg h-100 border-0 rounded-4">
                    <div class="card-body p-4">
                        <h1 class="card-title text-center h3 fw-bold text-dark mb-4">Booking Kamar</h1>

                        @if (session()->has('massage'))
                        <div class="alert alert-{{ Str::contains(session('massage'), 'berhasil') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
                            {{ session()->get('massage') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form action="{{ url('booking_kamar', $room->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control form-control-lg" id="nama_lengkap" 
                                    placeholder="Masukkan nama lengkap Anda" @if(Auth::id()) value="{{Auth::user()->name }}" readonly @endif>
                            </div>
                            <div class="mb-3">
                                <label for="email_user" class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email_user"
                                    placeholder="contoh@domain.com" @if(Auth::id()) value="{{Auth::user()->email }}" readonly @endif>
                            </div>
                            <div class="mb-3">
                                <label for="telepon_user" class="form-label fw-semibold">No. Telepon</label>
                                <input type="number" name="telepon" class="form-control form-control-lg" id="telepon_user"
                                    placeholder="Contoh: 081234567890" @if(Auth::id()) value="{{Auth::user()->phone }}" readonly @endif>
                            </div>
                            <div class="mb-3">
                                <label for="check_in" class="form-label fw-semibold">Check In</label>
                                <input type="date" name="check_in" class="form-control form-control-lg" id="check_in">
                            </div>
                            <div class="mb-4">
                                <label for="check_out" class="form-label fw-semibold">Check Out</label>
                                <input type="date" name="check_out" class="form-control form-control-lg" id="check_out">
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary btn-lg fw-bold" value="Pesan Kamar Sekarang">
                            </div>
                        </form>

                        @if (session()->has('booking_id_for_invoice'))
                            <div class="d-grid mt-3">
                                <a type="button" class="btn btn-success btn-lg fw-bold" 
                                   href="{{ route('invoice.show', session('booking_id_for_invoice')) }}">
                                    <i class="fa fa-file-text-o me-2"></i> Lihat Invoice Booking Anda
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script> 
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            // Mengatur min date untuk check_in (tidak boleh di masa lalu)
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10) month = '0' + month.toString();
            if (day < 10) day = '0' + day.toString();
            var minCheckInDate = year + '-' + month + '-' + day;
            $('#check_in').attr('min', minCheckInDate);

            // Mengatur min date untuk check_out (minimal sehari setelah check_in)
            $('#check_in').on('change', function() {
                var checkInVal = $(this).val();
                if (checkInVal) {
                    var checkInDate = new Date(checkInVal);
                    checkInDate.setDate(checkInDate.getDate() + 1); // Check-out minimal sehari setelah check-in
                    
                    var minCheckOutMonth = checkInDate.getMonth() + 1;
                    var minCheckOutDay = checkInDate.getDate();
                    var minCheckOutYear = checkInDate.getFullYear();

                    if (minCheckOutMonth < 10) minCheckOutMonth = '0' + minCheckOutMonth.toString();
                    if (minCheckOutDay < 10) minCheckOutDay = '0' + minCheckOutDay.toString();
                    
                    var minCheckOutDate = minCheckOutYear + '-' + minCheckOutMonth + '-' + minCheckOutDay;
                    $('#check_out').attr('min', minCheckOutDate);

                    // Jika check_out yang sudah dipilih kurang dari minCheckOutDate baru, kosongkan
                    if ($('#check_out').val() < minCheckOutDate) {
                        $('#check_out').val('');
                    }
                } else {
                    // Jika check_in kosong, atur min date check_out kembali ke hari ini
                    $('#check_out').attr('min', minCheckInDate);
                }
            });
            // Atur min date check_out saat halaman dimuat (jika check_in sudah ada nilai default)
            $('#check_in').trigger('change');
        });
    </script>
</body>

</html>