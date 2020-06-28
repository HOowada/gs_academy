<?php
//セッションには絶対必要
session_start();

$sid = session_id();
$_SESSION["name"] = "大和田";
$_SESSION["age"] = 36;
$_SESSION["tewt"] = "テスト";


echo $sid;


?>