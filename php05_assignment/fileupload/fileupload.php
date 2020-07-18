<?php
//[FileUploadCheck--START--]
if (isset($_FILES["upfile"] ) && $_FILES["upfile"]["error"] ==0 ) {
    //ファイル名を取得
    $file_name = $_FILES["upfile"]["name"];
    //一時ファイル保存場所
    $tmp_path  = $_FILES["upfile"]["tmp_name"];
    //拡張子取得
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    //新しいファイル名作成
    $file_name = date("YmdHis").md5(session_id()) . "." . $extension;

    // FileUpload [--Start--]
    $img="";
    $file_dir_path = "upload/".$file_name;
    if ( is_uploaded_file( $tmp_path ) ) {
        if ( move_uploaded_file( $tmp_path, $file_dir_path ) ) {
            chmod( $file_dir_path, 0644 );
            $img = '<img src="'.$file_dir_path.'">';

            //2. DB接続します
            include("../funcs.php");
            $pdo = db_conn();

            //３．データ登録SQL作成
            $stmt = $pdo->prepare("INSERT INTO gs_images_table(id,images)VALUES(NULL,:images)");
            $stmt->bindValue(':images', $file_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
            $status = $stmt->execute(); //実行

            //４．データ登録処理後
            if($status==false){
            sql_error($stmt);
            }else{
            // redirect("index.html");
            }


        } else {
            // echo "Error:アップロードできませんでした。";
        }
    }


 }else{
     $img = "画像が送信されていません";
 }
 //[FileUploadCheck--END--] 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>アップロード画面サンプル</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <main>
    <!-- ヘッダー -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="file_view.php">写真アップロード</a></div>
            </div>
        </nav>
    </header>
    <!-- ヘッダー -->
    <?php echo $img; ?>
</main>
</body>
</html>