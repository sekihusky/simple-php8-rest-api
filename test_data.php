<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_NOTICE);

function httpsRequest($api, $data_string) {
  $ch = curl_init($api);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string),
    'Cache-Control: no-cache',
    'Pragma: no-cache'
	  )
  );
  $result = curl_exec($ch);
  curl_close($ch);

  return json_decode($result, true);
}

/*
// try create a record
$api = "https://xxx.xxx.xxx/user/create.php";
$data = array(
	"name" => "newUser1",
	"email" => "a@aaa.com",
	"age" => "14",
	"designation" => "office"
);
$data = httpsRequest($api, json_encode($data));
print_r($data);
*/


/*
// try update a record
$api = "https://xxx.xxx.xxx/user/update.php";
$data = array(
	"id" => 2,
	"name" => "newUser",
	"email" => "a@aaa.com",
	"age" => "18",
	"designation" => "office"
);
$data = httpsRequest($api, json_encode($data));
print_r($data);
*/

/*
// try delete a record
$api = "https://xxx.xxx.xxx/user/delete.php";
$data = array(
	"id" => 3
);
$data = httpsRequest($api, json_encode($data));
print_r($data);
*/