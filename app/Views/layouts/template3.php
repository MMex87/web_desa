<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,600;1,700&display=swap"
        rel="stylesheet">


    <title><?= $title; ?></title>
    <link rel="icon" href="/img/logo_1.png">
    <link rel="stylesheet" href="/css/styleSurat.css">

</head>
</head>

<body>
    <?= $this->include('layouts/navbar1'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <?= $this->renderSection('content3') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        const lebar = $(window).width();
        console.log(lebar);
        $(window).resize(function() {
            const lebar = $(window).width();
            console.log(lebar);
            if (lebar < 992)
                $('.navigasi').css({
                    "font-weight": "600",
                    "margin-right": "10px"
                })
            else
                $('.navigasi').css({
                    "text-align": "center",
                    "border-radius": " 20px",
                    "width": "120px",
                    "font-weight": "600",
                    "margin-right": "10px"
                })
        })
        if (lebar < 992)
            $('.navigasi').css({
                "font-weight": "600",
                "margin-right": "10px"
            })
        else
            $('.navigasi').css({
                "text-align": "center",
                "border-radius": " 20px",
                "width": "120px",
                "font-weight": "600",
                "margin-right": "10px"
            })
    })
    </script>
</body>

</html>