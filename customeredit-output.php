
<?php session_start();?>
<?php require 'header.php';?>
<div id="m-wrap">
	<?php
	require 'connectDB.php';
	// <!-- ログインしている→自分意外のユーザーIDと重複がないか
	// 被っていたら$sqlに値を返す -->
		$customer_id=$_SESSION['customer']['customer_id'];
		$sql=$pdo->prepare('select * from customer where customer_id!=? and login_id=?');
		$sql->execute([$customer_id, $_REQUEST['login_id']]);

	// <!-- $qlの中身が入っているか空かを確認 -->
	if (empty($sql->fetchAll())) {
	// <!-- 空→重複なし true -->
	// <!-- 情報の更新＋セッションデータの更新 -->
		// $sql=$pdo->prepare('update customer set customer_kanji=?, customer_hurigana=?, birth=?, gender=?, postcode=?, prefecture=?, address=?, phone_number=?, customer_mail=?, login_id=?, login_password=?, credit_number=?, security_question=?, security_answer=? where customer_id=?');
		// $sql->execute([$_REQUEST['customer_kanji'], $_REQUEST['customer_hurigana'], $_REQUEST['birth'], $_REQUEST['gender'], $_REQUEST['postcode'], $_REQUEST['prefecture'], $_REQUEST['address'], $_REQUEST['phone_number'], $_REQUEST['customer_mail'], $_REQUEST['login_id'], $_REQUEST['login_password'], $_REQUEST['credit_number'],$_REQUEST['security_question'], $_REQUEST['security_answer'],$customer_id]);

	// データベースの情報をinsartで更新
		if (isset($_SESSION['customer'])) {
		$sql=$pdo->prepare('update customer set customer_kanji=?, customer_hurigana=?, birth=?, gender=?, postcode=?, prefecture=?, address=?, phone_number=?, customer_mail=?, login_id=?, login_password=?, credit_number=?, security_question=?, security_answer=? where customer_id=?');
		$sql->execute([$_REQUEST['customer_kanji'], $_REQUEST['customer_hurigana'], $_REQUEST['birth'], $_REQUEST['gender'], $_REQUEST['postcode'], $_REQUEST['prefecture'], $_REQUEST['address'], $_REQUEST['phone_number'], $_REQUEST['customer_mail'], $_REQUEST['login_id'], $_REQUEST['login_password'], $_REQUEST['credit_number'],$_REQUEST['security_question'], $_REQUEST['security_answer'], $_SESSION['customer']['customer_id']]);

	// セッションの内容を更新内容に合わせて更新
	// $_SESSION['customer']=[
	// 		'customer_id'=>$row['customer_id'], 
	// 		'customer_kanji'=>$row['customer_kanji'],
	// 		'customer_hurigana'=>$row['customer_hurigana'],
	// 		'birth'=>$row['birth'],
	// 		'gender'=>$row['gender'],
	// 		'postcode'=>$row['postcode'],
	// 		'prefecture'=>$row['prefecture'],
	// 		'address'=>$row['address'],
	// 		'phone_number'=>$row['phone_number'],
	// 		'customer_mail'=>$row['customer_mail'],
	// 		'login_id'=>$row['login_id'],
	// 		'login_id'=>$row['login_id'],
	// 		'login_password'=>$row['login_password'],
	// 		'credit_number'=>$row['credit_number'],
	// 		'security_question'=>$row['security_question'],
	// 		'security_answer'=>$row['security_answer'],
	// 	];

		echo '登録内容の更新が完了いたしました。';
		
		echo '<hr>';
		require 'index.php';

		var_dump ($_REQUEST['customer_kanji'],$_REQUEST['customer_hurigana'],$_REQUEST['birth'],$_REQUEST['gender'],$_REQUEST['postcode'],$_REQUEST['prefecture'],$_REQUEST['address'],$_REQUEST['phone_number'],$_REQUEST['customer_mail'],$_REQUEST['login_id'],$_REQUEST['login_password'],$_REQUEST['credit_number'],$_REQUEST['security_question'],$_REQUEST['security_answer'],$customer_id);

	  print_r($sql->errorInfo());
	// <!-- 入っている→ログインIDに重複あり else -->
	}
	} else {
		echo 'ログイン名がすでに使用されていますので、変更してください。';

		// yokoi 飛ばす追加
		echo '<hr>';
		require 'customer_edit_input.php';
		// yokoi 飛ばす追加
		
	}

	?>
</div>

<?php require 'footer.php'; ?>