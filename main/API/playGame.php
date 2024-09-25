<?php
include 'functions.php';
include '../../function/connect.php';

$userCode = $_GET['extplayer'];

$qqqqqq = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_member = '$userCode' ");
$dasasa = mysqli_fetch_array($qqqqqq);

$ext = $dasasa['extplayer'];


    $gameCode = $_GET['gameCode']; // Ganti dengan kode permainan yang sesuai
     // Jika tidak ada deposit, isi dengan null
    $provider = $_GET['provider'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_saldo WHERE id_user = '$ext' ");
    $data = mysqli_fetch_array($query);

    $saldo_user = $data['active'];


    $response = $TS->launchGame($userCode, $provider, $gameCode);
    $responseData = json_decode($response, true);

    if (isset($responseData['ErrorCode']) && $responseData['ErrorCode'] == 0) {
        
        $dd = $TS->deposit($userCode, $saldo_user);

        // Game launched successfully
        $gameUrl = $responseData['game_url'];
        header("Location: $gameUrl");
        // Redirect to game URL
        exit();
    } else {
        // Error occurred
        echo "Error: " . $responseData['Message'];
    }
    ?>