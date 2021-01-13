<?php

    include '../koneksi.php';

    function profilMahasiswa ($data){
        global $koneksi;

        $id_user = $data["id_user"];
        $npm = strtolower($data["npm"]);
        $email = strtolower(stripslashes($data["email"]));
        $nama = htmlspecialchars($data["nama"]);
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $jk = htmlspecialchars($data["jk"]);
        $angkatan = htmlspecialchars($data["angkatan"]);

        $query = "UPDATE tb_user SET email = '$email', npm = '$npm', nama = '$nama', password = '$password',jk = '$jk', angkatan = '$angkatan' WHERE id_user = '$id_user'";
        mysqli_query($koneksi, $query);
        return true;
    }

?>