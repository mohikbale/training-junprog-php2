<?php
require "modul/function.php";
    // $ids = $_GET['Ids'];
    $id = $_GET['Id'];
    // echo $id;

    if(isset($_POST["tambah"])){
        //cek apakah data berhasil ditambahkan atau tidak?
        if(invoice_barang_create($_POST) > 0){
            echo "
                <script>
                    document.location.href = '?x=invoice_barang&Id=$id';

                </script>
            ";
        }else{
            echo "
                <script>
                alert('GAGAL!');
                    document.location.href = '?x=invoice_barang&Id=$id';
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
    	<div class="col-md-12">
        <form action="" method="POST" class="d-print-none" style="padding: 0 35px;">
        	<input type="hidden" name="no_invoice" value="<?= $id ?>">
        	<input type="hidden" name="IdBarang" value="">
        	<div class="form-group col-md-12 text-center d-print-none">
            	<h2 class="page-header mt-3" style="font-size: 30px;">Tambah Data Barang</h2>
                <ol class="breadcrumb mb-1" style="height: 40px; line-height: 13px">
                    <li class="breadcrumb-item active"><a href="?x=invoice_list">Data Invoice</a></li>
                    <li class="breadcrumb-item active"><a href="?x=invoice_update&Id=<?= $id ?>">Edit Data Customer</a></li>
                    <li class="breadcrumb-item active">Tambah Data Barang</li>
                </ol>
        	</div>
            <div class="form-row col-md-12" style="margin-top: -5px;">
                <div class="offset-md-1 col-md-4">
                    <div class="form-group">
                        <label class="small mb-1">Nama Barang</label> <br>
                        <input class="form-control py-3 text-capitalize" type="text" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="small mb-1">Harga Satuan (Rp.)</label>
                        <input class="form-control py-3" type="number" name="harga_satuan" placeholder="Harga Satuan (Rp.)" autocomplete="off" required />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="small mb-1">Qty</label>
                        <input class="form-control py-3" type="number" name="qty" placeholder="Qty" autocomplete="off" required/>
                    </div>
                </div>
            </div>
       		<div class="form-row col-md-12">
				<div class="col-md-4">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" name="tambah" style="height: 32px;font-family: tahoma; font-size: 14px;line-height: 10px;">
                        	<div class="fas fa-plus-circle"></div> Tambah Barang </button>
                    </div>
				</div>
                <div class="col-md-4">
                    <div class="form-group">
                        <button class="btn btn-success btn-block" name="payment" data-toggle="modal" data-target="#uangMuka"
                        style="height: 32px;font-family: tahoma; font-size: 14px;line-height: 10px;">
                        	<div class="fas fa-check-circle"></div> Uang Muka / DP </button>
                    </div>
				</div>
				<div class="col-md-2">
                    <div class="form-group">
                        <a href="#" onClick='window.print();return false' style="text-decoration: none;">
                        	<button class="btn btn-warning btn-block" style="height: 32px;font-family: tahoma; font-size: 14px;line-height: 10px;">
                        	<div class="fas fa-print"></div> Invoice</button></a>
                    </div>
				</div>
        </form>
                <div class="col-md-2">
                    <div class="form-group">
                        <a href="?x=suratjalan_barang&Id=<?= $id ?>" style="text-decoration: none;">
                            <button type="button" class="btn btn-danger btn-block" name="suratjalan" style="height: 32px;font-family: tahoma; font-size: 14px;line-height: 10px;">
                            <div class="fas fa-print"></div> Surat Jalan</button></a>
                    </div>
                </div>
            </div>
        <!-- ----------------------------------------- -->

<div class="col-md-12" style="padding: 5px 30px;">
        <div class="col-md-12 mb-2 mt-1	d-none d-print-block" style="padding: 0 25px;">
        	<div class="col-md-12 text-capitalize d-print-none" style="line-height: 8px; padding: 0;font-size: 13px;margin-bottom: 8px;">
        		<?php
        			$id = $_GET['Id']; 
        			$data = query("SELECT Id_Invoice, no_invoice, tgl, MONTH(tgl) as bulan, YEAR(tgl) as tanggal, nama_customer, alamat_customer FROM invoice WHERE no_invoice = '$id'"); ?>
        		<?php foreach ($data as $x) : ?>
					<?php 
				        $bln = $x['bulan'];
						$bulan = getRomawi($bln);

						$invoice = sprintf("%03s", $id);
					?>	        		
	        		<label style="font-weight: bold;">Data Customer : </label><br>
	        		<label><?= $invoice ?>/AM/<?= $bulan ?>/<?= $x['tanggal'] ?> ~ <?= tgl_indo($x['tgl']); ?></label><br>
	        		<label><?= $x['nama_customer'] ?>, </label><label>&nbsp;<?= $x['alamat_customer'] ?></label>
        	</div>
        	
        	<div class="col-md-12 text-center" style="font-family: tahoma; font-size: 18px">=== INVOICE ===</div>
        	<div class="col-md-12 text-center" style="font-family: tahoma; font-size: 13px; letter-spacing: 1px; margin-top: -7px;">
        		NOMOR : <?= $invoice ?>/AM/<?= $bulan ?>/<?= $x['tanggal'] ?></div>
        	<div class="form-row">
	        	<div class="col-md-6">
	        		<div class="col-md-12" style="font-family: tahoma; font-size: 25px; letter-spacing: 2px; padding-left: 0;">ARAN MULTIMEDIA</div>
	        		<div class="col-md-12" style="font-family: tahoma; font-size: 11px; letter-spacing: 1px; padding-left: 0; margin-top: -8px;">
	        			SUPPLIER ALAT ARENA BERMAIN, PART & KONSULTAN
	        		</div>
	        		<div class="col-md-12" style="padding-left: 0; margin-top: -19px;">
	        			_________________
	        		</div>
	        		<div class="col-md-12 text-uppercase" style="font-family: tahoma; font-size: 10px; padding-left: 0; margin-top: -2px;line-height: 11px;">
	        			Jl. Bandaasri, Perum. Bandaasri Blok D2 No. 9, 10, 11<br>
	        			Des. Bandaasri Kec. Cangkuang, Kab. Bandung<br>
	        			<div class="form-row">
		        			<div class="col-md-3" style=""><div class="fas fa-phone-square"></div> PHONE /WA</div>
		        			<div class="col-md-6" style="margin-left: -38px">: 0821-1540-4007</div>
	        			</div>
	        			<div class="form-row">
		        			<div class="col-md-3" style=""><div class="fas fa-envelope"></div> E-MAIL</div>
		        			<div class="col-md-6" style="margin-left: -38px;">: ARANMULTIMEDIA@GMAIL.COM</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-md-6">
	        		<img src="img/logo_login.png" style="width: 290px; float: right; margin-right: 0px; margin-top: 0px;">
	        	</div>
        	</div>
        	<hr style="border: 1px solid #343a40; margin-top: 10px;">
        	<div class="form-row">
	        	<div class="col-md-7 text-uppercase" style="font-family: tahoma; font-size: 10px; padding-left: 0; margin-top: -15px;height:63px;line-height: 11px; padding: 9px">
	        		*Keterangan : <br>
	        		&nbsp; - Barang yang sudah dibeli tidak dapat ditukar / dikembalikan; <br>
	        		&nbsp; - Garansi 6 Minggu <i class="text-capitalize">(Barang Baru)</i>; <br>
	        		&nbsp; - Garansi 1 Minggu <i class="text-capitalize">(Barang Second)</i>; 
	        	</div>
	        	<div class="col-md-4 text-uppercase bg-dark text-light" style="font-family: tahoma; font-size: 10px; padding-left: 0; margin-top: -15px;height:63px;line-height: 11px; padding: 9px; margin-left: 74px;">
	        		<p>Kepada YTH,</p><br>	
	        		<p style="margin-top:-23px;font-size: 16px; text-transform: uppercase; text-indent: 11px;"><?= $x['nama_customer'] ?></p>
	        		<p style="margin-top:-11px;font-size: 13px; text-transform: uppercase; text-indent: 11px;"><?= $x['alamat_customer'] ?></p>
	        	</div>
        	</div>
        		<?php endforeach; ?>
        </div>
        <div class="col-md-12">
        	<hr class="d-print-none" style="margin-top: -15px;">
            <div class="col-md-12">
            	<div class="col-md-12 text-capitalize d-print-none" style="line-height: 8px; padding: 0;font-size: 13px;margin-bottom: 8px;">
            		<?php
            			$id = $_GET['Id']; 
            			$data = query("SELECT Id_Invoice, no_invoice, tgl, MONTH(tgl) as bulan, YEAR(tgl) as tanggal, nama_customer, alamat_customer FROM invoice WHERE no_invoice = '$id'"); ?>
            		<?php foreach ($data as $x) : ?>
						<?php 
					        $bln = $x['bulan'];
							$bulan = getRomawi($bln);

							$invoice = sprintf("%03s", $id);
						?>	        		
		        		<label style="font-weight: bold;">Data Customer : </label><br>
		        		<label><?= $invoice ?>/INV-AM/<?= $bulan ?>/<?= $x['tanggal'] ?> ~ <?= tgl_indo($x['tgl']); ?></label><br>
		        		<label><?= $x['nama_customer'] ?>, </label><label>&nbsp;<?= $x['alamat_customer'] ?></label>
            		<?php endforeach; ?>
            	</div>
            
            <div class="col-md-12 text-center bg-dark text-light" 
            style="font-family: tahoma; font-size:13px; height:25px; line-height: 22px;">
            	<label class="text-center font-weight-bold">Data Barang</label>
			</div>
            
            <table class="table table-sm" style="font-family: tahoma; font-size: 13px;">
			  	<thead>
				    <tr>
				      <th style="width: 3%;">#</th>
				      <th style="width: 30%;">Nama Barang</th>
				      <th style="width: 21%;">Harga Satuan</th>
				      <th style="width: 10%;text-align: center;">Qty</th>
				      <th style="width: 21%;text-align: right">Total</th>
				      <th style="width: 6%;text-align: center;">#</th>
				    </tr>
			  	</thead>

			  	<tbody>
				  	<?php $i = 1; ?>
				  	<?php $data2 = query("SELECT * FROM data_barang WHERE no_invoice = $id"); ?>
				  	<?php foreach ($data2 as $x) : ?>
					    <tr class="text-capitalize">
					      	<th><?= $i ?>.</th>
					      	<td><?= $x['nama_barang']; ?></td>
					      	<td>Rp<?= number_format($x['harga_satuan']); ?></td>
					      	<td style="text-align: center;"><?= $x['qty']; ?></td>
					      	<td style="text-align: right">Rp<?= number_format($x['total']); ?></td>
					      	<td style="font-size: 15px; text-align: center;">
					      		<!-- <abbr title="Hapus Counter"> -->
                                    <a href="?x=barang_delete&Idm=<?= $x['IdBarang'] ?>&Id=<?= $id ?>">
										<div class="fas fa-times-circle d-print-none"></div>
                                    </a>
                                <!-- </abbr> -->
      						</td>
					    </tr>
					<?php $i++; endforeach; ?>
			  	</tbody>
			</table>

			<?php $total = query("SELECT SUM(total) as jumlah FROM data_barang WHERE no_invoice = $id"); ?>
			<?php foreach ($total as $x) : ?>
				<div class="col-md-12" style="margin: -15px 0 10px 0;border-top: 2px solid #ddd;font-family: tahoma; font-size: 12px;font-weight: bold;">
					<div class="form-row" style="margin-top:2px;line-height: 20px;font-size: 15px;margin-right: -50px;">
						<div class="offset-md-6 col-md-3 text-right" style="margin-right: -97px;">TOTAL</div>
						<div class="col-md-3 text-right">Rp<?= number_format($x['jumlah']); ?></div>
					</div>
				</div>

			<?php $dp = query("SELECT * FROM data_barang_dp WHERE no_invoice = '$id'"); ?>
			<?php foreach ($dp as $d) : ?>
				<div class="col-md-12" style="margin: -10px 0 10px 0;font-family: tahoma; font-size: 12px;font-weight: bold;">
					<div class="form-row" style="line-height: 20px;margin-right: -50px;">
						<div class="offset-md-6 col-md-3 text-right" style="margin-right: -97px;">UANG MUKA/DP</div>
						<div class="col-md-3 text-right">Rp<?= number_format($d['uang_muka']); ?></div>
					</div>
				</div>
				<?php $uang_total = $x['jumlah']; $dp = $d['uang_muka']; $sisa = $uang_total - $dp; ?>
				<div class="col-md-12 mb-3" style="margin: -13px 0 10px 0;font-family: tahoma; font-size: 12px;font-weight: bold;">
					<div class="form-row" style="line-height: 20px;margin-right: -50px;">
						<div class="offset-md-6 col-md-3 text-right" style="margin-right: -97px;">SISA</div>
						<div class="col-md-3 text-right">Rp<?= number_format($sisa); ?></div>
					</div>
				</div>
				<div class="col-md-7 text-light" style="margin-left: 30px;left: -30px;
border-top: 45px solid #343a40;border-left: 40px solid transparent; margin-top: -61px">
					<div class="col-md-12 text-capitalize" style="font-family: tahoma; font-size: 16px; padding: 0px 0px;margin-top: -35px;">Terbilang : #<?= terbilang($x['jumlah']); ?> Rupiah#</div>
				</div>
			<?php endforeach; ?>
			<?php endforeach; ?>
			<hr style="border: 1px solid #343a40;">
			
			<?php $tgl = query("SELECT * FROM invoice WHERE no_invoice = '$id'")[0]; ?>
				<div class="offset-md-9 col-md-3 d-none d-print-block" style="font-family: tahoma; font-size: 12px; margin-top: 30px;">
					Bandung, <?= tgl_indo($tgl['tgl']); ?>
				</div>
				<div class="offset-md-9 col-md-3 d-none d-print-block" style="font-family: tahoma; font-size: 12px; margin-top: -3px;">
					Hormat kami,
				</div>
				<div class="offset-md-9 col-md-3 d-none d-print-block" style="font-family: tahoma; font-size: 12px;">
					<img src="img/logo_login.png" style="width: 180px; margin: 7px 0 7px -30px; opacity: 0.4">
				</div>
				<div class="offset-md-9 col-md-3 mb-4 d-none d-print-block" style="font-weight: bold;font-family: tahoma; font-size: 12px;">
					Agung Hendi Permana
				</div>
				<hr class="d-none d-print-block" style="border: 1px dashed #343a40; margin-top: 60px;">
			
			</div>
			</div>
        </div>
        </div>
    </body>
</html>

<?php
    $id = $_GET["Id"];

    if(isset($_POST["dp"])){
        //cek apakah data berhasil ditambahkan atau tidak?
        if(uang_muka_create($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambah.');
                    document.location.href = '?x=invoice_barang&Id=$id';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal ditambah.');
                    document.location.href = '?x=invoice_barang&Id=$id';
                </script>
            ";
        }
    }
?>

<div class="modal fade" id="uangMuka" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-warning">
            <h5 class="modal-title" id="exampleModalLabel">Uang Muka /DP</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" class="mr-2 ml-2">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-group">
                        	<input type="hidden" name="no_invoice" value="<?= $id ?>">
                            <label class="small mb-1" for="inputFirstName">Uang Muka /DP</label> <br>
                            <input type="number" name="uang_muka" class="form-control border" placeholder="Uang Muka /DP">
                        </div>
                    </div>
                </div></div>
                <div class="modal-footer" style="margin-top: -20px;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="dp" class="btn btn-warning">Tambah Data</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------ -->
<!-- ------------------------------ End Modal ------------------------------- -->
<!-- ------------------------------------------------------------------------ -->


 
 
<!-- 	$angka = 1530093;
	echo terbilang($angka); -->