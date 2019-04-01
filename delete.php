<?php
$id_minuman = $_POST['id_minuman'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://danendra.000webhostapp.com/tugas4/indexserver.php/delete",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "id_minuman=$id_minuman",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: 76656b0a-f743-5290-a8d4-2e1ab90e6271"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  header('location: indexclient.php');
}
?>