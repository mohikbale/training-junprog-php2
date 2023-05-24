<?php  
	require 'modul/function.php';

	// $idm = $_GET["Idm"];
	$id = $_GET["Id"];

	if(invoice_delete($id) > 0){
		echo "
				<script>
					alert('data berhasil dihapus.');
					document.location.href = '?x=invoice_list';
				</script>
			";
		}else{
			echo "
				<script>
					alert('data gagal dihapus.');
					document.location.href = '?x=invoice_list';
				</script>
			";
	}
?>