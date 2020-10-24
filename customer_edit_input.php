<?php session_start();?>
<?php require 'header.php';?>

<div id="m-wrap">
<p>ユーザー情報入力フォーム</p>

<?php

// URLから直接アクセスした場合を考えてログインしていない場合はログインを促す
require 'login_check.php';

// 変数の定義
// $customer_kanji=$customer_hurigana=$birth=$gender=$postcode=$prefecture=$address=$phone_number=$customer_mail=$login_id=$login_password=$credit_number=$security_question=$security_answer='';

// 変数にセッションデータを代入

$customer_kanji = $_SESSION['customer']['customer_kanji'];
$customer_hurigana = $_SESSION['customer']['customer_hurigana'];
$birth = $_SESSION['customer']['birth'];
$gender = $_SESSION['customer']['gender'];
$postcode = $_SESSION['customer']['postcode'];
$prefecture = $_SESSION['customer']['prefecture'];
$address = $_SESSION['customer']['address'];
$phone_number = $_SESSION['customer']['phone_number'];
$customer_mail = $_SESSION['customer']['customer_mail'];
$login_id = $_SESSION['customer']['login_id'];
$login_password = $_SESSION['customer']['login_password'];
$credit_number = $_SESSION['customer']['credit_number'];
$security_question = $_SESSION['customer']['security_question'];
$security_answer = $_SESSION['customer']['security_answer'];

// テキストボックスの表示

echo '<form action="customeredit-output.php" method="post">';
echo '<table>';

echo '<tr><td>お名前</td><td>';
echo '<input type="text" name="customer_kanji" placeholder="山田　太郎" value="', $customer_kanji, '" size="60" maxlength="200">';
echo '</td></tr>';

echo '<tr><td>フリガナ</td><td>';
echo '<input type="text" name="customer_hurigana" placeholder="ヤマダ　タロウ" value="', $customer_hurigana, '" size="60" maxlength="200">';
echo '</td></tr>';

echo '<tr><td>loginID</td><td>';
echo '<input type="text" name="login_id" placeholder="半角英数字6文字以上" value="', $login_id, '" size="60" maxlength="200">';
echo '</td></tr>';

echo '<tr><td>Eメールアドレス</td><td>';
echo '<input type="text" name="customer_mail" placeholder="abc@coffee.co.jp" value="', $customer_mail, '" size="60" maxlength="200">';
echo '</td></tr>';

	
echo '<tr><td>郵便番号</td><td>';
echo '<input type="text" name="postcode" placeholder="ハイフンなしで入力" value="', $postcode, '" size="60" maxlength="200">';
echo '</td></tr>';	

echo '<tr><td>都道府県</td><td>';
echo '<input type="text" name="prefecture" placeholder="東京都" value="" size="60" maxlength="200" ', $prefecture, '">';
echo '</td></tr>';

echo '<tr><td>ご住所 (市町村以下)</td><td>';
echo '<input type="text" name="address" placeholder="新宿区西新宿２丁目８−１　○○マンション○号室" value="" size="60" maxlength="200" ', $address, '">';
echo '</td></tr>';
	
echo '<tr><td>お電話番号</td><td>';
echo '<input type="text" name="phone_number" placeholder="ハイフンなしで入力" value="', $phone_number, '" size="60" maxlength="200">';
echo '</td></tr>';

echo '<tr><td>性別</td><td>';
echo '<input type="radio" name="gender" value="指定なし">指定なし';
echo '<input type="radio" name="gender" value="男性">男性';	
echo '<input type="radio" name="gender" value="女性">女性';	
echo '</td></tr>';

echo '<tr><td>生年月日</td><td>';
echo '<input type="text" name="birth" placeholder="数字8桁で入力　【例】1990年9月9日の場合：19900909" value="', $birth, '" size="60" maxlength="200">';
echo '</td></tr>';	
	
echo '<tr><td>パスワード</td><td>';
echo '<input type="password" name="login_password" placeholder="半角英数字6文字以上" value="" size="60" maxlength="200">';
echo '</td></tr>';
	
echo '<tr><td>パスワード (確認)</td><td>';
echo '<input type="password" name="login_password2" placeholder="確認のため再入力してください" value="" size="60" maxlength="200">';
echo '</td></tr>';
	
echo '<tr><td>秘密の質問</td><td>';
echo '<select name="security_question" style="width : 460px">';
echo '<option value="ペットの名前は？" >ペットの名前は？</option>';
echo '<option value="卒業した小学校の名前は？">卒業した小学校の名前は？</option>';
echo '<option value="好きな食べ物は？" size="60" maxlength="200">好きな食べ物は？</option>';
echo '</select>';
echo '</td></tr>';

echo '<tr><td>秘密の質問の答え</td><td>';
echo '<input type="text" name="security_answer" placeholder="選択した質問の答えを入力してください" value="', $security_answer, '" size="60" maxlength="200">';
echo '</td></tr>';	

echo '<tr><td>クレジットカード番号</td><td>';
echo '<input type="text" name="credit_number" placeholder="クレジットカードでお支払いされる場合のみ登録" value="', $credit_number, '" size="60" maxlength="200">';
echo '</td></tr>';
	echo '<tr class="submitButton"><td><input type="button" onclick="history.back()" value="キャンセル" class="bigButton"></td>';
	echo '<td><input type="submit" name="" value="登録" class="bigButton"></td></tr>';
echo '</table></form>'

?>
</div>

<?php require 'footer.php';?>
