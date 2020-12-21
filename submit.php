<?php
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		echo 'POSTでした';
	} else {
		echo 'POSTではないです';
	}