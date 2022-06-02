<?= $this->extend('layouts/template2'); ?>

<?= $this->section('content2'); ?>
<div class="container" style="align-items: center">
    <div style="width: 100%">
        <img src="img/g-surat.png" alt="" class="img-fluid">
    </div>
</div>

<div class="container" style="margin-top: 100px">
    <div style="width: 100%">
        <div class="row cardlayout">
            <div class="headcard">
                <span>Pelayanan Surat</span>
            </div>
        </div>
    </div>

    <div class="container px-4">
        <div class="row gx-5">
            <div class="col">
                <div class="p-3 surat" style="margin-bottom: 20px">
                    <a href="/surat/suket">1. Surat Keterangan</a>
                </div>
                <div class="p-3 surat" style="margin-bottom: 20px">
                    <a href="/surat/skck">2. Surat Keterangan Catatan Kepolisian</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>