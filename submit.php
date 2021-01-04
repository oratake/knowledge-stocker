<?php

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
		case 0:
			echo '書き込めました';
			break;
		case 1:
			echo 'ファイルが開けませんでした';
			break;
		case 2:
			echo '書き込めませんでした';
			break;
	};
	exit;

	function submitArticle($title, $article)
	{
		$filename = 'test_article.csv';

		if(is_writable($filename)){
			// fopenは開けないとき(bool)falseが返る
			$article_filepointer = fopen($filename, 'c+');
			if($article_filepointer === false){
				return 1;
			}

			// idを振る
			// csvをパース
			$articles_parsed = [];
			while($row = fgetcsv($article_filepointer)){
				$articles_parsed[] = $row;
			}
			// 最後のidを取得
			$last_id = 0;
			foreach($articles_parsed as $article_parsed) {
				if($last_id <= (int)$article_parsed[0]){
					$last_id = (int)$article_parsed[0];
				}
			}

			$article_line = [($last_id + 1), $title, $article];
			fputcsv($article_filepointer, $article_line, ',');
			fclose($article_filepointer);

			return 0;
		} else {
			return 2;
		}
	}