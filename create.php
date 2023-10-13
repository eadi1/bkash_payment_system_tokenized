<?php
$baseUrl=$_GET['baseURL'];
$amount=$_GET['amount'];
$token=$_GET['token'];
$app=$_GET['app'];
$invoice= "Islamic_Edu_".uniqid();
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $baseUrl."create",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'mode' => '0011',
    'callbackURL' => 'http://localhost/payment/execute.php?token='.$token.'&app='.$app."&baseUrl=".$baseUrl,
    'payerReference' => '5432',
    'amount' => $amount,
    'currency' => 'BDT',
    'intent' => 'sale',
    'merchantInvoiceNumber' => $invoice
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
$data=json_decode($response, true);
curl_close($curl);
$url=$data['bkashURL'];
if ($err) {
  echo "cURL Error #:" . $err;
} else {

     echo $url;

}