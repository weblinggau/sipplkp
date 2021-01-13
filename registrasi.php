<?php

    error_reporting(0);
    include 'koneksi.php';
    
    function registrasi ($data) {
        global $koneksi;

        $username = strtolower(stripslashes($data["username"]));
        $nip = $data["nip"];
        $npm = strtolower($data["npm"]);
        $email = strtolower(stripslashes($data["email"]));
        $nama = htmlspecialchars($data["nama"]);
        $password = mysqli_real_escape_string($koneksi, $data["password"]);
        $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
        $jk = htmlspecialchars($data["jk"]);
        $angkatan = $data["angkatan"];
        $role_id = htmlspecialchars($data["role_id"]);

        //cek username sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username='$username'");
        if ($role_id == 1) {
            if (mysqli_fetch_assoc($result)) {
                echo "<script>alert('<i>username</i> sudah ada');</script>";
                return false;
            }
        }

        //cek nip sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT nip FROM tb_user WHERE nip='$nip'");
        if ($role_id == 2) {
            if (mysqli_fetch_assoc($result)) {
                echo "<script>alert('NIP sudah ada');</script>";
                return false;
            }
        }

        //cek npm sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT npm FROM tb_user WHERE npm='$npm'");
        if ($role_id == 3) {
            if (mysqli_fetch_assoc($result)) {
                echo "<script>alert('NPM sudah ada');</script>";
                return false;
            }
        }

        //cek konfirmasi password
        if ($password !== $password2) {
            echo "<script>alert('konfirmasi password tidak sesuai');</script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //tambahkan user baru ke database
        if ($role_id == 1) {
            $query = "INSERT INTO tb_user VALUES ('', '$email', '$username', '', '', '$password', '$nama', '$jk', '', '$role_id')";
        } else if ($role_id == 2) {
            $query = "INSERT INTO tb_user VALUES ('', '$email', '', '$nip', '', '$password', '$nama', '$jk', '', '$role_id')";
        } else if ($role_id == 3) {
            $query = "INSERT INTO tb_user VALUES ('', '$email', '', '', '$npm', '$password', '$nama', '$jk', '$angkatan', '$role_id')";
        } else {
            echo "gagal";
        }
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

?>