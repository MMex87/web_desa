<?= $this->extend('layouts/template2'); ?>

<?= $this->section('content2'); ?>

<div class="container">
    <div class="tentang-header mt-5">
        <div class="tentang-judul text-center">
            <h2><?= $judul; ?></h2>
        </div>
        <div class="tentang-foto d-flex justify-content-center" style="width: 100%;">
            <img src="/img/artikel/<?= $gambar; ?>" height="300">
        </div>
    </div>
    <div class="container-fluid mt-5">
        <?= $artikel; ?>
    </div>

    <div class="tentang-artikel mt-5">
        <div class="item-share">
            <h4>Share Artikel Ini Melalui : </h4>
        </div>
        <div class="warp-share-parent d-flex align-content-between flex-wrap">
            <div class="warp-share mt-3">
                <div class="item-share ms-3">
                    <button type="button" class="btn btn-success mb-4" style="width: 250px; height: 60px;"><img
                            src="/img/logos_whatsapp.png" class="me-2">
                        Whatsapp</button>
                </div>
                <div class="item-share ms-3">
                    <button type="button" class="btn"
                        style="color: #fff; width: 250px; height: 60px; background-color: #91A1F4;"><img
                            src="/img/fb.png" class="me-2">
                        Facebook</button>
                </div>
            </div>
            <div class="warp-share mt-3">
                <div class="item-share ms-3">
                    <button type="button" class="btn btn-danger mb-4" style="width: 250px; height: 60px;"><img
                            src="/img/ig.png" class="me-2">
                        Instagram</button>
                </div>
                <div class="item-share ms-3">
                    <button type="button" class="btn"
                        style="color: #fff; width: 250px; height: 60px; background-color: #91A1F4;"><img
                            src="/img/twt.png" class="me-2">
                        Twiter</button>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>