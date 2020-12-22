<?php
	if($_SERVER['REQUEST_METHOD'] !== 'POST'){
		echo 'POSTではないです';
		exit;
	}

	if($_POST['title'] === '' || $_POST['article'] === ''){
		echo 'POSTが空です';
		exit;
	}

	echo 'タイトル: '.$_POST['title']."\n";
	echo '内容: '.$_POST['article'];