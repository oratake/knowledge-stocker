<?php
	$hello = 'Hello, world.';

	$articles = getArticles();
	var_dump($articles);
	exit;



	function getArticles()
	{
		$dsn = 'mysql:host=mysql;dbname=knowledge_db;charset=utf8';
		$db_user = 'root';
		$db_pass = 'root';

		try {
			$pdo = new PDO($dsn, $db_user, $db_pass);

			$articles = $pdo->query(
				'SELECT * FROM tbl_articles'
			)
				->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			exit('DB接続失敗'.$e->getMessage());
		}

		return $articles;
	}



	function testGetArticles()
	{
		exit;
		$filepointer = fopen('test_article.csv', 'r');

		// TODO: ファイルが空だった際の処理

		// csvをパース
		$articles_parsed = [];
		while($row = fgetcsv($filepointer)){
			$articles_parsed[] = $row;
		}

		// 配列を以下の形状に
		// $articles = [
		//     'id'      => 'id',
		//     'title'   => 'タイトル',
		//     'article' => '記事内容',
		// ]
		$articles = [];
		foreach($articles_parsed as $article_parsed){
			$articles[] = [
				'id' => $articles_parsed[0],
				'title' => $article_parsed[1],
				'article' => $article_parsed[2],
				];
		}

		fclose($filepointer);

		return $articles;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $hello; ?></title>
</head>
<body>
	<h1><?= $hello; ?></h1>
	<div id="posts">
		<h2>一覧</h2>

		<?php if($articles === []): ?>
		<div>
			表示する記事がありません
		</div>
		<?php else: ?>
		<?php foreach($articles as $article): ?>
		<div>
			<h3><?= $article['title']; ?></h3>
			<p><?= $article['article']; ?></p>
		</div>
		<?php endforeach; ?>
		<?php endif; ?>
	</div>

	<div id="form">
		<form action="./submit.php" method="POST">
			<div>
				<label for="title">タイトル</label>
				<input type="" name="title">
			</div>
			<div>
				<label for="article">記事</label>
				<textarea name="article"></textarea>
			</div>
			<input type="submit" value="送信">
		</form>
	</div>
</body>
</html>