<?php
if(isset($_GET['amount'])){

$amount=$_GET['amount'];
$app = "4f6o...eqq";
$baseUrl = "https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/"; //IF SANDBOX
$app_secret = "2is7......g4b";
$password = "sand...45";
$username = "sand...er02";


$cSession = curl_init();
$params1 = array(
    'baseURL' => $baseUrl,
    'app_secret' => $app_secret,
    'password' => $password,
    'username' => $username,
    'app' => $app

);
curl_setopt($cSession, CURLOPT_URL, "https://you-server-url/payment/token.php" . '?' . http_build_query($params1));
curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cSession, CURLOPT_HEADER, false);

$result1 = curl_exec($cSession);
curl_close($cSession);


$cSession2 = curl_init();
$params2 = array(
    'baseURL' => $baseUrl,
    'token' => $result1,
    'app' => $app,
    'amount' => $amount
);

curl_setopt($cSession2, CURLOPT_URL, "https://you-server-url/payment/create.php" . '?' . http_build_query($params2));
curl_setopt($cSession2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($cSession2, CURLOPT_HEADER, false);

$result2 = curl_exec($cSession2);
curl_close($cSession2);
header("Location: $result2");
}
?>


<form action="" method="get">
    <label for="amount">Amount (BDT)</label>
    <input type="number" name="amount" class="form-control" id="amount" value="125">

    <button id="payButton" class="btn btn-bkash btn-block btn-warning">Pay with bKash</button>
</form>
