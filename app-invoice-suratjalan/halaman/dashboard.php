<?php  
    include "modul/function.php";
    // $id = $_GET['Id'];
    // $x = query("SELECT * FROM user WHERE username = '$id' ")[0];
?>

<div class="col-md-12" style="margin-top: 24px;">
    <br><br><br><br><br><br><br><br><br>
    <!-- <img src="img/logo_login.png" class="img-fluid mx-auto d-block" alt="Responsive image" style="width: 200px;"> -->
    <?php  
        $tanggal= mktime(date("m"),date("d"),date("Y"));
        date_default_timezone_set('Asia/Jakarta');
        $jam=date("H:i a");
    ?>
    <p class="text-center"><?= date("l, d/M/Y", $tanggal) ?>, <?= $jam ?></p>
    <h3 class="text-center" style="margin-top: -17px;">Selamat datang, <!-- <?= $x['nama_lengkap'] ?> --> Administrator.</h3>
    <p class="text-center" style="margin-top: -20px;">________________</p>
</div>