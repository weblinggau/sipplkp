<?php

    error_reporting(0);

    // mengaktifkan session php
    session_start();

    // menghubungkan dengan koneksi
    include 'koneksi.php';

    // menangkap data yang dikirim dari form
    $username = strtolower($_POST['username']);
    $userpass = $_POST['password'];

    // menyeleksi data user dengan username dan password yang sesuai
    $admin = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username = '$username'");
    $dosen = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE nip = '$username'");
    $mahasiswa = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE npm = '$username'");

    $a = mysqli_fetch_array($admin);
    $d = mysqli_fetch_array($dosen);
    $m = mysqli_fetch_array($mahasiswa);

    // menghitung jumlah data yang ditemukan
    $cek1 = mysqli_num_rows($admin);
    $cek2 = mysqli_num_rows($dosen);
    $cek3 = mysqli_num_rows($mahasiswa);

    if($cek1 > 0){
        if (password_verify($userpass, $a['password'])) {
            $_SESSION['id_user'] = $a['id_user'];
            $_SESSION['username'] = $a['username'];
            $_SESSION['nama'] = $a['nama'];
            $_SESSION['login'] = true;
            header("location:admin/dashboard.php");
        } else {
            header("location:index.php?pesan=gagal");
        }
    }else if($cek2 > 0){
        if (password_verify($userpass, $d['password'])) {
            $_SESSION['id_user'] = $d['id_user'];
            $_SESSION['username'] = $d['username'];
            $_SESSION['nama'] = $d['nama'];
            $_SESSION['login'] = true;
            header("location:dosen/dashboard.php");
        } else {
            header("location:index.php?pesan=gagal");
        }
    }else if($cek3 > 0){
        if (password_verify($userpass, $m['password'])) {
            $_SESSION['id_user'] = $m['id_user'];
            $_SESSION['username'] = $m['username'];
            $_SESSION['nama'] = $m['nama'];
            $_SESSION['login'] = true;
            header("location:mahasiswa/dashboard.php");
        } else {
            header("location:index.php?pesan=gagal");
        }
    }else{
        header("location:index.php?pesan=gagal");
    }

?>