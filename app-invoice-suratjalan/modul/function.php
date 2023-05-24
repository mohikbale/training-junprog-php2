<?php 
include "modul/config.php"; 
?>

<?php
function getRomawi($bln){
                switch ($bln){
                    case 1: 
                        return "I";
                        break;
                    case 2:
                        return "II";
                        break;
                    case 3:
                        return "III";
                        break;
                    case 4:
                        return "IV";
                        break;
                    case 5:
                        return "V";
                        break;
                    case 6:
                        return "VI";
                        break;
                    case 7:
                        return "VII";
                        break;
                    case 8:
                        return "VIII";
                        break;
                    case 9:
                        return "IX";
                        break;
                    case 10:
                        return "X";
                        break;
                    case 11:
                        return "XI";
                        break;
                    case 12:
                        return "XII";
                        break;
                }
}
?>

<?php  
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
?>

<?php
	function user_update($data){
		global $conn;

		$IdUser		= htmlspecialchars($data['IdUser']);
		$nama_lengkap = htmlspecialchars($data['nama_user']);
		$username	= htmlspecialchars($data['username']);
		$password	= htmlspecialchars($data['password']);
		$level		= htmlspecialchars($data['level']);

		$query = "UPDATE user SET
					nama_lengkap= '$nama_lengkap',
					username	= '$username',
					password 	= '$password',
					level 		= '$level'
					WHERE Id = $IdUser";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
?>


<?php
	function user_create($data){
		global $conn;

		// $IdUser		= htmlspecialchars($data['IdUser']);
		$nama_lengkap = htmlspecialchars($data['nama_user']);
		$username	= htmlspecialchars($data['username']);
		$password	= htmlspecialchars($data['password']);
		$level		= htmlspecialchars($data['level']);

		$query = "INSERT INTO user (nama_lengkap,username,password,level) 
					VALUES ('$nama_lengkap','$username','$password','$level')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
		header("Location: ?x=counter_list");
	}
?>

<?php
	function user_delete($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM user WHERE Id = $id");
		return mysqli_affected_rows($conn);
	}
?>

<?php
	function invoice_delete($id){
		global $conn;
		mysqli_query($conn, "DELETE FROM invoice WHERE no_invoice = $id");
		return mysqli_affected_rows($conn);
	}
?>

<?php
	function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
?>

<?php
	function tgl_indo($tgl){
		$tanggal 	= substr($tgl,8,2);
		$bulan 		= getBulan(substr($tgl,5,2));
		$tahun 		= substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;		 
	}
?>

<?php
	function invoice_create($data){
		global $conn;

		$no_invoice		= htmlspecialchars($data['no_invoice']);
		$tgl 			= htmlspecialchars($data['tgl']);
		$nama_customer 	= htmlspecialchars($data['nama_customer']);
		$alamat_customer= htmlspecialchars($data['alamat_customer']);

		$query = "INSERT INTO invoice (no_invoice, tgl, nama_customer, alamat_customer) 
					VALUES ('$no_invoice', '$tgl', '$nama_customer', '$alamat_customer')";
		mysqli_query($conn, $query);

		$query2 = "INSERT INTO data_barang_dp (no_invoice) 
					VALUES ('$no_invoice')";
		mysqli_query($conn, $query2);

		return mysqli_affected_rows($conn);
		header("Location: ?x=counter_list");
	}
?>

<?php
	function suratjalan_create($data){
		global $conn;

		$no_suratjalan		= htmlspecialchars($data['no_suratjalan']);
		$tgl 			= htmlspecialchars($data['tgl']);
		$nama_customer 	= htmlspecialchars($data['nama_customer']);
		$alamat_customer= htmlspecialchars($data['alamat_customer']);

		$query = "INSERT INTO surat_jalan (no_suratjalan, tgl, nama_customer, alamat_customer) 
					VALUES ('$no_suratjalan', '$tgl', '$nama_customer', '$alamat_customer')";
		mysqli_query($conn, $query);

		// $query2 = "INSERT INTO data_barang_dp (no_invoice) 
		// 			VALUES ('$no_invoice')";
		// mysqli_query($conn, $query2);

		return mysqli_affected_rows($conn);
		header("Location: ?x=counter_list");
	}
?>

<?php
	function invoice_update($data){
		global $conn;

		$no_invoice		= htmlspecialchars($data['no_invoice']);
		$tgl 			= htmlspecialchars($data['tgl']);
		$nama_customer 	= htmlspecialchars($data['nama_customer']);
		$alamat_customer= htmlspecialchars($data['alamat_customer']);

		$query = "UPDATE invoice SET
					nama_customer	= '$nama_customer',
					alamat_customer	= '$alamat_customer',
					tgl 			= '$tgl'
					WHERE no_invoice = $no_invoice";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
?>

<?php
	function invoice_barang_create($data){
		global $conn;

		$IdBarang 	 	= htmlspecialchars($data['IdBarang']);
		$nomor 			= $data['no_invoice'];
		$nama_barang 	= htmlspecialchars($data['nama_barang']);
		$harga_satuan	= htmlspecialchars($data['harga_satuan']);
		$qty			= htmlspecialchars($data['qty']);
		$total 			= $harga_satuan * $qty;

		$query = "INSERT INTO data_barang (IdBarang, nama_barang, harga_satuan, qty, total, no_invoice) 
					VALUES ('', '$nama_barang', '$harga_satuan', '$qty', '$total', '$nomor')";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
		// header("Location: ?x=counter_list");
	}
?>

<?php
	function uang_muka_create($data){
		global $conn;

		$no_invoice		= $data['no_invoice'];
		$uang_muka 		= htmlspecialchars($data['uang_muka']);

		$query = "UPDATE data_barang_dp SET uang_muka = '$uang_muka' WHERE no_invoice = $no_invoice";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
		// header("Location: ?x=counter_list");
	}
?>

<?php
	function barang_delete($idm){
		global $conn;
		mysqli_query($conn, "DELETE FROM data_barang WHERE IdBarang = $idm");
		return mysqli_affected_rows($conn);
	}
?>

<?php
	function counter_update($data){
		global $conn;

		$IdCounter		= htmlspecialchars($data['IdCounter']);
		$nama_sales		= htmlspecialchars($data['nama_sales']);
		$tgl_mulai		= htmlspecialchars($data['tgl_mulai']);
		$nama_counter	= htmlspecialchars($data['nama_counter']);
		$no_tlp			= htmlspecialchars($data['no_tlp']);
		$alamat			= htmlspecialchars($data['alamat']);
		$IdCounstat		= htmlspecialchars($data['IdCounstat']);

		$query = "UPDATE counter SET
					nama_sales 	= '$nama_sales',
					tgl_mulai	= '$tgl_mulai',
					nama_counter= '$nama_counter',
					no_tlp 		= '$no_tlp',
					alamat 		= '$alamat',
					IdCounstat	= $IdCounstat
					WHERE IdCounter = $IdCounter";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
?>

