<?php

	const SUBMIT_STATUS_SUCCESS = 0;
	const SUBMIT_STATUS_ERROR_COULD_NOT_OPENED = 1;
	const SUBMIT_STATUS_ERROR_COULD_NOT_WRITTEN = 2;

	if($_SERVER['REQUEST_METHOD'] !== 'POST'){
		echo 'POSTではないです';
		exit;
	}

	if($_POST['title'] === '' || $_POST['article'] === ''){
		echo 'POSTが空です';
		exit;
	}

	// 記事の投稿
	switch(submitArticle($_POST['title'], $_POST['article'])) {
		case SUBMIT_STATUS_SUCCESS:
			header('Location: ./index.php');
			break;
		case SUBMIT_STATUS_ERROR_COULD_NOT_OPENED:
			echo 'ファイルが開けませんでした';
			break;
		case SUBMIT_STATUS_ERROR_COULD_NOT_WRITTEN:
			echo '書き込めませんでした';
			break;
	};
	exit;



	function submitArticle($title, $article): int
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

		return SUBMIT_STATUS_SUCCESS;
	}