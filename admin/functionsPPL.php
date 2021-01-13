<?php

    error_reporting(0);
    include '..koneksi.php';

    function tambahKelompok($data) {
        global $koneksi;

        $mahasiswa1 = $data["mahasiswa1"];
        $mahasiswa2 = $data["mahasiswa2"];
        $mahasiswa3 = $data["mahasiswa3"];
        $dosen = $data["dosen"];

        //cek data sudah ada atau belum
        if ($mahasiswa1==$mahasiswa2 || $mahasiswa1==$mahasiswa3 || $mahasiswa3==$mahasiswa2) {
            return false;
        } else {
            if ($mahasiswa3 == 0){
                $result = mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE 
                mahasiswa1='$mahasiswa1' OR mahasiswa1='$mahasiswa2' OR mahasiswa1='$mahasiswa3' OR
                mahasiswa2='$mahasiswa1' OR mahasiswa2='$mahasiswa2' OR mahasiswa2='$mahasiswa3' OR
                mahasiswa3='$mahasiswa1' OR mahasiswa3='$mahasiswa2'");
            }else{
                $result = mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE 
                mahasiswa1='$mahasiswa1' OR mahasiswa1='$mahasiswa2' OR mahasiswa1='$mahasiswa3' OR
                mahasiswa2='$mahasiswa1' OR mahasiswa2='$mahasiswa2' OR mahasiswa2='$mahasiswa3' OR
                mahasiswa3='$mahasiswa1' OR mahasiswa3='$mahasiswa2' OR mahasiswa3='$mahasiswa3'");
            }
            
            $fal = mysqli_fetch_assoc($result);
            $hitung = count($fal);
            if ($hitung > 0) {
                echo "<script>alert('data sudah ada');</script>";
                return false;
            } else {
                if ($mahasiswa3==0) {
                    $query = "INSERT INTO tb_kelompok VALUES ('', '$mahasiswa1', '$mahasiswa2','', '$dosen')";
                } else {
                    $query = "INSERT INTO tb_kelompok VALUES ('', '$mahasiswa1', '$mahasiswa2', '$mahasiswa3', '$dosen')";
                }
        
                mysqli_query($koneksi, $query);
                return mysqli_affected_rows($koneksi);
            }
        }

    }

    function ubahKelompok($data) {
        global $koneksi;

        $id_anggota = $data["id_anggota"];
        $mahasiswa1 = $data["mahasiswa1"];
        $mahasiswa2 = $data["mahasiswa2"];
        $mahasiswa3 = $data["mahasiswa3"];
        $dosen = $data["dosen"];
        $datalama = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE id_anggota=$id_anggota"));

        //cek data sudah ada atau belum
        if ($mahasiswa1==$mahasiswa2 || $mahasiswa1==$mahasiswa3 || $mahasiswa3==$mahasiswa2) {
            return false;
        } else {
            if ($datalama['mahasiswa1'] == $mahasiswa1 && $mahasiswa3 > 0){
                $result = mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE 
                mahasiswa1='$mahasiswa2' OR mahasiswa1='$mahasiswa3' OR
                mahasiswa2='$mahasiswa1' OR mahasiswa2='$mahasiswa2' OR mahasiswa2='$mahasiswa3' OR
                mahasiswa3='$mahasiswa1' OR mahasiswa3='$mahasiswa2' OR mahasiswa3='$mahasiswa3'");
            }elseif($datalama['mahasiswa2'] == $mahasiswa2 && $mahasiswa3 > 0){
                $result = mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE 
                mahasiswa1='$mahasiswa1' OR mahasiswa1='$mahasiswa2' OR mahasiswa1='$mahasiswa3' OR
                mahasiswa2='$mahasiswa1' OR mahasiswa2='$mahasiswa3' OR
                mahasiswa3='$mahasiswa1' OR mahasiswa3='$mahasiswa2' OR mahasiswa3='$mahasiswa3'");
            }elseif($datalama['mahasiswa3'] == $mahasiswa3 && $mahasiswa3 > 0){
                $result = mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE 
                mahasiswa1='$mahasiswa1' OR mahasiswa1='$mahasiswa2' OR mahasiswa1='$mahasiswa3' OR
                mahasiswa2='$mahasiswa1' OR mahasiswa2='$mahasiswa2' OR mahasiswa2='$mahasiswa3' OR
                mahasiswa3='$mahasiswa1' OR mahasiswa3='$mahasiswa2'");
            }elseif($mahasiswa3 == 0){
                $result = mysqli_query($koneksi, "SELECT * FROM tb_kelompok WHERE 
                mahasiswa1='$mahasiswa1' OR mahasiswa1='$mahasiswa2' OR mahasiswa1='$mahasiswa3' OR
                mahasiswa2='$mahasiswa1' OR mahasiswa2='$mahasiswa2' OR mahasiswa2='$mahasiswa3' OR
                mahasiswa3='$mahasiswa1' OR mahasiswa3='$mahasiswa2' OR mahasiswa3='$mahasiswa3'");
            }
            
            $fal = mysqli_fetch_assoc($result);
            $hitung = count($fal);

            if ($hitung > 0) {
                echo "<script>alert('data sudah ada');</script>";
                return false;
            } else {
                if ($mahasiswa3==0) {
                    $query = "UPDATE tb_kelompok SET mahasiswa1='$mahasiswa1', mahasiswa2='$mahasiswa2', mahasiswa3='0',dosen='$dosen' WHERE id_anggota = '$id_anggota'";
                } else {
                    $query = "UPDATE tb_kelompok SET mahasiswa1='$mahasiswa1', mahasiswa2='$mahasiswa2', mahasiswa3='$mahasiswa3', dosen='$dosen' WHERE id_anggota = '$id_anggota'";
                }
        
                mysqli_query($koneksi, $query);
                return mysqli_affected_rows($koneksi);
            }
        }
    }

    function hapusKelompok($id_anggota){
        global $koneksi;
        mysqli_query($koneksi, "DELETE FROM tb_kelompok WHERE id_anggota = $id_anggota");
        return mysqli_affected_rows($koneksi);
    }

?>