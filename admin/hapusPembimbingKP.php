<?php

    session_start();
    if(!isset ($_SESSION["login"])) {
        header("Location: login.php");
    }
    include 'functionsKP.php';
    $id_pembimbingkp = $_GET["id_pembimbingkp"];
    if( hapusPembimbing($id_pembimbingkp) > 0 ) {
		echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'dataPembimbingKP.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal dihapus!');
				document.location.href = 'dataPembimbingKP.php';
			</script>
		";
    }
    
?>