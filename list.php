<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウント登録画面</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    
<body>
    
<?php
  mb_internal_encoding("utf8");
  $pdo = new PDO("mysql:dbname=regist;host=localhost;","root","");
  $stmt = $pdo->query("select * from regist order by id desc");
?>

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
        <li><a href="list.php">アカウント一覧</a></li>
      </ul>
  </header>
    
  <main>
    <h1>アカウント一覧画面</h1>

    <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>名前（姓）</th>
            <th>名前（名）</th>
            <th>カナ（姓）</th>
            <th>カナ（名）</th>
            <th>メールアドレス</th>
            <th>性別</th>
            <th>アカウント権限</th>
            <th>削除フラグ</th>
            <th>登録日時</th>
            <th>更新日時</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while ($row = $stmt->fetch()) {
            echo "<tr>";
              echo "<td>{$row['id']}</td>";
              echo "<td>{$row['family_name']}</td>";
              echo "<td>{$row['last_name']}</td>";
              echo "<td>{$row['family_name_kana']}</td>";
              echo "<td>{$row['last_name_kana']}</td>";
              echo "<td>{$row['mail']}</td>";
              echo "<td>";
                if($row['gender'] == 0){
                  echo "男";
                }elseif($row['gender'] == 1){
                  echo "女";
                }
              echo "</td>";
              
              echo "<td>";
                if($row['authority'] == 0){
                  echo "一般";
                }elseif($row['authority'] == 1){
                  echo "管理者";
                }
              echo "</td>";
              
              echo "<td>";
                if($row['delete_flag'] == 0){
                  echo "有効";
                }elseif($row['delete_flag'] == 1){
                  echo "無効";
                }
              "</td>";
              
              echo "<td>";
              echo date('Y/m/d',strtotime($row['registered_time']));
              echo "</td>";
              
              echo "<td>";
              echo date('Y/m/d',strtotime($row['update_time']));
              echo "</td>";
              
              echo "<td><a href='update.php'>更新</a> | <a href='delete.php'>削除</a></td>";
            echo "</tr>";
          }
        ?>
        </tbody>
    </table>
</main>

    
  <footer>
    <p>Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</p>
  </footer>
    
</body>
</html>