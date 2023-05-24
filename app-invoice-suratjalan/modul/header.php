<?php  
    // include 'modul/function.php';

    // $id = $_GET['Id'];
?>
<script type="text/javascript" language="JavaScript">
    function konfirmasi(){
        tanya = confirm("Logout?");
        if (tanya == true) return true;
        else return false;
    }
</script>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" style="font-family: tahoma;" href="#">Aran Multimedia</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
    <!-- Navbar-->

    <ul class="navbar-nav ml-auto ml-md-0" style="margin-right: 0px;">
        <a href="javascript:window.history.go(-1);">
            <button class="btn btn-secondary btn-sm" style="width: 100px;">
                <div class="fas fa-arrow-circle-left"></div>    
            </button>
        </a>
    </ul>
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="?x=user_setting&Id=<?= $id ?>">Account Setting</a> -->
                <!-- <div class="dropdown-divider"></div> -->
                <a onclick='return konfirmasi()' class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
    </ul>

</nav>