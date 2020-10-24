<?php session_start();?>
<?php require 'header.php';
?>
<div id="contact-wrap">
	<h2 id="pageTitle">お問い合わせ</h2>
	<?php
	if (isset($_SESSION['customer'])) {
	  // ユーザーがログインしていればお問い合わせ情報入力画面
	  echo '<form action="contact-output.php" method="post">';
	  echo '<p>お名前</p>';
	  echo '<input type="text" name="namae" id="contadtName">';
	  echo '<p>メールアドレス</p>';
	  echo '<input type="email" name="email" value="info@example.com">';
	  echo '<p>お問い合わせ内容</p>';
	  echo '<textarea name="inquiry_detail" placeholder="コメント"></textarea>';
	  echo '<p><input type="submit" value="送信" class="bigButton contactButton"></p>';
	} else {
	  echo '<p class="loginRequest">ログインしてください。</p>';
	}

	?>
</div>
<?php
require 'footer.php';
?>
