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
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Halaman Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/atlantis.min.css">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
    <div class="main-header bg-primary2">
        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 offset-3">
                                <div class="card bg-default">
                                    <div class="card-header text-center">
                                        <div class="card-title">Login</div>
                                        <div class="card-title">Sistem Absensi Sekolah</div>
                                    </div>
                                    <div id="hasil">
                                        <form action="aksiLogin.php" method="POST" autocomplete="off" id="login_form" name="login_form">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus>
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user-alt"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="password" class="form-control myinput" name="pass" placeholder="Password" id="pass" style="display: none;">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="mybutton" onclick="change()" style="display: none;"><i class="fas fa-eye-slash"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-md btn-primary btn-block" name="login" type="submit" id="login" style="display: none;">Login</button>
                                                        <!-- <button class="btn btn-md btn-primary btn-block" name="kembali" type="submit" id="kembali" style="display: none;">Kembali</button> -->
                                                        <div id="error" style="margin-top: 10px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Atlantis JS -->
    <script src="assets/js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo2.js"></script>
    <script type="text/javascript">
        function change() {
            var x = document.getElementById('pass').type;

            if (x == 'password') {
                document.getElementById('pass').type = 'text';
                document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye"></i>';
            } else {
                document.getElementById('pass').type = 'password';
                document.getElementById('mybutton').innerHTML = '<i class="fas fa-eye-slash"></i>';
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#username").keyup(function() {
                $("#pass").slideDown();
                $('#mybutton').fadeIn();
            });
            $("#pass").keyup(function() {
                $("#login").slideDown();
                // $("#kembali").slideDown();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#login").click(function() {
                var aksilogin = $("#login_form").attr('action');
                var datalogin = {
                    username: $("#username").val(),
                    pass: $("#pass").val()

                };

                $.ajax({
                    type: "POST",
                    url: aksilogin,
                    data: datalogin,
                    success: function(aksi) {
                        if (aksi == '1')
                            $("#login_form").slideUp('slow', function() {
                                $("#hasil").html("<p class='berhasil' align='center'>Anda Berhasil Login<br>Halaman akan dialihkan dalam 2 detik...<meta http-equiv='refresh' content='2; url=index.php'></p>");
                            });
                        else
                            $("#login_form").slideUp('slow', function() {
                                $("#hasil").html("<p class='gagal' align='center'>Username atau Password salah...!!! <br> <a onClick=buka(); style='cursor:pointer;'>Ulangi Lagi<a></p>");
                            });

                        document.login_form.username.value = "";
                        document.login_form.pass.value = "";
                    }
                });

                return false;
            });
        });

        function buka() {
            $('#login_form').slideDown();
        }
    </script>
</body>

</html>