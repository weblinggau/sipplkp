<?php
    session_start();
    if (!isset($_SESSION["login"])) {
      header("Location: ..");
    }
    include '../koneksi.php';
    include '../templates/header.php';
    include '../templates/sidebarAdmin.php';
    include 'functionsKP.php';

    $KP = mysqli_query($koneksi, "SELECT * FROM tb_pembimbingkp");
?>

<div class="container-fluid">
    <a href="tambahPembimbingKP.php" class="btn btn-primary">+ Tambah Data</a><br><br>
    <h3 class="text-dark text-center font-weight-bold">DATA PEMBIMBING KP</h3><hr>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pembimbing KP</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center font-weight-bold">
                        <tr>
                            <td>NO</td>
                            <td>NPM</td>
                            <td>NAMA MAHASISWA</td>
                            <td>DOSEN PEMBIMBING</td>
                            <td>HAPUS</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        while ($kp = mysqli_fetch_array($KP)) { 
                            $id_mahasiswa = $kp["mahasiswa"];
                            $id_dosen = $kp["dosen"];
                            $mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_mahasiswa'");
                            $m = mysqli_fetch_array($mahasiswa);
                            $dosen = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_dosen'");
                            $d = mysqli_fetch_array($dosen);
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo strtoupper($m["npm"]); ?></td>
                            <td><?php echo $m["nama"]; ?></td>
                            <td><?php echo $d["nama"]; ?></td>
                            <td class="text-center">
                                <a href="hapusPembimbingKP.php?id_pembimbingkp=<?php echo $kp["id_pembimbingkp"]; ?>" onclick="return confirm('yakin?');"><button class="btn-circle btn-danger btn-sm mx-1"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>

<?php include '../templates/footer.php'; ?>