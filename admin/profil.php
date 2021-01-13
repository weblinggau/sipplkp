<?php

  session_start();
  error_reporting(0);
  if (!isset($_SESSION["login"])) {
    header("Location: ..");
  }
  include '../koneksi.php';
  include '../templates/header.php';
  include '../templates/sidebarAdmin.php';
  include 'functionsAdmin.php';

  $id_user = $_SESSION['id_user'];
  $Admin = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user=$id_user");
  $a = mysqli_fetch_array($Admin);

  //cek apakah tombol submit sudah ditekan atau belum
  if ( isset($_POST["ubah"]) ) {
    // cek apakah data berhasil ditambahkan atau tidak
    if (ubahAdmin($_POST) == true) {
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
                document.location.href = 'dashboard.php';
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
                <h3 class="text-dark text-center">Profil Anda</h3><hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_user" value="<?php echo $a["id_user"]; ?>">

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="nama">Nama Lengkap</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" id="nama" value="<?php echo $a["nama"]; ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="email">Email</label>
                        <div class="col-sm-7">
                            <input type="text" name="email" id="email" value="<?php echo $a["email"]; ?>" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label"  for="username"><i>Username</i></label>
                        <div class="col-sm-7">
                            <input type="text" name="username" id="username" value="<?php echo $a["username"]; ?>" class="form-control form-control-user">
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
                            $password = $a["password"];
                        }
                    ?>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="jk">Jenis Kelamin</label>
                        <div class="col-sm-7">
                            <select name="jk" id="jk" class="form-control">
                                <option value="L" <?php if($a["jk"]=="L") echo 'selected'; ?>>Laki-laki</option>
                                <option value="P" <?php if($a["jk"]=="P") echo 'selected'; ?>>Perempuan</option>
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