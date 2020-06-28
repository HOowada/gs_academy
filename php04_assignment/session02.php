<?php
//セッションには絶対必要
session_start();

$name = $_SESSION["name"];

echo $name;



?>