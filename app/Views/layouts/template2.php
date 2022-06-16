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

    <?php if (session()->getFlashdata('berhasil')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('berhasil'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php elseif ($validation->getError('email')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= "Gagal, " . $validation->getError('email')  ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?= $this->renderSection('content2') ?>

    <div style="height: 300px;">
    </div>


    <footer>
        <div class='footer-menu' id='subscribe-footer'>
            <h3>Newsletter</h3>
            <p>
                Agar dapat mengetahui artikel terbaru dari blog ini bisa langsung
                berlangganan via email gratis.
            </p>
            <div class="emailfooter">
                <form action="/informasi/saveEmail" method="post">
                    <input name="email" type="email" placeholder="Email address" value="<?= old('email') ?>" />
                    <input class="submitfooter" type="submit" value="Submit" />
                </form>
            </div>
        </div>
        <div id="footbawah">
            <div class="maxiwrap">
                <div class="footbawahkiri">
                    Copyright &#169; <span id="current-year" />
                    <a expr:href="data:blog.homepageUrl" itemprop="creator" itemscope="itemscope"
                        itemtype="http://schema.org/Person"><span itemprop="name">
                            <data:blog.title />
                        </span></a>
                    All Right Reserved
                </div>
                <div class="footbawahkanan">
                    Designed by
                    <span id="lightcredits"><a href="http://kesimantengah.my.id/" target="_blank"
                            title="Kreativitas adalah kunci kesuksesan">Andi Ayub Laskhanugraha</a></span>
                    Powered by
                    <a href="https://kesimantengah.my.id/" rel="nofollow" target="_blank"
                        title="Powered by Kesimantengah">Kesimantengah</a>
                </div>
            </div>
        </div>
    </footer>


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