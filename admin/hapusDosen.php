<?php

    session_start();
    if(!isset ($_SESSION["login"])) {
        header("Location: login.php");
    }
    include 'functionsDosen.php';
    $id_user = $_GET["id_user"];
    if( hapusDosen($id_user) > 0 ) {
		echo "
			<script>
				alert('data berhasil dihapus!');
				document.location.href = 'dataDosen.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal dihapus!');
				document.location.href = 'dataDosen.php';
			</script>
		";
    }
    
?>