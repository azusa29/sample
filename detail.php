<!-- 商品購入機能 -->
<?php
session_start();
require 'header.php';
require 'connectDB.php';
echo '<main id="main">';
?>

<!-- 商品の画像と情報を表示させる -->

	<section id="m-wrap">

		<h2 id="pageTitle">
		<?php
		$sql = $pdo -> prepare('select * from products where product_id = ?');
		$sql -> execute([$_REQUEST['id']]);
		foreach ( $sql as $item) {
				echo $item['name'];
		}
		?>
		</h2>

		<?php
		 // 商品一覧から選択した詳細飛ぶ時の番号を持ってくる
		 $sql = $pdo -> prepare('select * from products where product_id = ?');
		 $sql -> execute([$_REQUEST['id']]);


		echo '<div id=dt-tip>';
		// 商品詳細情報を表示する
			echo '<table id=detail>';
				foreach ( $sql as $item) {
					$id =$_REQUEST['id'];
					echo '<p id="dt-image"><img src="image/product', $id, '.jpg" class="productImg"></p>';
					echo '<form action="cart_insert.php" method="post">';
					echo '<tr><th id="dt-title">商品名：</th><td>', $item['name'], '</td></tr>';
					echo '<tr><th id="dt-price">価格：</th><td>', $item['price'], '円<span>（税込）</span></td></tr>';
					echo '<tr><th id="dt-description">説明：</th><td id="dt-coment">', $item['description'], '</td></tr>';
					echo '<tr><th id="dt-count">個数：</th><td><select name="count" class="selectCount">';
					for($i = 1; $i <= 20; $i++){
						echo '<option value="', $i, '">', $i, '</option>';
					}
					echo '</select></td></tr>';
					echo '<input type="hidden" name="id" value="', $id, '">';
					echo '<input type="hidden" name="name" value="', $item['name'], '">';
					echo '<input type="hidden" name="price" value="', $item['price'], '">';
					echo '<tr id="cartIn"><td colspan = "2"><input type="submit" value="カートへ追加" class="bigButton cartIn"></td></tr>';
					echo '</form>';
				}
			echo '</table>';

		echo '</div>';

		$sql = $pdo -> prepare('select * from products where product_id = ?');
		$sql -> execute([$_REQUEST['id']]);
			foreach ( $sql as $item) {
				$id =$_REQUEST['id'];
				echo '<p id="favoriteIn"><a href="favorite-insert.php?id=', $id, '" class="bigButton favoriteIn">お気に入りに追加</a></p>';
			}
			
		?>

		<?php
		//前の画面に戻る
		echo '<br><p id="pageBack"><input type="button" onclick="history.back()" value="戻る" class="smallButton"></p>';

	echo '</section>';
echo '</main>';
?>
<?php
require 'footer.php';
?>
