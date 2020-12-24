<?php
	$hello = 'Hello, world.';

	$articles = getArticles();

	function getArticles()
	{
		return [
			[
				'title' => 'タイトル1',
				'article' => '記事1'
			],
			[
				'title' => 'タイトル2',
				'article' => '記事2'
			],
		];
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
		<?php foreach($articles as $article): ?>
		<div>
			<h3><?= $article['title']; ?></h3>
			<p><?= $article['article']; ?></p>
		</div>
		<?php endforeach; ?>
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