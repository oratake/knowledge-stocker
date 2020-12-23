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
	submitArticle($_POST['title'], $_POST['article']);
	echo '書き込めました';
	exit;

	// echo 'タイトル: '.$_POST['title']."\n";
	// echo '内容: '.$_POST['article'];

	function submitArticle($title, $article)
	{
		$filename = 'test_article.csv';

		if(is_writable($filename)){
			// fopenは開けないとき(bool)falseが返る
			$article_filepointer = fopen($filename, 'a');
			if($article_filepointer === false){
				echo 'ファイルが開けませんでした';
				exit;
			}

			$line = $title.','.$article;
			fwrite($article_filepointer, $line."\n");
			fclose($article_filepointer);

			return true;
		} else {
			echo '書き込めませんでした';
			exit;
		}
	}