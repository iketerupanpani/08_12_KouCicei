<?php
// 関数ファイル読み込み
include('functions.php');

//入力チェック(受信確認処理追加)
if (
    !isset($_POST['name']) || $_POST['name']=='' ||
    !isset($_POST['lpw']) || $_POST['lpw']=='' ||
    !isset($_POST['lid']) || $_POST['lid']=='' ||
     !isset($_POST['kanri_flg']) || $_POST['kanri_flg']==''
) {
    exit('ParamError');
}


//POSTデータ取得
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

//DB接続します(エラー処理追加)
$dbn = 'mysql:dbname=gs_f02_db12;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = 'root';

try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    exit('dbError:'.$e->getMessage());
}

//データ登録SQL作成
$sql ='UPDATE user_table SET name=:a1,lid=:a2,lpw==:a3,kanri_flg=:a4,life_flg=:a5 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location:user_select.php');
    exit;
}
