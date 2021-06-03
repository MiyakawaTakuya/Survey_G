<?php
// var_dump($_POST);
// exit();

$homepage = file_get_contents('http://www.example.com/');
echo $homepage;


//項目がちゃんと埋まった状態で送られてこなかった場合にエラー文を出す仕組み
if (
  !isset($_POST['todo']) || $_POST['todo'] == '' ||
  !isset($_POST['deadline']) || $_POST['deadline'] == ''
) {
  exit('ParamError');
}
// exit('O.K.');

//項目がしっかり入力されていることを確認したのちに
//送信されてきた項目を変数として定義
$todo = $_POST['todo'];
$deadline = $_POST['deadline'];

// DB接続情報  dbname="ここに自分のDBの名前を入力する"
$dbn = 'mysql:dbname=gsacf_l05_12;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}
//exit(OK);

// SQL作成&実行   ちゃんと項目の名前と数をしっかりDBと一致させる！！！
$sql = 'INSERT INTO
todo_table(id, todo, deadline, created_at, updated_at) VALUES(NULL, :todo, :deadline, sysdate(), sysdate())';

//変数をバインド変数(:todo)に格納!!  このあたりは毎回一緒<!DOCTYPE html>
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$status = $stmt->execute(); // SQLを実行

// データ作成実行後 処理(todo_create.php)
// 失敗時にエラーを出力し，成功時は登録画面に戻る
if ($status == false) {
  $error = $stmt->errorInfo(); // データ登録失敗次にエラーを表示 
  exit('sqlError:' . $error[2]);
} else {
  // 登録ページへ移動
  header('Location:todo_input.php');
}
