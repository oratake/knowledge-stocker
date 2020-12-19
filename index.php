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
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a href="#" class="navbar-brand"><?= $hello; ?></a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h2 class="p-2">一覧</h2>

            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title">title 1</h3>
                    <p class="card-text">
                        text is here
                    </p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title">title 2</h3>
                    <p class="card-text">
                        text is here
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- MD Bootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/2.2.1/mdb.min.js"></script>
</body>
</html>