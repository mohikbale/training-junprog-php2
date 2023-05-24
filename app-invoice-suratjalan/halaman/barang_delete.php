<?php  
	require 'modul/function.php';

	$idm = $_GET["Idm"];
	$id = $_GET["Id"];

	if(barang_delete($idm) > 0){
		echo "
				<script>
					alert('data berhasil dihapus.');
					document.location.href = '?x=invoice_barang&Id=$id';
				</script>
			";
		}else{
			echo "
				<script>
					alert('data gagal dihapus.');
					document.location.href = '?x=invoice_barang&Id=$id';
				</script>
			";
	}
?>