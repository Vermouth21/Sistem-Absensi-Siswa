<?php
session_start();
// session_destroy();
if (empty($_SESSION['user'])) {
    echo "<script>
    window.location.href='login.php';
    </script>";
}
?>


<?php include 'config/koneksi.php'; ?>
<?php include 'config/function.php'; ?>
<?php include 'components/header.php'; ?>
<?php include 'components/navbar.php'; ?>
<?php include 'components/sidebar.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php include 'content.php'; ?>
    </section>
</div>

<?php include 'components/footer.php'; ?>
<?php include 'components/script.php'; ?>