<?php
  
  session_start();

  $last_name = isset($_SESSION['last_name']) ? $_SESSION['last_name'] : '';
  $family_name = isset($_SESSION['family_name']) ? $_SESSION['family_name'] : '';
  $last_name_kana = isset($_SESSION['last_name_kana']) ? $_SESSION['last_name_kana'] : '';
  $family_name_kana = isset($_SESSION['family_name_kana']) ? $_SESSION['family_name_kana'] : '';
  $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : '';
  $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
  $gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
  $postal_code = isset($_SESSION['postal_code']) ? $_SESSION['postal_code'] : '';
  $prefecture = isset($_SESSION['prefecture']) ? $_SESSION['prefecture'] : '';
  $address_1 = isset($_SESSION['address_1']) ? $_SESSION['address_1'] : '';
  $address_2 = isset($_SESSION['address_2']) ? $_SESSION['address_2'] : '';
  $authority = isset($_SESSION['authority']) ? $_SESSION['authority'] : '';

  date_default_timezone_set('Asia/Tokyo'); 
  $time = date("Y-m-d H:i:s");

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);


  mb_internal_encoding("utf8");

  $pdo = new PDO("mysql:dbname=regist;host=localhost;", "root", "");

  $result=  
      $pdo ->exec("insert into regist(family_name, last_name, family_name_kana, last_name_kana, mail, password, gender,  postal_code, prefecture, address_1, address_2, authority, delete_flag, registered_time, update_time)
      values('$family_name', '$last_name', '$family_name_kana', '$last_name_kana', '$mail', '$hashed_password', '$gender', '$postal_code', '$prefecture', '$address_1', '$address_2', '$authority', '1', '$time', '$time')");

?>

<!doctype HTML>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>アカウント登録完了画面</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
    
<header>
    <img src="diblog_logo.jpg">
      <ul  class="menu">
        <li>トップ</li>
        <li>プロフィール</li>
        <li>D.I.Blogについて</li>
        <li>登録フォーム</li>
        <li>問い合わせ</li>
        <li>その他</li>
        <li><a href="regist.php">アカウント登録</a></li>
      </ul>
  </header>
    
    
  <h1>アカウント登録完了画面</h1>
  
  <?php
  if ($result !== false) {
    session_unset();
    session_destroy();
  ?>
    
    <div class="complete">
      <p>登録完了しました</p> 
      <form action="index.html" method="post">
        <input type="submit" class="button2" value="TOPページに戻る">
    </div>
      
  <?php
   } else { 
       echo "<div class='error-message'>エラーが発生したためアカウント登録できません</div>";
   }
  ?>
    
    
  <footer>
    <p>Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</p>
  </footer>
    
</body>
</html>
  