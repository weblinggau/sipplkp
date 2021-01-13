<?php

    include '../koneksi.php';

    function profilDosen ($data){
        global $koneksi;

        $id_user = $data["id_user"];
        $nip = $data["nip"];
        $email = strtolower(stripslashes($data["email"]));
        $nama = htmlspecialchars($data["nama"]);
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $jk = htmlspecialchars($data["jk"]);

        //enkripsi password baru
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE tb_user SET email = '$email', nip = '$nip', nama = '$nama', password = '$password',jk = '$jk' WHERE id_user = '$id_user'";
        mysqli_query($koneksi, $query);
        return true;
    }

?>