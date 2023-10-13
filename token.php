<?php
$baseUrl=$_GET['baseURL'];
$app_secret=$_GET['app_secret'];
$password=$_GET['password'];
$username=$_GET['username'];
$app=$_GET['app'];
$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => $baseUrl."token/grant",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'app_key' => $app,
    'app_secret' => $app_secret
  ]),
  CURLOPT_HTTPHEADER => [
    "accept: application/json",
    "content-type: application/json",
    "password:$password",
    "username: $username"
  ],
]);

 $response = curl_exec($curl);
$err = curl_error($curl);
 $data=json_decode($response, true);
curl_close($curl);


if ($err) {
  echo "cURL Error #:" . $err;
} else {
    echo $data['id_token'];
} 