<?php

  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: ..");
  }
  include '../koneksi.php';
  include '../templates/header.php';
  include '../templates/sidebarAdmin.php';

  $Admin = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE role_id='1' ORDER BY username ASC");

?>

<!-- main content -->
<div class="container-fluid">
    <h3 class="text-dark text-center font-weight-bold">DATA ADMIN</h3><hr>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>USERNAME</th>
                            <th>EMAIL</th>
                            <th>NAMA</th>
                            <th>JENIS KELAMIN</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php
                        $no = 1;
                        while ($admin = mysqli_fetch_array($Admin)) {
                    ?>

                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $admin['username'];?>
                            <td><?php echo $admin['email'];?>
                            <td><?php echo $admin['nama'] ?></td>
                            <td><?php if($admin['jk'] == 'L'){
                                echo "Laki-laki";
                            }else {
                                echo "Perempuan";
                            } ?></td>
                        </tr>

                    <?php } ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../templates/footer.php'; ?>