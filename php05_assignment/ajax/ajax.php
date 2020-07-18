<?php
  //POSTパラメータを取得
  $id = $_POST["id"];
  $name = $_POST["name"];
  $type = $_POST["type"];
  $email = $_POST["email"];
  

  //echoでデータを戻す
  // echo $email;

  $data = array(
    "name" => $name,
    "type" => $type,
    "email" => $email,
    "id" => $id
  );

  $json = json_encode($data);

  echo $json;


exit;
?>
