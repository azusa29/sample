<?php session_start();?>
<?php require 'header.php';?>
<?php require 'connectDB.php';
echo '<main id="main">';?>
	<section id="m-wrap">
		<h2 id="pageTitle">ユーザー情報入力フォーム</h2>

		<?php
		$customer_kanji=$customer_hurigana=$birth=$gender=$postcode=$prefecture=$address=$phone_number=$customer_mail=$login_id=$login_password=$credit_number=$security_question=$security_answer='';

		if (isset($_SESSION['customer'])) {
		// ユーザーがログインしていればテキストに既存の情報を表示させる
		}

		echo '<form action="customer-output.php" method="post" class="cu-form">';
		echo '<table id="cu-table">';

		echo '<tr><th>お名前</th><td>';
		echo '<input type="text" name="customer_kanji" placeholder="山田　太郎" value="', $customer_kanji, '"  maxlength="200">';
		echo '</td></tr>';

		echo '<tr><th>フリガナ</th><td>';
		echo '<input type="text" name="customer_hurigana" placeholder="ヤマダ　タロウ" value="', $customer_hurigana, '"  maxlength="200">';
		echo '</td></tr>';
			
		echo '<tr><th>ログインID</th><td>';
		echo '<input type="text" name="login_id" placeholder="半角英数字6文字以上" value="', $login_id, '"  maxlength="200">';
		echo '</td></tr>';

		echo '<tr><th>Eメールアドレス</th><td>';
		echo '<input type="text" name="customer_mail" placeholder="abc@coffee.co.jp" value="', $customer_mail, '"  maxlength="200">';
		echo '</td></tr>';
			
		echo '<tr><th>郵便番号</th><td>';
		echo '<input type="text" name="postcode" placeholder="ハイフンなしで入力" value="', $postcode, '"  maxlength="200">';
		echo '</td></tr>';	
			
		echo '<tr><th>都道府県</th><td>';
		echo '<input type="text" name="prefecture" placeholder="東京都" value="', $prefecture, '"  maxlength="200">';
		echo '</td></tr>';

		echo '<tr><th>ご住所 (市区町村以下)</th><td>';
		echo '<input type="text" name="address" placeholder="新宿区西新宿２丁目８−１　○○マンション○号室" value="', $address, '" size="60" maxlength="200">';
		echo '</td></tr>';
			
		echo '<tr><th>お電話番号</th><td>';
		echo '<input type="text" name="phone_number" placeholder="ハイフンなしで入力" value="', $phone_number, '"  maxlength="200">';
		echo '</td></tr>';

		echo '<tr><th>性別</th><td>';
		echo '<input type="radio" name="gender" value="指定なし">指定なし';
		echo '<input type="radio" name="gender" value="男性">男性';	
		echo '<input type="radio" name="gender" value="女性">女性';	
		echo '</td></tr>';

		echo '<tr><th>生年月日</th><td>';
		echo '<input type="text" name="birth" placeholder="数字8桁で入力　【例】1990年9月9日の場合：19900909" value="', $birth, '"  maxlength="200">';
		echo '</td></tr>';	
			
		echo '<tr><th>パスワード</th><td>';
		echo '<input type="password" name="login_password" placeholder="半角英数字6文字以上" value="', $login_password, '"  maxlength="200">';
		echo '</td></tr>';
			
		echo '<tr><th>パスワード (確認)</th><td>';
		echo '<input type="password" name="login_password2" placeholder="確認のため再入力してください" value=""  maxlength="200">';
		echo '</td></tr>';
			
		echo '<tr><th>秘密の質問</th><td>';
		echo '<select name="security_question" style="width : 460px">';
		echo '<option value="ペットの名前は？">ペットの名前は？</option>';
		echo '<option value="卒業した小学校の名前は？">卒業した小学校の名前は？</option>';
		echo '<option value="好きな食べ物は？">好きな食べ物は？</option>';
		echo '</select>';
		echo '</td></tr>';

		echo '<tr><th>秘密の質問の答え</th><td>';
		echo '<input type="text" name="security_answer" placeholder="選択した質問の答えを入力してください" value="', $security_answer, '" maxlength="200">';
		echo '</td></tr>';	

		echo '<tr><th>クレジットカード番号</th><td>';
		echo '<input type="text" name="credit_number" placeholder="クレジットカードでお支払いされる場合のみ登録" value="', $credit_number, '" maxlength="200">';
		echo '</td></tr>';
		echo '</table>';

		echo '<div class="submit">';
			
			echo '<input type="submit" name="" value="登録" class="bigButton">';
			echo '<input type="button" onclick="history.back()" value="キャンセル" class="bigButton">';
		echo '</div>';

		echo '</form>';

		?>
	</section>
</main>
<?php require 'footer.php'; ?>