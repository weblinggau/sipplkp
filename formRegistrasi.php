<?php
    include 'registrasi.php';
    error_reporting(0);

    //cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["registrasi"]) ) {

        //cek apakah data berhasil ditambahkan atau tidak
        if (registrasi($_POST) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'formLogin.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'formLogin.php';
                </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIPPLKP Informatika UNIB</title>
	<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg-primary">

	<div class="container">
		<!-- Outer Row -->
		<div class="row justify-content-center mt-5">
			<div class="col-xl-5 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="col-lg-12">
							<div class="p-5">
								<div class="text-center mb-3">
									<img src="assets/img/Unib.png" alt="unib">
								</div>
                                <h5 class="text-center text-dark mb-1">Formulir Registrasi Akun</h5>
								<h4 class="text-center text-dark mb-4">Sistem Informasi PPL dan KP</h4>
								<small class="nav-link" data-toggle="tab">Registrasi sebagai </small>
                                <div class="text-center">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <!-- <a class="nav-link " data-toggle="tab" href="#form1">Admin</a> -->
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#form2"><small>Dosen</small></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#form3"><small>Mahasiswa</small></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <!-- <div id="form1" class="container tab-pane active">
                                        <form method="POST" action="" class="user"><br>
                                            <input type="hidden" name="role_id" value="1">

                                            <div class="form-group">
                                                <input type="text" name="nama" id="nama" value="" class="form-control form-control-user" placeholder="Nama Lengkap" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" value="" class="form-control form-control-user" placeholder="Email" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="username" id="username" value="" class="form-control form-control-user" placeholder="Nama Pengguna" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password" id="password" value="" class="form-control form-control-user" placeholder="Kata Sandi" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password2" id="password2" value="" class="form-control form-control-user" placeholder="Ulangi Kata Sandi" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <select name="jk" id="jk" class="form-control">
                                                    <option value="L" selected>Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group text-center">
                                                <small>
                                                    <a href="formLogin.php">Sudah punya akun? Silakan masuk!</a>
                                                </small>
                                            </div>

                                            <button type="submit" name="registrasi" class="btn btn-primary form-control">Kirim</button>
                                        </form>
                                    </div> -->

                                    <div id="form2" class="container tab-pane fade">
                                        <form method="POST" action="" class="user"><br>
                                            <input type="hidden" name="role_id" value="2">

                                            <div class="form-group">
                                                <input type="text" name="nama" id="nama" value="" class="form-control form-control-user" placeholder="Nama Lengkap" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" value="" class="form-control form-control-user" placeholder="Email" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="number" name="nip" id="nip" value="" class="form-control form-control-user" placeholder="Nomor Induk Pegawai" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password" id="password" value="" class="form-control form-control-user" placeholder="Kata Sandi" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password2" id="password2" value="" class="form-control form-control-user" placeholder="Ulangi Kata Sandi" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <select name="jk" id="jk" class="form-control">
                                                    <option value="L" selected>Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group text-center">
                                                <small>
                                                    <a href="formLogin.php">Sudah punya akun? Silakan masuk!</a>
                                                </small>
                                            </div>

                                            <button type="submit" name="registrasi" class="btn btn-primary form-control">Kirim</button>
                                        </form>
                                    </div>

                                    <div id="form3" class="container tab-pane fade">
                                        <form method="POST" action="" class="user"><br>
                                            <input type="hidden" name="role_id" value="3">

                                            <div class="form-group">
                                                <input type="text" name="nama" id="nama" value="" class="form-control form-control-user" placeholder="Nama Lengkap" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="text" name="email" id="email" value="" class="form-control form-control-user" placeholder="Email" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" name="npm" id="npm" value="" class="form-control form-control-user" placeholder="Nomor Pokok Mahasiswa" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password" id="password" value="" class="form-control form-control-user" placeholder="Kata Sandi" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" name="password2" id="password2" value="" class="form-control form-control-user" placeholder="Ulangi Kata Sandi" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group">
                                                <select name="jk" id="jk" class="form-control">
                                                    <option value="L" selected>Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <input type="number" name="angkatan" id="angkatan" value="" class="form-control form-control-user" placeholder="Tahun Masuk Kuliah" required="" oninvalid="this.setCustomValidity('Kolom ini wajib diisi.')" oninput="setCustomValidity('')">
                                            </div>

                                            <div class="form-group text-center">
                                                <small>
                                                    <a href="formLogin.php">Sudah punya akun? Silakan masuk!</a>
                                                </small>
                                            </div>

                                            <button type="submit" name="registrasi" class="btn btn-primary form-control">Kirim</button>
                                        </form>
                                    </div>
                                </div>

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