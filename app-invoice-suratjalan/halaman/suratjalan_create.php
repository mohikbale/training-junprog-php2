<?php
require "modul/function.php";
    // $ids = $_GET['Ids'];
    // $id = $_GET['Id'];

	$query = mysqli_query($conn, "SELECT MAX(no_suratjalan) as kode_terbesar FROM surat_jalan");
	$data = mysqli_fetch_array($query);
	$no_suratjalan = $data['kode_terbesar'];
	// $urutan = (int) substr($no_invoice, 3, 3);
	$no_suratjalan++;

    if(isset($_POST["submit"])){
        //cek apakah data berhasil ditambahkan atau tidak?
        if(suratjalan_create($_POST) > 0){
            echo "
                <script>
                    document.location.href = '?x=suratjalan_barang&Id=$no_suratjalan';
                </script>
            ";
        }else{
            echo "
                <script>
                    document.location.href = '?x=suratjalan_create';
                </script>
            ";
        }
    }
?>

<html lang="en">
    <head>
        <title>Data Hasil Lokasi - Aran Multimedia</title>
    </head>

    <body>
        <form action="" method="POST" class="offset-md-2 col-md-8 border border-secondary rounded mt-5 shadow-sm">
        	<div class="form-group col-md-12 text-center">
            	<h2 class="page-header mt-4">Tambah Data Surat Jalan</h2>
                <ol class="breadcrumb mb-3">
                    <li class="breadcrumb-item active"><a href="?x=invoice_list">Data Surat Jalan</a></li>
                    <li class="breadcrumb-item active">Tambah Data Surat Jalan</li>
                </ol>
        	</div>
            <div class="form-row col-md-12">
                <div class="offset-md-1 col-md-2">
                    <div class="form-group">
                    	<?php  
					        $tanggal= mktime(date("m"),date("d"),date("Y"));
					        date_default_timezone_set('Asia/Jakarta');
					        $jam=date("H:i a");
					        $tahun = date("Y", $tanggal);

					        $bln = date('n');
							$bulan = getRomawi($bln);

							$query = mysqli_query($conn, "SELECT MAX(no_suratjalan) as kode_terbesar FROM surat_jalan");
							$data = mysqli_fetch_array($query);
							$no_suratjalan = $data['kode_terbesar'];
							// $urutan = (int) substr($no_invoice, 3, 3);
							$no_suratjalan++;
							$suratjalan = sprintf("%03s", $no_suratjalan);
					    ?>
					    <!-- value="<?= $no_invoice ?>/AM/<?= $bulan ?>/<?= $tahun ?>"? -->
					    
                        <label class="small mb-1"">No. Surat Jalan</label> <br>
                        <input class="form-control py-3" type="text" name="no_suratjalan" value="<?= $suratjalan ?>" readonly/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Tanggal</label>
                        <input class="form-control py-3" id="inputLastName" type="date" name="tgl" cursor="pointer" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="small mb-1" for="inputLastName">Nama Customer</label>
                        <input class="form-control py-3" id="inputLastName" type="text" name="nama_customer" placeholder="Nama Customer" style="text-transform: capitalize" autocomplete="off" required/>
                    </div>
                </div>
            </div>
            <div class="form-row col-md-12" style="margin-top: -7px; margin-bottom: 7px;">
                <div class="offset-md-1 col-md-10">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Alamat Lengkap</label>
                        <input class="form-control py-3" id="inputFirstName" type="text" name="alamat_customer" placeholder="Alamat Lengkap" autocomplete="off" style="text-transform: capitalize" required/>
                    </div>
                </div>
            </div>
       		<div class="form-row col-md-12 mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" name="submit">Lanjutkan</button>
                    </div>
				</div>
            </div>
        </form>
        <!-- End Sidebar-Content -->
        <!-- <script src="../js/scripts.js"></script> -->
    </body>
</html>
