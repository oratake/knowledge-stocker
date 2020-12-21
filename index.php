<?php
    $hello = 'Hello, world.';
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
        <div>
            <h3>title 1</h3>
            <p>
                text is here
            </p>
        </div>
        <div>
            <h3>title 2</h3>
            <p>
                text is here
            </p>
        </div>
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