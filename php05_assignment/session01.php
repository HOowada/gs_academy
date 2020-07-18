<?php
//セッションには絶対必要
session_start();

$sid = session_id();
$_SESSION["name"] = "中野憲一";
$_SESSION["age"] = 26;
$_SESSION["text"] = "テスト";

echo $sid;










?>