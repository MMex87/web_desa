<?= $this->extend('layouts/templateAdmin'); ?>

<?= $this->section('contentAdmin'); ?>

<div class="container-fluid p-2">
    <div class="kepala-formulir">
        <h2>Input Formulir</h2>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <div class="">
            <button type="button" class="btn btn-outline-primary mb-3" onclick="top.location='/formulir/suket'">Daftar
                Formulir Surat Keterangan</button>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <div class="">
            <button type="button" class="btn btn-outline-primary mb-3" onclick="top.location='/formulir/skck'">Daftar
                Formulir Surat Keterangan Catatan
                Kepolisian</button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>