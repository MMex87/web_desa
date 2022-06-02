<?= $this->extend('layouts/templateAdmin'); ?>

<?= $this->section('contentAdmin'); ?>

<div class="container-fluid p-2">
    <div class="kepala-formulir">
        <h2>Input Formulir</h2>
    </div>
    <div class="d-flex justify-content-center mt-5">
        <div class="position-relative">
            <button type="button" class="btn btn-outline-primary mb-3" onclick="top.location='/formulir/suket'">Daftar
                Formulir Surat Keterangan
                <?php
                $db = \Config\Database::connect();
                $notifSk = $db->query('SELECT COUNT(nama_surat) as hitung
                    FROM tbl_surat
                    WHERE nama_surat = "Surat Keterangan" AND status = 1')->getRow();
                ?>
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger <?= ($notifSk->hitung == 0) ? 'visually-hidden' : '' ?>">
                    <?= $notifSk->hitung ?>
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <div class="position-relative">
            <button type="button" class="btn btn-outline-primary mb-3" onclick="top.location='/formulir/skck'">Daftar
                Formulir Surat Keterangan Catatan
                Kepolisian
                <?php
                $db = \Config\Database::connect();
                $notif = $db->query('SELECT COUNT(nama_surat) as hitung
                    FROM tbl_surat
                    WHERE nama_surat = "Surat Keterangan Catatan Kepolisian" AND status = 1')->getRow();
                ?>
                <span
                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger <?= ($notif->hitung == 0) ? 'visually-hidden' : '' ?>">
                    <?= $notif->hitung ?>
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>