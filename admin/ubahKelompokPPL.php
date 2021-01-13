<?php

    error_reporting(0);
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ..");
    }
    include '../koneksi.php';
    include '../templates/header.php';
    include '../templates/sidebarAdmin.php';
    include 'functionsPPL.php';

    $mahasiswa1 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='3' ORDER BY npm ASC");
    $mahasiswa2 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='3' ORDER BY npm ASC");
    $mahasiswa3 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='3' ORDER BY npm ASC");
    $dosen = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='2' ORDER BY nama ASC");
    $id_anggota = $_GET["id_anggota"];
    $kelompok = mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE id_anggota=$id_anggota");
    $k = mysqli_fetch_array($kelompok);

    //cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["ubah"]) ) {
        // cek apakah data berhasil ditambahkan atau tidak
        if (ubahKelompok($_POST) == true) {
            echo "
                <script>
                    alert('data berhasil ditambah!');
                    document.location.href = 'dataKelompokPPL.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambah!');
                    document.location.href = 'dataKelompokPPL.php';
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
                <h3 class="text-dark text-center">Formulir Ubah Data Kelompok PPL</h3><hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden">

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Mahasiswa 1</label>
                        <div class="col-sm-7">
                            <select name="mahasiswa1" id="mahasiswa1" class="form-control">
                            <?php   while ($m = mysqli_fetch_array($mahasiswa1)) { ?>
                                <option value="<?php echo $m["id_user"]; ?>" <?php if($m["id_user"]==$k["mahasiswa1"]) echo 'selected'; ?>><?php echo strtoupper($m["npm"])."-".$m["nama"]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Mahasiswa 2</label>
                        <div class="col-sm-7">
                            <select name="mahasiswa2" id="mahasiswa2" class="form-control">
                            <?php   while ($m = mysqli_fetch_array($mahasiswa2)) { ?>
                                <option value="<?php echo $m["id_user"]; ?>" <?php if($m["id_user"]==$k["mahasiswa2"]) echo 'selected'; ?>><?php echo strtoupper($m["npm"])."-".$m["nama"]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Mahasiswa 3</label>
                        <div class="col-sm-7">
                            <select name="mahasiswa3" id="mahasiswa3" class="form-control">
                                <option value="<?php echo 0; ?>" selected></option>
                            <?php   while ($m = mysqli_fetch_array($mahasiswa3)) { ?>
                                <option value="<?php echo $m["id_user"]; ?>" <?php if($m["id_user"]==$k["mahasiswa3"]) echo 'selected'; ?>><?php echo strtoupper($m["npm"])."-".$m["nama"]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Dosen</label>
                        <div class="col-sm-7">
                            <select name="dosen" id="dosen" class="form-control">
                            <?php   while ($d = mysqli_fetch_array($dosen)) { ?>
                                <option value="<?php echo $d["id_user"]; ?>" <?php if($d["id_user"]==$k["dosen"]) echo 'selected'; ?>><?php echo $d["nama"]; ?></option>
                            <?php } ?>
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