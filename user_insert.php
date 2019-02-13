<?php

// 入力チェック
if (
    !isset($_POST['name']) || $_POST['name']=='' ||
    !isset($_POST['lpw']) || $_POST['lpw']=='' ||
    !isset($_POST['lid']) || $_POST['lid']==''
) {
    exit('ParamError');
}

//POSTデータ取得
//var_export($_POST);
foreach($_POST as $key => $value) {
    if($value == '' ) {
        echo $key;
        echo $value;
    }
}

$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg=$_POST['kanri_flg'];
$life_flg=$_POST['life_flg'];

//DB接続
$dbn = 'mysql:dbname=gs_f02_db12;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = 'root';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
}

//データ登録SQL作成
$sql ='INSERT INTO user_table(id, name, lid, lpw, kanri_flg,life_flg)
VALUES(NULL, :a1, :a2, :a3, :a4, :a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    
    exit('sqlError:'.$error[2]);

} else {
    //index.phpへリダイレクト
    header('Location:user_index.php');
}
?>