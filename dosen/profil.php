<?php

    error_reporting(0);
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ..");
    }
    include '../koneksi.php';
    include '../templates/header.php';
    include '../templates/sidebarDosen.php';
    include 'functionsDosen.php';

    $id_user = $_SESSION["id_user"];
    $Dosen = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = $id_user");
    $d = mysqli_fetch_array($Dosen);

    //cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["ubah"]) ) {
        // cek apakah data berhasil ditambahkan atau tidak
        if (profilDosen($_POST) == true) {
            echo "
                <script>
                    alert('data berhasil diubah!');
                    document.location.href = 'dashboard.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal diubah!');
                    document.location.href = 'datadashboard.php';
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
                <h3 class="text-dark text-center">Formulir Ubah Dosen</h3><hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $d["id_user"]; ?>">

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="nama">Nama Lengkap</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" id="nama" value="<?php echo $d["nama"]; ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="email">Email</label>
                        <div class="col-sm-7">
                            <input type="text" name="email" id="email" value="<?php echo $d["email"]; ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="nip">Nomor Induk Pegawai</label>
                        <div class="col-sm-7">
                            <input type="number" name="nip" id="nip" value="<?php echo $d["nip"]; ?>" class="form-control form-control-user">
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
                            $password = $d["password"];
                        }
                    ?>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="jk">Jenis Kelamin</label>
                        <div class="col-sm-7">
                            <select name="jk" id="jk" class="form-control">
                                <option value="L" <?php if($d["jk"]=="L") echo 'selected'; ?>>Laki-laki</option>
                                <option value="P" <?php if($d["jk"]=="P") echo 'selected'; ?>>Perempuan</option>
                            </select>
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