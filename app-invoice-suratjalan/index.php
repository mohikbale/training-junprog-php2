<?php 
    session_start();

        // cek apakah yang mengakses halaman ini sudah login
        if($_SESSION['level']==""){
            header("location:login.php");
        }

?>

<html lang="en">
    <head>
        <title>Data Hasil Lokasi - Aran Multimedia</title>
        <link href="skin/style_bootstrap.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <!-- Header --> <?php include "modul/header.php"; ?> <!-- End Header -->
        
        <!-- Content -->
        <div id="layoutSidenav">
            <!-- Sidebar-Menu --> <?php include "modul/sidebar_menu.php"; ?> <!-- End Sidebar-Menu -->

            <!-- Sidebar-Content -->
            <div id="layoutSidenav_content">
                <div class="container-fluid">
                    <?php
                        if(isset($_GET['x'])){
                            include "halaman/$_GET[x].php";
                        }else{

                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- End Sidebar-Content -->


        <!-- Javascript --> <?php include "modul/source_js.php"; ?> <!-- End -->
        <script src="js/scripts.js"></script>
    </body>
</html>
