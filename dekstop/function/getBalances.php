<?php
include "../../function/connect.php";
include "../../main/API/functions.php";
$user = $_POST['username'];

$q = mysqli_query($koneksi, "SELECT * FROM `tb_user` WHERE username = '$user'") or die(mysqli_error($koneksi));
$user_data = mysqli_fetch_array($q, MYSQLI_ASSOC);
$extplayer = $user_data['extplayer'];
$usersID = $user_data['extplayer'];
$playerId = $user_data['id_member'];

$result = $TS->getBalance($playerId);
$sss = json_decode($result, true);
$Balance = $sss['Balance'];
$saldo = $Balance;

if ($saldo != 0) {
	$updateBalance = mysqli_query($koneksi, "UPDATE `tb_saldo` SET active = $saldo WHERE id_user = '$usersID'") or die(mysqli_error($koneksi));
	
	if ($updateBalance) {
		
		$result1 = $TS->withdraw($playerId, $saldo);
	}
}



?>


