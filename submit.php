<?php declare(strict_types=1);
	if($_SERVER['REQUEST_METHOD'] !== 'POST'){
		echo 'POSTではないです';
		exit;
	}

	if($_POST['title'] === '' || $_POST['article'] === ''){
		echo 'POSTが空です';
		exit;
	}

	// 記事の投稿
	if(submitArticle($_POST['title'], $_POST['article'])) {
		header('Location: ./index.php');
		exit;
	};
	exit('Submit Error.');



	/**
	 * submitArticle
	 *
	 * @param $title
	 * @param $article
	 * @return bool
	 */
	function submitArticle($title, $article): bool
	{
		// data source nameの指定
		$dsn = 'mysql:host=mysql;dbname=knowledge_db;charset=utf8';
		$db_user = 'root';
		$db_pass = 'root';

		try {
			$dbh = new PDO($dsn, $db_user, $db_pass);
		} catch (PDOException $e) {
			exit('DB接続失敗'.$e->getMessage());
		}

		$stmt = $dbh->prepare("INSERT INTO tbl_articles (title, article_body) values (:title, :article)");

		$dbh->beginTransaction();

		try {
			$stmt->execute([
				':title' => $title,
				':article' => $article,
			]);
			$dbh->commit();
		} catch (PDOException $e) {
			exit('DB更新失敗'.$e->getMessage());
		}

		return true;
	}