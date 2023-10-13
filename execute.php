<?php
$token=$_GET['token'];
$app=$_GET['app'];
$paymentID=$_GET['paymentID'];
$baseUrl=$_GET['baseUrl'];
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $baseUrl."execute",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'paymentID' => $paymentID
  ]),
  CURLOPT_HTTPHEADER => [
    "Authorization: $token",
    "X-APP-Key: $app",
    "accept: application/json",
    "content-type: application/json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}