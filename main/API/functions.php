<?php
include 'config.php';
include '../../function/connect.php';

class test
{

    public function CreateMember($username)
    {
        global $config;

        $apiKey = $config['apiKey'];
        $secretKey = $config['secretKey'];
        $agentCode = $config['agentCode'];
        $extPlayer = $username; // Ganti dengan username anggota yang sesuai
        

        // Generate signature
        $signature = md5($apiKey . $secretKey . $extPlayer . "CreatePlayer");

        // Build request URL
        $requestUrl = "https://api.mrp3w412.top/Http/v3/CreatePlayer";
        $requestData = array(
            'apikey' => $apiKey,
            'extplayer' => $extPlayer,
            'agentcode' => $agentCode,
            'signature' => $signature
        );

        // Initialize cURL session
        $ch = curl_init($requestUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);

        // Execute cURL session
        $response = curl_exec($ch);

        // Handle error jika terjadi
        if ($response === false) {
            echo "Error: " . curl_error($ch);
        }

        // Tutup curl
        curl_close($ch);

        // Return response
        return $response;
    }

    public function getBalance($playerId)
    {
        global $config;

        $apiKey = $config['apiKey'];
        $secretKey = $config['secretKey'];
        $agentCode = $config['agentCode'];

        $playerId = $playerId; // Ganti dengan ID pemain yang valid

        // Generate signature
        $signature = md5($apiKey . $secretKey . $playerId . "getBalance");

        // Build request URL
        $requestUrl = "https://api.mrp3w412.top/Http/v3/getBalance";
        $requestData = array(
            'apikey' => $apiKey,
            'playerid' => $playerId,
            'agentcode' => $agentCode,
            'signature' => $signature
        );

        // Initialize cURL session
        $ch = curl_init($requestUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);

        // Execute cURL session
        $response = curl_exec($ch);

        // Handle error jika terjadi
        if ($response === false) {
            echo "Error: " . curl_error($ch);
        }

        // Tutup curl
        curl_close($ch);

        // Return response
        return $response;
    }

    public function withdraw($playerId, $amount)
    {
        global $config;

        $apiKey = $config['apiKey'];
        $secretKey = $config['secretKey'];

        $playerId = $playerId; // Ganti dengan ID pemain yang valid
        $amount = $amount;

        // Generate signature
        $signature = md5($apiKey . $secretKey . $playerId . "balanceWithdrawal" . $amount);

        // Build request URL
        $requestUrl = "https://api.mrp3w412.top/Http/v3/balanceWithdrawal";
        $requestData = array(
            'apikey' => $apiKey,
            'playerid' => $playerId,
            'amount' => $amount,
            'signature' => $signature
        );

        // Initialize cURL session
        $ch = curl_init($requestUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);

        // Execute cURL session
        $response = curl_exec($ch);

        // Handle error jika terjadi
        if ($response === false) {
            echo "Error: " . curl_error($ch);
        }

        // Tutup curl
        curl_close($ch);

        // Return response
        return $response;
    }

    public function deposit($playerId, $amount)
    {
        global $config;

        $apiKey = $config['apiKey'];
        $secretKey = $config['secretKey'];

        $playerId = $playerId; // Ganti dengan ID pemain yang valid
        $amount = $amount;

        // Generate signature
        $signature = md5($apiKey . $secretKey . $playerId . "balanceTransfer" . $amount);

        // Build request URL
        $requestUrl = "https://api.mrp3w412.top/Http/v3/balanceTransfer";
        $requestData = array(
            'apikey' => $apiKey,
            'playerid' => $playerId,
            'amount' => $amount,
            'signature' => $signature
        );

        // Initialize cURL session
        $ch = curl_init($requestUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);

        // Execute cURL session
        $response = curl_exec($ch);

        // Handle error jika terjadi
        if ($response === false) {
            echo "Error: " . curl_error($ch);
        }

        // Tutup curl
        curl_close($ch);

        // Return response
        return $response;
    }

    public function launchGame($playerId, $provider, $gameid)
    {
        global $config;
        global $currentURL;

        $apiKey = $config['apiKey'];
        $secretKey = $config['secretKey'];

        $playerId = $playerId; // Ganti dengan ID pemain yang valid
        $provider = $provider;
        $gameid = $gameid;
        $endpoint = $currentURL;

        // Generate signature
        $signature = md5($apiKey . $secretKey . $playerId . "gameStart" . $provider . $gameid);

        // Build request URL
        $requestUrl = "https://api.mrp3w412.top/Http/v3/gameStart?apikey=$apiKey&playerid=$playerId&provider=$provider&gameid=$gameid&lobbyurl=$endpoint&signature=$signature";

        // Initialize cURL session
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.47 Safari/537.36');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

// Execute cURL session
        $response = curl_exec($ch);

        // Handle error jika terjadi
        if ($response === false) {
            echo "Error: " . curl_error($ch);
        }

        // Tutup curl
        curl_close($ch);

        // Return response
        return $response;
    }
}

$TS = new test();

?>
