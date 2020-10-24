<?php
require 'header.php';
require 'connectDB.php';
echo '<main id="main">';
?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=coffeeshop;charset=utf8', 'root', '');

// <!-- ログインしているか -->
if (isset($_SESSION['customer'])) {
// <!-- ログインしている→自分意外のユーザーIDと重複がないか
// 被っていたら$sqlに値を返す -->
	$customer_id=$_SESSION['customer']['customer_id'];
	$sql=$pdo->prepare('select * from customer where customer_id!=? and login_id=?');
	$sql->execute([$customer_id, $_REQUEST['login_id']]);
} else {
// <!-- ログインしていない→既存ユーザーと重複がないか
// 被っていたら$sqlに値を返す -->
	$sql=$pdo->prepare('select * from customer where login_id=?');
	$sql->execute([$_REQUEST['login_id']]);
}

// <!-- $qlの中身が入っているか空かを確認 -->
if (empty($sql->fetchAll())) {
// <!-- 空→重複なし true -->
	if (isset($_SESSION['customer'])) {
// <!-- true→ifでログインユーザーかを確認 -->
		echo 'ログイン中';

	}else {
// <!-- ログインユーザー　→　情報の更新＋セッションデータの更新 -->
	$sql=$pdo->prepare('insert into customer values(null,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
	$sql->execute([$_REQUEST['customer_kanji'], $_REQUEST['customer_hurigana'], $_REQUEST['birth'], $_REQUEST['gender'], $_REQUEST['postcode'], $_REQUEST['prefecture'], $_REQUEST['address'], $_REQUEST['phone_number'], $_REQUEST['customer_mail'], $_REQUEST['login_id'], $_REQUEST['login_password'], $_REQUEST['credit_number'],$_REQUEST['security_question'], $_REQUEST['security_answer']]);
	echo '登録ありがとうございました。';


	}

// <!-- 入っている→ログインIDに重複あり else -->
} else {
	echo 'ログイン名がすでに使用されていますので、変更してください。';
}


header('Location: login_from_userInfo.php');


?>


</main>

