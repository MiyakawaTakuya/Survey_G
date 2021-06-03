<?php
$homepage = file_get_contents('https://github.com/MiyakawaTakuya');
// var_dump ($homepage);
echo $homepage;

//PHPのレファレンスサイトはHTMLだけの抽出ができた
// $homepage = file_get_contents('https://www.php.net/manual/ja/intro.stream.php');
// var_dump ($homepage);
// echo $homepage;


// $homepage2 = file_get_contents ( string $filename , bool $use_include_path = false , resource $context =  , int $offset = 0 , int $length = 200 ) : string|false

// header('Location:todo_input.php');

// $opts = array(
//   'http'=>array(
//     'method'=>"GET",
//     'header'=>"Accept-language: en\r\n" .
//               "Cookie: foo=bar\r\n"
//   )
// );

// $context = stream_context_create($opts);

// /* 上のヘッダと共に http リクエストを www.example.com に対して
//    送出します */
// // $fp = fopen('https://www.php.net/manual/ja/intro.stream.php', 'r', false, $context);
// $fp = fopen('https://mmcd-web.sounds-stella.jp/archives/6829/var_dump-and-echo/', 'r', false, $context);
// // $fp = fopen('https://github.com/MiyakawaTakuya', 'r', false, $context);
// fpassthru($fp);
// fclose($fp);
// 
