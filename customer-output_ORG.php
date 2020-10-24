<?php session_start();?>
<?php require 'header.php';?>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=coffeeshop;charset=utf8', 'root', '');

// 重複しているログインIDがないか確認
if (isset($_SESSION['customer'])) {
	$customer_id=$_SESSION['customer']['customer_id'];
	$sql=$pdo->prepare('select * from customer where customer_id!=? and login_id=?');
	$sql->execute([$customer_id, $_REQUEST['login_id']]);
} else {
	$sql=$pdo->prepare('select * from customer where login_id=?');
	$sql->execute([$_REQUEST['login_id']]);
}
// ログインしているかどうか判断。emptyなら被っていない。被っていたらelse実行

if (empty($sql->fetchAll())) {
	if (isset($_SESSION['customer'])) {
// Trueならログイン状態なので情報の更新を実行
		$sql=$pdo->prepare('update customer set '.
			'customer_kanji=?, customer_hurigana=?, '.
			'login_id=?, customer_mail=?, postcode=?, '.
			' prefecture=?, address=?, phone_number=?, '.
			'gender=?, birth=?, login_password=?, '.
			'security_question=?, security_answer=?, '.
			'credit_number=? where customer_id=?');
		$sql->execute([
			$_REQUEST['customer_kanji'], $_REQUEST['customer_hurigana'], $_REQUEST['login_id'], $_REQUEST['customer_mail'], $_REQUEST['postcode'], $_REQUEST['prefecture'], $_REQUEST['address'], $_REQUEST['phone_number'], $_REQUEST['gender'], $_REQUEST['birth'], $_REQUEST['login_password'], $_REQUEST['security_question'], 
				$_REQUEST['security_answer'], $_REQUEST['credit_number'],$customer_id]);

// ユーザー情報の更新完了→セッション内データの更新

		// $_SESSION['customer']=[
		// 	'customer_id'=>$customer_id, 'customer_kanji'=>$_REQUEST['customer_kanji'], 'customer_hurigana'=>$_REQUEST['customer_hurigana'], 'login_id'=>$_REQUEST['login_id'], 'customer_mail'=>$_REQUEST['customer_mail'], 'postcode'=>$_REQUEST['postcode'], 'prefecture'=>$_REQUEST['prefecture'], 'address'=>$_REQUEST['address'], 'phone_number'=>$_REQUEST['phone_number'], 'gender'=>$_REQUEST['gender'], 'birth'=>$_REQUEST['birth'], 'login_password'=>$_REQUEST['login_password'], 'security_question'=>$_REQUEST['security_question'], 'security_answer'=>$_REQUEST['security_answer'], 'credit_number'=>$_REQUEST['credit_number']];
		// 	echo 'お客様情報を更新しました。';
	} else {
// elseならログインしていない状態なので情報の追加を実行
		$sql=$pdo->prepare('insert into customer values'.
			'(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)');
		$sql->execute([
		$_REQUEST['customer_kanji'], $_REQUEST['customer_hurigana'], $_REQUEST['birth'], $_REQUEST['gender'], $_REQUEST['postcode'], $_REQUEST['prefecture'], $_REQUEST['address'], $_REQUEST['phone_number'], $_REQUEST['customer_mail'], $_REQUEST['login_id'], $_REQUEST['login_password'], $_REQUEST['credit_number'], 
			$_REQUEST['security_question'], $_REQUEST['security_answer']]);
		echo 'ご登録ありがとうございました。';
	}
} else {
	echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>

<form action="index.php">
	<input type="submit" value="HOMEへ">
</form>
<form action="mypage.php">
	<input type="submit" value="マイページへ">
</form>
<?php require 'footer.php';?>
