<?php
if (isset($_POST['upload'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];

    // Menggunakan password hash
    $password_baru = md5($password);

    if ($password == "") {
        $query = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username', nama_lengkap = '$nama_lengkap' WHERE id = '$id' ");
        if ($query) {
            session_start();
            session_destroy();
            ?>
            <script type="text/javascript">
                alert('Data Admin Berhasil Diubah');
                window.location = "../index.php";
            </script>
            <?php
        }
    } else {
        // Menggunakan password hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = mysqli_query($koneksi, "UPDATE tb_admin SET username = '$username', password = '$hashed_password', nama_lengkap = '$nama_lengkap' WHERE id = '$id' ");
        if ($query) {
            session_start();
            session_destroy();
            ?>
            <script type="text/javascript">
                alert('Data Admin Berhasil Diubah');
                window.location = "../index.php";
            </script>
            <?php
        }
    }
}
?>
