<?php
//共通で使うものを別ファイルにしておきましょう。

//DB接続関数（PDO）
function db_conn()
{

$dbn='mysql:dbname=gs_f02_db12;charset=utf8;port=3306;host=localhost';
$user='root';
$pwd='root';

try{
    return new PDO($dbn,$user,$pwd);
}catch(PDOException $e){
    exit('dbEroor:'.$e->getMessage());
}
}


//SQL処理エラー
function errorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('ErrorQuery:'.$error[2]);
}

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
