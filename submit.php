<?php
	if($_SERVER['REQUEST_METHOD'] !== 'POST'){
		echo 'POSTではないです';
		exit;
	}
	echo 'タイトル: '.$_POST['title']."\n";
	echo '内容: '.$_POST['article'];