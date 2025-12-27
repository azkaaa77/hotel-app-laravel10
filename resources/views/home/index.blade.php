<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Hotel</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    @include('home.header')
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main" id="home">
        <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="images/banner1.jpg" alt="First slide">
                    <div class="container">
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="images/banner2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="images/banner3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="booking_ocline">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="book_room">
                            <h1>Book a Room Online</h1>
                            <form class="book_now">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>Arrival</span>
                                        <img class="date_cua" src="images/date.png">
                                        <input class="online_book" placeholder="dd/mm/yyyy" type="date"
                                            name="dd/mm/yyyy">
                                    </div>
                                    <div class="col-md-12">
                                        <span>Departure</span>
                                        <img class="date_cua" src="images/date.png">
                                        <input class="online_book" placeholder="dd/mm/yyyy" type="date"
                                            name="dd/mm/yyyy">
                                    </div>
                                    <div class="col-md-12 text-center my-3">
                                        <a href="#room" type="button"
                                            class="btn btn-primary btn-lg book_btn d-inline-block">Book Now</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    <!-- about -->
    <div class="about" id="about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="titlepage">
                        <h2>About Us</h2>
                        <p>The passage experienced a surge in popularity during the 1960s when Letraset used it on their
                            dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with
                            their software. Today it's seen all around the web; on templates, websites, and stock
                            designs. Use our generator to get your own, or read on for the authoritative history of
                            lorem ipsum. </p>
                        <a class="read_more" href="Javascript:void(0)"> Read More</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about_img">
                        <figure><img src="images/about.png" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->
    <!-- our_room -->
    <div class="our_room" id="room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($room as $kamar)
                    <div class="col-md-4 col-sm-6">
                        <div id="serv_hover" class="room">
                            <div class="room_img">
                                <figure><img style="height: 200; width: 320;" src="room/{{ $kamar->gambar }}"
                                        alt="#" /></figure>
                            </div>
                            <div class="bed_room">
                                <h3>{{ $kamar->nama_kamar }}</h3>
                                <p>{{ Str::limit($kamar->deskripsi, 100) }} </p>
                                <a class="btn btn-outline-info justify-content-center mt-2"
                                    href="{{ url('detail_kamar', $kamar->id) }}">Detail Kamar</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                <a type="button" class="btn btn-danger" href="{{ route('invoice.list') }}">Invoice</a>
            </div>
        </div>
        <!-- end our_room -->
        <!-- gallery -->
        <div class="gallery" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>gallery</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery1.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery2.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery3.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery4.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery5.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery6.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery7.jpg" alt="#" /></figure>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="gallery_img">
                            <figure><img src="images/gallery8.jpg" alt="#" /></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end gallery -->
        <!-- blog -->
        <div class="blog" id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Blog</h2>
                            <p>Lorem Ipsum available, but the majority have suffered </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_img">
                                <figure><img src="images/blog1.jpg" alt="#" /></figure>
                            </div>
                            <div class="blog_room">
                                <h3>Bed Room</h3>
                                <span>The standard chunk </span>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                    anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf
                                    you are </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_img">
                                <figure><img src="images/blog2.jpg" alt="#" /></figure>
                            </div>
                            <div class="blog_room">
                                <h3>Bed Room</h3>
                                <span>The standard chunk </span>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                    anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf
                                    you are </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_box">
                            <div class="blog_img">
                                <figure><img src="images/blog3.jpg" alt="#" /></figure>
                            </div>
                            <div class="blog_room">
                                <h3>Bed Room</h3>
                                <span>The standard chunk </span>
                                <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                    anything embarrassing hidden in the middle of text. All the Lorem Ipsum generatorsIf
                                    you are </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end blog -->
        <!--  contact -->
        <div class="contact" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h2>Contact Us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form id="request" class="main_form">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <input class="contactus" placeholder="Name" type="type" name="Name">
                                </div>
                                <div class="col-md-12">
                                    <input class="contactus" placeholder="Email" type="type" name="Email">
                                </div>
                                <div class="col-md-12">
                                    <input class="contactus" placeholder="Phone Number" type="type"
                                        name="Phone Number">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="textarea" placeholder="Message" type="type" Message="Name">Message</textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="send_btn">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="map_main">
                            <div class="map-responsive">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63354.24060314575!2d107.67170469191718!3d-7.051515345298184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c1b1efbe8a69%3A0x401e8f1fc28c670!2sCiparay%2C%20Kec.%20Ciparay%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1752395994927!5m2!1sid!2sid"
                                    width="600" height="400" frameborder="0" style="border:0; width: 100%;"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end contact -->
        <!--  footer -->
        @include('home.footer')
        <!-- end footer -->
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <!-- sidebar -->
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/custom.js"></script>
</body>

</html>
