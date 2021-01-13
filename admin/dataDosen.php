<?php

    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ..");
    }
    include '../koneksi.php';
    include '../templates/header.php';
    include '../templates/sidebarAdmin.php';
    include 'functionsDosen.php';

	$Dosen = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='2' ORDER BY nama ASC");

?>

<!-- main content -->
<div class="container-fluid">
    <h3 class="text-dark text-center font-weight-bold">DATA DOSEN</h3><hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Dosen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NIP</th>
                            <th>EMAIL</th>
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                            <th>UBAH</th>
                            <th>HAPUS</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                        $no = 1;
                        while ($dosen = mysqli_fetch_array($Dosen)) { 
                    ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $dosen['nip'] ?></td>
                            <td><?php echo $dosen['email'] ?></td>
                            <td><?php echo $dosen['nama'] ?></td>
                            <td><?php if($dosen['jk'] == 'L'){
                                echo "Laki-laki";
                            }else {
                                echo "Perempuan";
                            } ?></td>
                            <td class="text-center">
                                <a href="ubahDosen.php?id_user=<?php echo $dosen["id_user"]; ?>"><button class="btn-circle btn-primary btn-sm mx-1"><i class="fa fa-edit"></i></button></a>
                            </td>
                            <td class="text-center">
                                <a href="hapusDosen.php?id_user=<?php echo $dosen["id_user"]; ?>" onclick="return confirm('yakin?');"><button class="btn-circle btn-danger btn-sm mx-1"><i class="fa fa-trash"></i></button></a>
                            </td>
                        </tr>

                        <?php } ?>
                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php'; ?>