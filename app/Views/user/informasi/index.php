<?= $this->extend('layouts/template1'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div style="width: 100%;">
        <div class="d-flex align-content-start flex-wrap">
            <div class="p-2" style="width: 550px;">
                <img src="/img/g-info.png" class="img-fluid" alt="gambar-info" width="100%">
            </div>
            <div class="p-2" style="width: 550px">
                <div class="row justify-content-center" id="cardlayout">
                    <div class="headcard">
                        <span>Agenda</span>
                    </div>
                </div>
                <div id="content-agenda">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid mb-3">
                            <div class=""></div>
                            <div class="justify-content-end" id="navbarSupportedContent">
                                <form class="d-flex" method="post" action="">
                                    <input class="form-control me-2" name="cari_agenda" type="search"
                                        placeholder="Search" aria-label="Search" value="<?= $cariAgenda; ?>">
                                    <button class="btn btn-outline-success" type="submit"><img
                                            src="/img/search_icon.png" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </nav>
                    <div class="container-fluid" style="overflow: auto; max-height:450px;">
                        <?php

                        foreach ($agenda as $rows) : ?>
                        <div id="tanggal-agenda" class="ms-2">
                            <?= $rows['tanggal_mulai'] . ' - ' . $rows['tanggal_selesai']; ?>
                        </div>
                        <div id="card-agenda">
                            <strong><?= $rows['nama_agenda']; ?></strong>
                            <p class="isi-agenda"><?= $rows['deskripsi_agenda']; ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid p-2 mt-4">
            <div class="artikel-search">
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="cariArtikel" class="form-control" placeholder="Cari Artikel"
                            aria-label="Cari Artikel" aria-describedby="button-addon2" value="<?= $keyArtikel; ?>">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><img
                                src="/img/search_icon.png" width="25" height="25" class="me-2 ms-2"></button>
                    </div>
                </form>
            </div>
            <div class="artikel-content mt-3">
                <div class="artikel-list">
                    <?php $i = 0;
                    foreach ($artikel as $row) : ?>
                    <div class="card kartu" style="width: 100%; max-height: 200px;">
                        <div class="row g-0">
                            <div class="col-md-2" style="height: 200px; overflow: hidden;">
                                <img src="/img/artikel/<?= $row['gambar']; ?>" class="img-fluid rounded-start"
                                    width="200" height="200">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $row['judul_artikel']; ?></h5>
                                    <p class="card-text kartu-tengah"><?= $row['artikel']; ?></p>
                                    <p class="card-text"><small class="text-muted">Last updated
                                            <?php echo $waktu[$i]->humanize() ?>
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        $i++;
                    endforeach; ?>
                </div>
            </div>
        </div>


        <!-- <div style="height: 1000px;"> -->

        <!-- </div> -->

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    const lebar = $(window).width();
    $(window).resize(function() {
        const lebar = $(window).width();
        if (lebar < 768)
            $('.kartu').css({
                'margin-bottom': '200px'
            })
        else
            $('.kartu').css({
                'margin-bottom': '20px'
            })
    })
    if (lebar < 768)
        $('.kartu').css({
            'margin-bottom': '200px'
        })
    else
        $('.kartu').css({
            'margin-bottom': '20px'
        })
})
</script>


<?= $this->endSection(); ?>