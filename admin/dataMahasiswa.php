<?php

    session_start();
    if (!isset($_SESSION["login"])) {
        header("Location: ..");
    }
    include '../koneksi.php';
    include '../templates/header.php';
    include '../templates/sidebarAdmin.php';
    include 'functionsMahasiswa.php';

    $Mahasiswa = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='3' ORDER BY npm ASC");
        
?>

<!-- main content -->
<div class="container-fluid">
    <h3 class="text-dark text-center font-weight-bold">DATA MAHASISWA</h3><hr>

    <!-- <nav class="navbar navbar-light bg-light">
        <form class="form-inline" action="" method="GET">
            <input class="form-control mr-sm-2" size="50" type="search" name="keyword" placeholder="Telusuri berdasarkan nama ... " aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
        </form>
    </nav>

    <?php 
        if(isset($_GET['keyword'])){
            $cari = $_GET['keyword'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
        }
    ?> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NPM</th>
                            <th>EMAIL</th>
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                            <th>ANGKATAN</th>
                            <th>UBAH</th>
                            <th>HAPUS</th>
                        </tr>
                    </thead>

                    

                    <tbody>
                    <?php
                        $no = 1;
                        while ($mahasiswa = mysqli_fetch_array($Mahasiswa)) { 
                    ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo strtoupper($mahasiswa['npm']) ?></td>
                            <td><?php echo $mahasiswa['email'] ?></td>
                            <td><?php echo $mahasiswa['nama'] ?></td>
                            <td><?php if($mahasiswa['jk'] == 'L'){
                                echo "Laki-laki";
                            }else {
                                echo "Perempuan";
                            } ?></td>
                            <td><?php echo $mahasiswa['angkatan'] ?></td>
                            <td class="text-center">
                                <a href="ubahMahasiswa.php?id_user=<?php echo $mahasiswa["id_user"]; ?>"><button class="btn-circle btn-primary btn-sm mx-1"><i class="fa fa-edit"></i></button></a>
                            </td>
                            <td class="text-center">
                                <a href="hapusMahasiswa.php?id_user=<?php echo $mahasiswa["id_user"]; ?>" onclick="return confirm('yakin?');"><button class="btn-circle btn-danger btn-sm mx-1"><i class="fa fa-trash"></i></button></a>
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