<?php 
	session_start();
	error_reporting(0);
	if ($_SESSION['role_id']=='1') {
		header("location:admin/dashboard.php");
	}elseif ($_SESSION['role_id']=='2') {
		header("location:dosen/dashboard.php");
	}elseif ($_SESSION['role_id']=='3') {
		header("location:mahasiswa/dashboard.php");
	}else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIPPLKP Informatika UNIB</title>
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body class="bg-primary">
	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center mt-5">
			<div class="col-xl-5 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-3">
					<div class="card-body p-0">
						<div class="col-lg-12">
							<div class="p-5">
								<div class="text-center mb-3">
									<img src="assets/img/Unib.png" alt="unib">
								</div>
								<h4 class="text-center text-dark mb-3">Sistem Informasi PPL dan KP</h4>
								<form method="post" action="login.php" class="user">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" placeholder="NIP atau NPM" name="username" required oninvalid="this.setCustomValidity('Kolom ini Wajib Diisi!')" oninput="setCustomValidity('')">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" placeholder="Kata Sandi" name="password" required oninvalid="this.setCustomValidity('Kolom ini Wajib Diisi!')" oninput="setCustomValidity('')">
									</div>

									<!-- cek pesan notifikasi -->
									<?php
										if(isset($_GET['pesan'])){
											if($_GET['pesan'] == "gagal"){
												echo '<div class="text-danger text-center mb-3"><small>NIP/NPM atau Kata Sandi Anda Salah!</small></div>';
											}
										}
									?>

									<div class="form-group text-center">
										<small>
											<a href="formRegistrasi.php">Belum punya akun? Registrasi!</a>
										</small>
									</div>

									<button name="login" type="submit" class="btn btn-primary form-control">Masuk</button>
								</form>
								<hr>
								<div class="text-center">
									<small>&copy; 2021 Prodi Informatika | Universitas Bengkulu</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>