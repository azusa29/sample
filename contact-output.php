<?php session_start();?>
<?php require 'header.php';?>
<?php
require 'connectDB.php';
echo '<div id=m-wrap>';
	echo '<h2 id="pageTitle">お問い合わせ完了</h2>';
		// $_SESSION['customer'])からユーザーIDの取得

		// ユーザーID・問合せ内容・問合せ日時をDBに追加
	$date = date('Y-m-d H:i:s');
	$sql=$pdo->prepare('insert into contact values(null,?,?,?)');
	if($sql->execute([$_SESSION['customer']['customer_id'],$_REQUEST['inquiry_detail'],$date])) {
		echo '<p class="contactMessage">お問合せありがとうございました。</p>';
	} else {
		echo '<p class="contactMessage">お問合せ内容を送信できませんでした。</p>';
	}

echo '</div>';
require 'footer.php';
?>

<!-- $SESSION_['customer']['id'], -->
