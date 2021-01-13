<?php

    error_reporting(0);
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ..");
    }
    include '../koneksi.php';
    include '../templates/header.php';
    include '../templates/sidebarAdmin.php';
    include 'functionsMahasiswa.php';

    $id_user = $_GET["id_user"];
    $Mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = $id_user");
    $m = mysqli_fetch_array($Mahasiswa);

    //cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["ubah"]) ) {
        // cek apakah data berhasil ditambahkan atau tidak
        if (ubahMahasiswa($_POST) == true) {
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'dataMahasiswa.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'dataMahasiswa.php';
                </script>
            ";
        }
    }

?>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h3 class="text-dark text-center">Formulir Ubah Mahasiswa</h3><hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $m["id_user"]; ?>">

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="nama">Nama Lengkap</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" id="nama" value="<?php echo $m["nama"]; ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="email">Email</label>
                        <div class="col-sm-7">
                            <input type="text" name="email" id="email" value="<?php echo $m["email"]; ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="npm">Nomor Pokok Mahasiswa</label>
                        <div class="col-sm-7">
                            <input type="text" name="npm" id="npm" value="<?php echo strtoupper($m["npm"]); ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="password">Kata Sandi Baru</label>
                        <div class="col-sm-7">
                            <input type="password" name="password" id="password" value="" class="form-control form-control-user">
                        </div>
                        <small class="col-sm-12 text-center text-info mt-3">Kosongkan saja jika tidak ingin mengubah kata sandi.</small>
                    </div>
                    <?php
                        if(isset($_POST["password"])){
                            $password =  $_POST["password"];
                        } else {
                            $password = $m["password"];
                        }
                    ?>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="jk">Jenis Kelamin</label>
                        <div class="col-sm-7">
                            <select name="jk" id="jk" class="form-control">
                                <option value="L" <?php if($m["jk"]=="L") echo 'selected';?>>Laki-laki</option>
                                <option value="P" <?php if($m["jk"]=="P") echo 'selected';?>>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="angkatan">Tahun Masuk Kuliah</label>
                        <div class="col-sm-7">
                            <input type="number" name="angkatan" id="angkatan" value="<?php echo $m["angkatan"]; ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <button type="submit" name="ubah" class="btn btn-primary text-center">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>

<?php include '../templates/footer.php'; ?>