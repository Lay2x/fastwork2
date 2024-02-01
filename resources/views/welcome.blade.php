<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EPNWeb - Coming Soon Template">
    <meta name="keywords" content="Coming Soon Template, Creative , Creative Agency template, Creative, Agency, Parallax, parallax template, landing page, material design, Corporate, Coming Soon, Business">
    <meta name="author" content="webpuls.org">

    <title>EPNWeb - Coming Soon Template </title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="web/images/favicon.ico">
    <link rel="apple-touch-icon" href="web/images/apple-touch-icon.png">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="web/css/bootstrap.min.css">
    <!-- Font-awesome Min css -->
    <link rel="stylesheet" href="web/css/font-awesome.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="web/css/style.css">
    <!-- modernizr js -->
    <script src="web/js/modernizr-2.8.3.min.js"></script>
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style>
       
    </style>

</head>

<body>

    <div id="preloader">
        <div id="global">
            <div id="top" class="mask">
                <div class="plane"></div>
            </div>
            <div id="middle" class="mask">
                <div class="plane"></div>
            </div>
            <div id="bottom" class="mask">
                <div class="plane"></div>
            </div>
            <p><i>LOADING...</i></p>
        </div>
    </div>

    <div class="wrap main-bg table-div">
        <div class="view-box d-cell">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3 position">
                        <div class="logo">
                            <a href="index.html"><img class="gambar-responsif" src="web/images/logo-1.png" alt="" /></a>
                        </div>
                        <div class="social-box-bot clearfix">
                            <ul>

                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Follow On Google Plus"><i class="fa fa-envelope"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Follow On Instagram"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="top" title="Follow On Youtube"><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-9">
                        <div class="main-content">
                            <div class="countdown main-time clearfix">
                                <div id="timer">
                                    <div id="days"></div>
                                    <div id="hours"></div>
                                    <div id="minutes"></div>
                                    <div id="seconds"></div>
                                </div>
                            </div>

                            <div class="md-headline clearfix">
                                <h1> Seminar Website <a href="http://roberth.my-style.in/" target="_blank">Portfgrammer</a></h1>
                                <p>Aplikasi Pendaftaran Seminar Online adalah aplikasi yang bergerak di bidang manajerial data, khususnya yang berkaitan dengan pendaftaran acara seminar online. Sistem informasi ini sangat canggih dan banyak menarik minat karena dapat digunakan dua arah, yaitu oleh panitia atau admin, dan calon peserta seminar online.</p>
                            </div>

                            <div class="btn-box">
                                <a href="#" class="btn notify-btn">Tentang Sistem</a>
                                <a href="#" class="btn more-infobtn" data-toggle="modal" data-target="#exampleModalCenter">Info pendaftaran</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="scrollbar-right" class="right-box wh-bg">
            <div class="close-icon">
                <img src="web/images/close.png" alt="Close" />
            </div>
            <div class="box-inner">
                <div class="about-box">
                    <div class="about-title">
                        <h1>We are EPNWeb</h1>
                    </div>
                    <div class="row about-content clearfix">
                        <div class="col-lg-4 pull-left">
                            <img src="web/images/about-img.png" alt="" />
                        </div>
                        <div class="col-lg-7 rihgt-dit">
                            <h3>Since 2024</h3>
                            <a href="https://themewagon.com/">{{$konf->instansi_setting}}</a>
                            <p>{{$konf->tentang_setting}}</p>
                        </div>
                    </div>
                </div>

                <div class="contact-box">
                    <div class="contact-title">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="content-ct">
                        <ul class="clearfix">
                            <li>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$konf->alamat_setting}}</p>
                            </li>
                            <li><a href="mailto:{{$konf->email_setting}}"><span><i class="fa fa-envelope"></i></span> {{$konf->email_setting}}</a></li>
                            <li><a href="tel:{{$konf->no_hp_setting}}"><span><i class="fa fa-phone" aria-hidden="true"></i> </span> {{$konf->no_hp_setting}}</a></li>
                        </ul>
                        <div class="contact-form">
                            <iframe class="w-100 rounded" src="{{ $konf->maps_setting }}" frameborder="0" style="min-height: 300px; border:0;"></iframe>
                        </div>
                    </div>
                </div>

                <div class="copyright">
                    <p class="footer-company-name">All Rights Reserved. 2024 &copy; <a href="#">{{$konf->instansi_setting}}</a> | Design by <a href="http://robertjh.mu-style.in/">Portfgrammer</a></p>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-scale" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Information </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="web/images/close.png" alt="Close" />
                    </button>
                </div>
                <div class="modal-body">
                    <p>Silahkan Melakukan Login/ Register Untuk Proses Pendaftaran <br>
                        <center> <a href="{{url('login')}}">
                                <h3><span class="badge badge-success">Login</span></h3>
                            </a>
                    </p>
                    </center>

                </div>
            </div>
        </div>
    </div>

    <!-- All JS Here -->
    <!-- jQuery Latest Version -->
    <script src="web/js/jquery.min.js"></script>
    <!-- Popper min JS -->
    <script src="web/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="web/js/bootstrap.min.js"></script>
    <!-- Prognroll JS -->
    <script src="web/js/avoid.js"></script>
    <!-- Prognroll JS -->
    <script src="web/js/prognroll.js"></script>
    <!-- Form Validate -->
    <script src="web/js/jquery.validate.min.js"></script>
    <!-- main JS -->
    <script src="web/js/main.js"></script>
    <script>
        /*
Countdown Clock
------------------------------ */
        function makeTimer() {
            var endTime = new Date("{{$daftar->tanggal_kegiatan}} {{$daftar->jam_kegiatan}} GMT+01:00");
            endTime = (Date.parse(endTime) / 1000);

            var now = new Date();
            now = (Date.parse(now) / 1000);

            var timeLeft = endTime - now;

            var days = Math.floor(timeLeft / 86400);
            var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
            var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
            var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }

            $("#days").html(days + "<h6>Hari</h6>");
            $("#hours").html(hours + "<h6>Jam</h6>");
            $("#minutes").html(minutes + "<h6>Menit</h6>");
            $("#seconds").html(seconds + "<h6>Detik</h6>");
        }
        setInterval(function() {
            makeTimer();
        }, 1000);
    </script>

</body>

</html>