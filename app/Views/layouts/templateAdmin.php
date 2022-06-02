<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="icon" href="/img/logo_1.png">
    <link rel="stylesheet" href="/css/styleAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,600;1,700&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1"><img src="/img/header_right.png" height="50"></span>
        </div>
    </nav>

    <div class="container">

        <div class="textberjalan mt-5">
            <marquee>
                <?php
                for ($a = 0; $a <= 10; $a++) :
                ?>
                Jangan Lupa Istirahat Ya! -
                <?php endfor; ?>
            </marquee>
        </div>

        <div class="row mt-5">
            <div class="col-3 contain-menu">
                <?= $this->include('/layouts/navbarAdmin'); ?>
            </div>
            <div class="col contain-konten ms-5 p-2">
                <?= $this->renderSection('contentAdmin'); ?>
            </div>
        </div>
    </div>

    <div style="height: 200px;"></div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>