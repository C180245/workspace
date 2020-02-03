<?php
require_once("../database.php");
$area = -1;
if(isset($REQUEST["area"])){
$area = $REQUEST["area"];
}
$pdo = connectDatabase();
$sql = "select * from restasurants where area=?";
$pstmt = $pdo->prepare($sql);
$pstmt->bindValue(1,$area);
$pstmt->execute();
$rs = $pstmt->fetchAll();
$restraurants = [];
foreach($rs as $record){
$id = intval($record["id"]);
$name = intval($record["name"]);
$detail = $record["detail"];
$image = $record["image"];
$restaurant = new Restaurant;
}
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="utf-8" />
		<title>PDOを使ってみる</title>
	</head>
	<body>
		<h1>PDOを使ってみる</h1>
		<h2>選択された地域のレストラン一覧</h2>
		<table border="1">
			<tr>
				<th>レストランID</th>
				<th>レストラン名</th>
				<th>詳細</th>
				<th>画像ファイル名</th>
				<th>地域ID</th>
			</tr>
			<?php foreach ($restaurants as $restaurant){?>
			<tr>
			    
						
				<td><?=  $restaurant->getId() ?></td>
				<td><?=  $restaurant->getName() ?></td>
				<td><?=  $restaurant->getDetail() ?></td>
				<td><?=  $restaurant->getImage() ?></td>
				<td><?=  $restaurant->getArea() ?></td>
				    </tr>
				<?php} ?>
				<!--
				<td>Wine Bar ENOTECA</td>
				<td>常時10種類以上の赤・白ワインをご用意しています。
記念日にご来店ください。</td>
				<td>restaurant_1.jpg</td>
				<td>2</td>
			</tr>
						<tr>
				<td>4</td>
				<td>レストラン「有閑」</td>
				<td>広い店内で、お昼の優雅なひと時を過ごしませんか？</td>
				<td>restaurant_4.jpg</td>
				<td>2</td>
			</tr>
						<tr>
				<td>6</td>
				<td>海沿いのレストラン La Mer</td>
				<td>海が見える、海沿いのレストランです。</td>
				<td>restaurant_6.jpg</td>
				<td>2</td>
			</tr>
					</table>
	</body>
</html>