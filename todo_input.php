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

  .form {
    /* color: goldenrod; */
    font-size: 18px;
    margin: 4px;
  }

  input {
    border: none;
    border-radius: 6px;
  }

  .button {
    width: 100%;
    display: flex;
    justify-content: center;
    font-size: 18px;
    margin: 4px;
  }
</style>

<!-- お決まり3点セットを押さえる formのactionとmethod,タグのname２つ -->

<body>
  <!-- <form action="todo_create.php" method="POST"> -->
  <form action="todo_create.php" method="POST">
    <fieldset class="form">
      <legend>Daylighting calculation</legend>

      <div>
        部屋の名前 <input type="text" name="room">
      </div>
      <div>
        窓の位置 <input type="text" name="win">
      </div>
      <div>
        床面積(㎡) <input type="number" name="Sflo" step="0.01">
      </div>
      <div>
        窓面積(㎡) <input type="number" name="Swin" step="0.01">
      </div>
      <div>
        垂直距離 H(mm) <input type="number" name="H">
      </div>
      <div>
        水平距離 D(mm) <input type="number" name="D">
      </div>
      <div>
        <button>採光計算</button>
      </div>
      <a href="todo_read.php">結果一覧へ</a>
    </fieldset>
  </form>

</body>

</html>