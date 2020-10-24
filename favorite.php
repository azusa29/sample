
	<div id="m-wrap">
		<h2 id='pageTitle'>お気に入り</h2>
		<?php
		if (isset($_SESSION['customer'])) {
			echo '<table border="1" class="favoriteTable">';
			echo '<tr><th class="fa-ta-n">商品番号</th><th class="fa-ta-p">商品名</th><th class="fa-ta-p">価格</th><th></th></tr>';
			require 'connectDB.php';
			$sql=$pdo->prepare('select * from favorite, products where customer_id=? and favorite.product_id=products.product_id');
			$sql->execute([$_SESSION['customer']['customer_id']]);
			foreach ($sql as $row) {
				$id=$row['product_id'];
				echo '<tr>';
				echo '<td class="fav-id">', $id, '</td>';
				echo '<td class="fav-name"><a href="detail.php?id='.$id.'">', $row['name'], 
					'</a></td>';
				echo '<td class="fav-price">', $row['price'], '</td>';
				echo '<td class="fav-delete"><a class="smallButton" href="favorite-delete.php?id=', $id, 
					'">削除</a></td>';
				echo '</tr>';
			}
			echo '</table>';
		} else {
			echo 'お気に入りを表示するには、ログインしてください。';
		}
	echo '</div>';

?>
