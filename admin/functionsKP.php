<?php

    error_reporting(0);
    include '../koneksi.php';

    function tambahPembimbing($data) {
        global $koneksi;

        $mahasiswa = $data["mahasiswa"];
        $dosen = $data["dosen"];

        //cek mahasiswa sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT * FROM tb_pembimbingkp WHERE 
            mahasiswa='$mahasiswa' OR mahasiswa='$dosen' OR
            dosen='$dosen' OR dosen='$mahasiswa'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('data sudah ada');</script>";
            return false;
        }


        // join
        function join($id_pembimbingkp,$mahasiswa){
            $coba = "SELECT * FROM tb_pembimbingkp JOIN tb_user ON tb_pembimbingkp.id_pembimbingkp=tb_user.id_user
            WHERE id_pembimbingkp='$id_pembimbingkp, id_user='$mahasiswa";
        }
        
        //tambahkan user baru ke database
        $query = "INSERT INTO tb_pembimbingkp VALUES ('', '$mahasiswa', '$dosen')";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);
    }

    function ubahPembimbing($data) {
        global $koneksi;

        $id_pembimbingkp = $data["id_pembimbingkp"];
        $mahasiswa = $data["mahasiswa"];
        $dosen = $data["dosen"];

        //cek mahasiswa sudah ada atau belum
        $result = mysqli_query($koneksi, "SELECT * FROM tb_pembimbingkp WHERE mahasiswa='$mahasiswa'");
        if (mysqli_fetch_assoc($result)) {
            echo "<script>alert('data sudah ada');</script>";
            return false;
        }

        $query = "UPDATE tb_pembimbingkp SET mahasiswa='$mahasiswa', dosen='$dosen' WHERE id_pembimbingkp = '$id_pembimbingkp'";
        mysqli_query($koneksi, $query);
        return true;
    }

    function hapusPembimbing($id_pembimbingkp){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM tb_pembimbingkp WHERE id_pembimbingkp=$id_pembimbingkp");
        return mysqli_affected_rows($koneksi);
    }

?>