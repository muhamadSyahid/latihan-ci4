<!DOCTYPE html>
<html lang="en">
<head>
    <title>Website SMA XYZ</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .container { width: 800px; margin: 0 auto; border: 1px solid #000; }
        .header, .footer { padding: 15px; border-bottom: 1px solid #000; }
        .footer { border-top: 1px solid #000; border-bottom: none; }
        .menu { border-bottom: 1px solid #000; padding: 10px; text-align: left; }
        .menu a { margin-right: 20px; text-decoration: none; }
        .content { padding: 30px; min-height: 200px; }
        table { margin: 0 auto; border-collapse: collapse; }
        table, th, td { border: 1px solid black; padding: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h2>WEBSITE SMA XYZ</h2>
        </div>

        <!-- Menu -->
        <div class="menu">
            <a href="#">Home</a>
            <a href="/berita">Berita</a>
            <a href="<?= base_url('/mahasiswa') ?>">Data Mahasiswa</a>
            <a href="<?= base_url('/logout') ?>">Logout</a>
        </div>

        <!-- Konten -->
        <div class="content">
            <?php
            echo view('mahasiswa/show_all', $mahasiswa);
            // if ($page == 'home') {
            //     include "home.php";
            // } elseif ($page == 'mhsw') {
            //     include "mhsw.php";
            // } elseif ($page == 'detail') {
            //     include "mhsw_detail.php";
            // } else {
            //     echo "<h3>Halaman tidak ditemukan</h3>";
            // }
            ?>
        </div>

        <!-- Footer -->
        <div class="footer">
            <b>Bandung - Jawa Barat</b>
        </div>
    </div>
</body>
</html>