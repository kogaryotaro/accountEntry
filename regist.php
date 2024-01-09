<?php
session_start();

// POST リクエストを処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値をセッションに保存
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['family_name'] = $_POST['family_name'];
    $_SESSION['last_name_kana'] = $_POST['last_name_kana'];
    $_SESSION['family_name_kana'] = $_POST['family_name_kana'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['postal_code'] = $_POST['postal_code'];
    $_SESSION['prefecture'] = $_POST['prefecture'];
    $_SESSION['address_1'] = $_POST['address_1'];
    $_SESSION['address_2'] = $_POST['address_2'];
    $_SESSION['authority'] = $_POST['authority'];
    // 確認画面にリダイレクト
    header('Location: regist_confirm.php');
    exit;
}
?>


<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>アカウント登録画面</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
    
  <main>
  <h1>アカウント登録画面</h1>
  <form method="post" action="regist.php">
      
    <div>
      <label>名前(性)　　</label>
      <input type="text" class="text" size="35" name="family_name" value="<?php echo (!empty($_SESSION['family_name'])) ? $_SESSION['family_name'] : ''; ?>">
    </div>
    
    <div>
      <label>名前(名)　　</label>
      <input type="text" class="text" size="35" name="last_name" value="<?php echo (!empty($_SESSION['last_name'])) ? $_SESSION['last_name'] : ''; ?>">
    </div>
      
    <div>
      <label>カナ(性)　　</label>
      <input type="text" class="text" size="35" name="family_name_kana" value="<?php echo (!empty($_SESSION['family_name_kana'])) ? $_SESSION['family_name_kana'] : ''; ?>">
    </div>
      
    <div>
      <label>カナ(名)　　</label>
      <input type="text" class="text" size="35" name="last_name_kana" value="<?php echo (!empty($_SESSION['last_name_kana'])) ? $_SESSION['last_name_kana'] : ''; ?>">
    </div>  
    
    <div>
      <label>メールアドレス　　</label>
      <input type="text" class="text" size="35" name="mail" value="<?php echo (!empty($_SESSION['mail'])) ? $_SESSION['mail'] : ''; ?>">
    </div>
      
    <div>
      <label>パスワード　　</label>
      <input type="text" class="text" size="35" name="password" value="<?php echo (!empty($_SESSION['password'])) ? $_SESSION['password'] : ''; ?>">
    </div>  
    
   <div>
      <label>性別　　</label>
      <label for="male">男</label>
      <input type="radio" class="text" checked="checked" name="gender" value="0" <?php echo (!empty($_SESSION['gender']) && $_SESSION['gender'] === '0') ? 'checked' : ''; ?>>
      <label for="female">女</label>
      <input type="radio" class="text" name="gender" value="1" <?php echo (!empty($_SESSION['gender']) && $_SESSION['gender'] === '1') ? 'checked' : ''; ?>>
   </div>
      
    <div>
      <label>郵便番号　　</label>
      <input type="text" class="text" size="10" name="postal_code" value="<?php echo (!empty($_SESSION['postal_code'])) ? $_SESSION['postal_code'] : ''; ?>">
    </div>
      
    <div>
  <label>住所(都道府県)　　</label>
  <select class="text" name="prefecture">
    <option value="" <?php echo (empty($_SESSION['prefecture']) || $_SESSION['prefecture'] === '') ? 'selected' : ''; ?>> </option>
    <?php
      $prefectures = array(
        '北海道', '青森県', '岩手県', '宮城県', '秋田県',
        '山形県', '福島県', '茨城県', '栃木県', '群馬県',
        '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県',
        '富山県', '石川県', '福井県', '山梨県', '長野県',
        '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県',
        '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
        '鳥取県', '島根県', '岡山県', '広島県', '山口県',
        '徳島県', '香川県', '愛媛県', '高知県', '福岡県',
        '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県',
        '鹿児島県', '沖縄県'
      );

      foreach ($prefectures as $prefecture) {
        echo '<option value="' . $prefecture . '"';
        echo (!empty($_SESSION['prefecture']) && $_SESSION['prefecture'] === $prefecture) ? ' selected' : '';
        echo '>' . $prefecture . '</option>';
      }
    ?>
  </select>
</div>


      
    <div>
      <label>住所(市区町村)　　</label>
      <input type="text" class="text" size="35" name="address_1" value="<?php echo (!empty($_SESSION['address_1'])) ? $_SESSION['address_1'] : ''; ?>">
    </div>
      
    <div>
      <label>住所(番地)　　</label>
      <input type="text" class="text" size="35" name="address_2" value="<?php echo (!empty($_SESSION['address_2'])) ? $_SESSION['address_2'] : ''; ?>">
    </div>
      
    <div>
      <label>アカウント権限　　</label>
      <select class="text" name="authority">
        <option selected value="0" <?php echo (!empty($_SESSION['authority']) && $_SESSION['authority'] === '0') ? 'selected' : ''; ?>>一般</option>
        <option value="1" <?php echo (!empty($_SESSION['authority']) && $_SESSION['authority'] === '1') ? 'selected' : ''; ?>>管理者</option>
      </select>
    </div>  
      
    <div>
      <input type="submit" class="submit" value="確認する">
    </div>
      
    
      
  </form>
  </main>
    
  <footer>
    <p>Copyright D.I.works| D.I.blog is the one which provides A to Z about programming</p>
  </footer>
    
</body>
</html>