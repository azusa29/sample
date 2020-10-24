<?php session_start();?>
<?php

if (isset($_SESSION['customer'])) {
  // ユーザーがログインしていればお問い合わせ情報入力画面
  echo '<p>当店への連絡事項</p>';
  echo '<form action="contact-output.php" method="post">';
  echo '<p>お問い合わせ</p>';
  echo '<textarea name="inquiry_detail" placeholder="コメント"></textarea>';
  echo '<input type="submit" value="送信">';
} else {
  echo 'ログインしてください。';
}
?>
