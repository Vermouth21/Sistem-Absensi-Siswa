<?php
// mengaktifkan session
session_start();
unset($_SESSION['logged_in']);

// menghapus semua session
if (session_destroy()) {
    echo "<script>
    alert('Anda Telah Berhasil Logout');
    window.location.href='login.php';
    </script>";
}

// mengalihkan halaman sambil mengirim pesan logout
