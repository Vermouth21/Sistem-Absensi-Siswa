<?php
session_start();
// var_dump($_SESSION);
if (!empty($_SESSION['user'])) {
    echo "<script>
    window.location.href='index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Absensi Sekolah</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="bower_components/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="bower_components/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">SMP Kartika 1-7 Padang</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Deskripsi Sistem</a>
                    </li>
                    <!--  <li class="page-scroll">
                        <a href="#portfolio">Layanan Sistem</a>
                    </li> -->
                    <li>
                        <a href="halamanLogin.php">Log In</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="dist/img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">Sistem Absensi Sekolah</span>
                        <hr class="star-light">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>DESKRIPSI SISTEM</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row text-justify">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Sistem informasi absensi digunakan untuk membantu proses kerja guru dan staf tata usaha sekolah (khususnya SMP) dalam menangani data absensi siswa yang masih dilakukan secara manual. Semua data di dalam sistem informasi absensi ini telah saling terintegrasi sehingga dapat dengan mudah digunakan.</p>
                </div>
                <div class="col-lg-4">
                    <p>Secara umum, Sistem Informasi Absensi ini mengandung tiga layanan atau fungsi utama yaitu proses pengaturan jadwal pelajaran, proses absensi dan proses rekap absensi. Selain itu, ada dua pihak yang dapat menjalankan sistem ini yang terdiri dari pihak admin dan pihak guru.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div>
                    <div class="row">
                        <div class="footer-col col-md-12 text-center">
                            <h3>Location</h3>
                            <p>SMP Kartika 1-7 Padang</p>
                            <p>Jl. Dr. Sutomo No. 4C, Simpang Haru, Kec. Padang Timur</p>
                            <p>Padang 25143</p>
                            <p>Telp. 0751-841885</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Gilang Alam Patria 2020
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>




    <!-- jQuery -->
    <script type="text/javascript" src="bower_components/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src="bower_components/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
</body>

</html>