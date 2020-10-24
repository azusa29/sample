<!-- yokoiお気に入り追加 -->
<?php session_start();?>

<?php require 'header.php';
// URLから直接アクセスした場合を考えてログインしていない場合はログインを促す
require 'login_check.php';
?>

 
<?php
require 'connectDB.php';
// 追加したproduct_idと一致するproduct_idを検索

$sql=$pdo->prepare('select * from favorite where customer_id=? and product_id=?');
$sql->execute([$_SESSION['customer']['customer_id'], $_REQUEST['id']]);

// $sqlの中身を確認
// trueの場合はDBに追加
// elseではすでに登録済みですのコメント表示

if (empty($sql->fetchAll())) {
	$sql=$pdo->prepare('insert into favorite values (null,?,?)');
	$sql->execute([$_SESSION['customer']['customer_id'],$_REQUEST['id']]);
	echo 'お気に入りに商品を追加しました';

		echo '<hr>';
		require 'favorite.php';

} else {
	echo '同じ商品が既に登録されています。';
	echo '<hr>';
		require 'favorite.php';
}

echo '</main>';
?>

<?php require 'footer.php';?>