<?php
// var_dump($_POST);
// exit();


//項目がちゃんと埋まった状態で送られてこなかった場合にエラー文を出す仕組み
if (
  !isset($_POST['room']) || $_POST['room'] == '' ||
  !isset($_POST['win']) || $_POST['win'] == '' ||
  !isset($_POST['Sflo']) || $_POST['Sflo'] == '' ||
  !isset($_POST['Swin']) || $_POST['Swin'] == '' ||
  !isset($_POST['H']) || $_POST['H'] == '' ||
  !isset($_POST['D']) || $_POST['D'] == ''
) {
  exit('ParamError');
}
// exit('O.K.');

//項目がしっかり入力されていることを確認したのちに
//送信されてきた項目を変数として定義
$room = $_POST['room'];
$win = $_POST['win'];
$Sflo = $_POST['Sflo'];
$Swin = $_POST['Swin'];
$H = $_POST['H'];
$D = $_POST['D'];

//取得したデータを元に採光計算を行う
$DH = $D / $H;
$yuko = $Swin * 6 * $DH - 1.4;
$P = $yuko / $Sflo;   //床面積に対する有効採光面積の割合

$Result = "";  //採光計算の結果をここで判定する
if ($P >= 0.1428) {
  $Result = "Required";
} else {
  $Result = "Not required";
}

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
Daylight(id, room, win, Sflo, Swin, H, D, P, Result) VALUES( NULL, :room, :win, :Sflo, :Swin, :H, :D, :P, :Result )';

//変数をバインド変数(:todo)に格納!!  このあたりは毎回一緒<!DOCTYPE html>
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':room', $room, PDO::PARAM_STR);
$stmt->bindValue(':win', $win, PDO::PARAM_STR);
$stmt->bindValue(':Sflo', $Sflo, PDO::PARAM_STR);
$stmt->bindValue(':Swin', $Swin, PDO::PARAM_STR);
$stmt->bindValue(':H', $H, PDO::PARAM_STR);
$stmt->bindValue(':D', $D, PDO::PARAM_STR);
$stmt->bindValue(':P', $P, PDO::PARAM_STR);
$stmt->bindValue(':Result', $Result, PDO::PARAM_STR);
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
