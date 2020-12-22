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

	echo 'タイトル: '.$_POST['title']."\n";
	echo '内容: '.$_POST['article'];

	function submitArticle($title, $article)
	{
		return true;
	}