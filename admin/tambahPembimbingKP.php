<?php

    error_reporting(0);
    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ..");
    }
    include '../koneksi.php';
    include '../templates/header.php';
    include '../templates/sidebarAdmin.php';
    include 'functionsKP.php';

    $mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='3' ORDER BY npm ASC");
    $dosen = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='2' ORDER BY nama ASC");

    //cek apakah tombol submit sudah ditekan atau belum
    if ( isset($_POST["tambah"]) ) {
        // cek apakah data berhasil ditambahkan atau tidak
        if (tambahPembimbing($_POST) == true) {
            echo "
                <script>
                    alert('data berhasil ditambah!');
                    document.location.href = 'dataPembimbingKP.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('data gagal ditambah!');
                    document.location.href = 'dataPembimbingKP.php';
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
                <h3 class="text-dark text-center">Formulir Ubah Data Pembimbing</h3><hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Mahasiswa</label>
                        <div class="col-sm-7">
                            <select name="mahasiswa" id="mahasiswa" class="form-control">
                            <?php   while ($m = mysqli_fetch_array($mahasiswa)) { ?>
                                <option value="<?php echo $m["id_user"]; ?>"><?php echo strtoupper($m["npm"])."-".$m["nama"]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="">Dosen</label>
                        <div class="col-sm-7">
                            <select name="dosen" id="dosen" class="form-control">
                            <?php   while ($d = mysqli_fetch_array($dosen)) { ?>
                                <option value="<?php echo $d["id_user"]; ?>"><?php echo $d["nama"]; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" name="tambah" class="btn btn-primary text-center">Tambah</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-3"></div>
</div>

<?php include '../templates/footer.php'; ?>