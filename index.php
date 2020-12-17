<?php
    $hello = 'Hello, world.';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $hello; ?></title>
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <!-- MD Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.css" rel="stylesheet"/>
</head>
<body>
    <h1><?= $hello; ?></h1>

    <!-- MD Bootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.js"></script>
</body>
</html>