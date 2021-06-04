<?php

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

// 参照はSELECT文!
$sql = 'SELECT * FROM Daylight';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
// $statusにSQLの実行結果が入る(取得したデータではない点に注意)

if ($status == false) {
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = "";
  foreach ($result as $record) {
    $output .= "<tr>";
    $output .= "<td>{$record["room"]}</td>";
    $output .= "<td>{$record["win"]}</td>";
    $output .= "<td>{$record["Sflo"]}</td>";
    $output .= "<td>{$record["Swin"]}</td>";
    $output .= "<td>{$record["H"]}</td>";
    $output .= "<td>{$record["D"]}</td>";
    $output .= "<td>{$record["P"]}</td>";
    $output .= "<td>{$record["Result"]}</td>";
    $output .= "</tr>";
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daylighting calculation</title>
</head>
<style>
  body {
    background: #efefef;
  }

  .all {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    height: 100%;
  }

  fieldset {
    border: none;
  }
</style>

<body>
  <fieldset>
    <legend>Daylighting calculation</legend>
    <a href="todo_input.php">窓の入力画面へ</a>
    <table>
      <thead>
        <tr>
          <th>部屋の名前</th>
          <th>窓の位置</th>
          <th>床面積(㎡)</th>
          <th>窓面積(㎡)</th>
          <th>垂直距離 H(mm)</th>
          <th>水平距離 D(mm)</th>
          <th>床面積に対する有効採光面積の割合</th>
          <th>判定(1/7以上を満たしているか)</th>
        </tr>
      </thead>
      <tbody>
        <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>