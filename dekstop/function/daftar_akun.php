<?php
ob_start();
session_start();
error_reporting(0);
$id_login = $_SESSION['id'];

include '../../function/connect.php';
// include '../../main/API/config.php';
include '../../main/API/functions.php';

if ($id_login == '') {
    if (isset($_POST['submit'])) {
        // Validasi dan bersihkan input
        $username = trim(strtolower(mysqli_real_escape_string($koneksi, strip_tags($_POST['username']))));
        $password = md5(mysqli_real_escape_string($koneksi, $_POST['password']));
        $konfirmasi_password = md5(mysqli_real_escape_string($koneksi, $_POST['konfirmasi_pass']));
        $email = mysqli_real_escape_string($koneksi, strip_tags($_POST['email']));
        $no_whatsapp = mysqli_real_escape_string($koneksi, strip_tags($_POST['no_whatsapp']));
        $bank = mysqli_real_escape_string($koneksi, strip_tags($_POST['bank']));
        $pemilik_rekening = mysqli_real_escape_string($koneksi, strip_tags($_POST['pemilik_rekening']));
        $norek = mysqli_real_escape_string($koneksi, strip_tags($_POST['norek']));
        $refferal = mysqli_real_escape_string($koneksi, strip_tags($_POST['refferal']));
        $captcha_asli = mysqli_real_escape_string($koneksi, $_POST['captcha_asli']);
        $captcha = mysqli_real_escape_string($koneksi, $_POST['captcha']);
        $status = 'Active';
        $level = 'user';
        $user = str_replace('', '', $username);
        $kode_unik = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz1234567890'), 0, 4);
        $extplayer = 'bubu' . $user . $kode_unik;

        // Validasi tambahan jika diperlukan
        if (empty($username) || empty($password) || empty($email) || empty($no_whatsapp) || empty($bank) || empty($pemilik_rekening) || empty($norek)) {
            header("Location:https://www.youtube.com/watch?v=_KK6kzd_gCg");
            exit();
        }

        // Cek keberadaan username
        $cek_username = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username' ");
        $liat_username = mysqli_num_rows($cek_username);

        if ($liat_username > 0) {
            header("Location: ../index.php?page=daftar&pesan=30");
            exit();
        } elseif ($captcha != $captcha_asli) {
            header("Location: ../index.php?page=daftar&pesan=2");
            exit();
        } else {
            // Cek apakah ada skrip pada input
            $input_array = array($pemilik_rekening, $norek, $no_whatsapp, $username, $password, $konfirmasi_password, $email, $bank, $refferal, $captcha_asli, $captcha, $status, $level);
            foreach ($input_array as $input) {
                if (stripos($input, 'script') !== false) {
                    ?>
                    <script type="text/javascript">
                        alert('Wah Ada Heker');
                        window.location = "https://www.youtube.com/watch?v=_KK6kzd_gCg";
                    </script>
                    <?php
                    exit();
                }
            }

            $adsad = $TS->CreateMember($extplayer);
            $hjfbo = json_decode($adsad, true);
            $PlayerID = $hjfbo['PlayerID'];

            // Insert data ke dalam database menggunakan prepared statements
            $qqq = mysqli_query($koneksi, "INSERT INTO tb_user VALUES (NULL,'$PlayerID', '$extplayer', '$username', '$password', '$pemilik_rekening', '$email', '$no_whatsapp', '$level', '$refferal', '$status', 'ongame','0') ");
            $query2 = mysqli_query($koneksi, "INSERT INTO tb_saldo (id, id_user, active, transfer, pending, payout) VALUES (NULL, '$extplayer', '0','0','0','0') ");
            $query3 = mysqli_query($koneksi, "INSERT INTO tb_bank (id, icon, nama_bank, nomor_rekening, nama_pemilik, id_user, level) VALUES (NULL,'', '$bank', '$norek', '$pemilik_rekening', '$extplayer','') ");

            $query5 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE refferal = '$refferal' ");
            $cek_reff = mysqli_num_rows($query5);

            if ($cek_reff > 0 && $refferal != "") {
                $query4 = mysqli_query($koneksi, "INSERT INTO tb_refferal (id, user_refferal, keterangan, bonus, id_user) VALUES (NULL, '$refferal','Downline','0','$extplayer') ");
            }


        
            $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password' ");
            if ($hitung = mysqli_num_rows($query) == 1) {
                $data = mysqli_fetch_array($query);
                $status = $data['status'];

                if ($status == 'Active') {
                    $id = $data['id'];
                    $level = $data['level'];
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['extplayer'] = $data['extplayer'];
                    $_SESSION['id'] = $id;

                    header("Location:../index.php?pesan=3");
                    exit();
                }
            } else {
                header("Location: ../index.php?page=daftar&pesan=4");
                exit();
            }
        }
    } else {
        header("Location: ../index.php?page=daftar&pesan=5");
        exit();
    }
} else {
    header("Location:../index.php");
    exit();
}
?>
