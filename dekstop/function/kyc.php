<?php
session_start();
error_reporting(0);
include '../../function/connect.php';

if ($id_login == '') {
    if (isset($_POST['submit'])) {
        $extplayer = $_POST['extplayer'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $email = $_POST['email'];
        $no_ponsel = $_POST['no_ponsel'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $kota = $_POST['kota'];
        $kode_pos = $_POST['kode_pos'];
        $kartu_identitas = $_POST['kartu_identitas'];

        // Menggunakan $_FILES untuk mengakses file yang diunggah
        $file_name = $_FILES['kartu']['name']; // Nama file
        $file_tmp = $_FILES['kartu']['tmp_name']; // Lokasi file sementara
        $file_type = $_FILES['kartu']['type']; // Tipe file

        // Direktori tujuan penyimpanan file
        $upload_dir = '../../upload/kyc/';
        
        // Pindahkan file yang diunggah ke direktori tujuan
        move_uploaded_file($file_tmp, $upload_dir . $file_name);

        // Lakukan penanganan data lainnya seperti menyimpan ke database
        // ...

        // Contoh query untuk menyimpan data ke database
        $query = "INSERT INTO tb_kyc (id, nama_lengkap, email, no_ponsel, tanggal_lahir, alamat, kota, kode_pos, kartu_identitas, kartu, id_user) VALUES (NULL, '$nama_lengkap', '$email', '$no_ponsel', '$tanggal_lahir', '$alamat', '$kota', '$kode_pos', '$kartu_identitas', '$file_name','$extplayer')";
        $result = mysqli_query($koneksi, $query);

        $query1 = mysqli_query($koneksi, "UPDATE tb_user SET kyc = '1' WHERE extplayer = '$extplayer' ");
        // Eksekusi query
        
        if ($result) {
            // Data berhasil disimpan
            header("Location:../index.php?page=refferal&pesan=32");
        } else {
            // Data gagal disimpan
            header("Location:../index.php?page=refferal&pesan=33");
        }
    }
}
?>
