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

    $PPL = mysqli_query($koneksi, "SELECT * FROM tb_kelompok");
?>

<div class="container-fluid">
    <a href="tambahKelompokPPL.php" class="btn btn-primary">+ Tambah Kelompok</a><br><br>
    <h3 class="text-dark text-center font-weight-bold">DATA KELOMPOK PPL</h3><hr>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kelompok PPL</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center font-weight-bold">
                        <tr>
                            <td>NO</td>
                            <td>ANGGOTA 1</td>
                            <td>ANGGOTA 2</td>
                            <td>ANGGOTA 3</td>
                            <td>DOSEN</td>
                            <td>UBAH</td>
                            <td>HAPUS</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   $no = 1;
                            while ($ppl = mysqli_fetch_array($PPL)) {
                                $id_mahasiswa1 = $ppl["mahasiswa1"];
                                $id_mahasiswa2 = $ppl["mahasiswa2"];
                                $id_mahasiswa3 = $ppl["mahasiswa3"];
                                $id_dosen = $ppl["dosen"];
                                $m1 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_mahasiswa1'"));
                                $m2 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_mahasiswa2'"));
                                $m3 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_mahasiswa3'"));
                                $d = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user='$id_dosen'"));
                    ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $m1['nama']; ?></td>
                            <td><?php echo $m2['nama']; ?></td>
                            <td><?php if($id_mahasiswa3=="0") { 
                                     echo "<center>-</center>";
                                } else { 
                                    echo $m3['nama']; } ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td class="text-center">
                                <a href="ubahKelompokPPL.php?id_anggota=<?php echo $ppl["id_anggota"]; ?>"><button class="btn-circle btn-primary btn-sm mx-1"><i class="fa fa-edit"></i></button></a>
                            </td>
                            <td class="text-center">
                                <a href="hapusKelompokPPL.php?id_anggota=<?php echo $ppl["id_anggota"]; ?>" onclick="return confirm('yakin?');"><button class="btn-circle btn-danger btn-sm mx-1"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>

<?php include '../templates/footer.php'; ?>