<?php

    session_start();
    if(!isset ($_SESSION["login"])) {
        header("Location: login.php");
    }
    include 'functionsPPL.php';
	$id_anggota = $_GET["id_anggota"];
	if( hapusKelompok($id_anggota) > 0) {
		echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'dataKelompokPPL.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal dihapus!');
				document.location.href = 'dataKelompokPPL.php';
			</script>
		";
    }
    
?>