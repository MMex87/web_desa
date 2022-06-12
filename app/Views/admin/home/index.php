<?= $this->extend('layouts/templateAdmin'); ?>

<?= $this->section('contentAdmin'); ?>
<div class="ucapan">
    <h1>Selamat Datang Admin</h1>
</div>
<div class="pesan">
    <div class="ps-sk">
        <div class="ps-warp">
            <button type="button" onclick="top.location='/formulir/suket'">
                <div class="icon position-relative">
                    <img src="/img/mail.png">
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
                </div>
                </span>
            </button>
        </div>
        <div class="ps-title">
            <h3>Surat Keterangan</h3>
        </div>
    </div>
    <div class="ps-skck">
        <div class="ps-warp">
            <button type="button" onclick="top.location='/formulir/skck'">
                <div class="icon position-relative">
                    <img src="/img/mail.png">
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
                </div>
            </button>
            <div class="ps-title">
                <h3>SKCK</h3>
            </div>
        </div>
    </div>
</div>
<div class="pesan">
    <div class="ps-sk">
        <div class="ps-warp">
            <button type="button" onclick="top.location='/formulir/sukem'">
                <div class="icon position-relative">
                    <img src="/img/mail.png">
                    <?php
                    $db = \Config\Database::connect();
                    $notifSKM = $db->query('SELECT COUNT(nama_surat) as hitung
                    FROM tbl_surat_kedua
                    WHERE nama_surat = "Surat Kematian" AND status = 1')->getRow();
                    ?>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger <?= ($notifSKM->hitung == 0) ? 'visually-hidden' : '' ?>">
                        <?= $notifSKM->hitung ?>
                        <span class="visually-hidden">unread messages</span>
                </div>
                </span>
            </button>
        </div>
        <div class="ps-title">
            <h3>Surat Kematian</h3>
        </div>
    </div>
    <div class="ps-skck">
        <div class="ps-warp">
            <button type="button" onclick="top.location='/formulir/sukel'">
                <div class="icon position-relative">
                    <img src="/img/mail.png">
                    <?php
                    $db = \Config\Database::connect();
                    $notifSKL = $db->query('SELECT COUNT(nama_surat) as hitung
                    FROM tbl_surat_kedua
                    WHERE nama_surat = "Surat Kelahiran" AND status = 1')->getRow();
                    ?>
                    <span
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger <?= ($notifSKL->hitung == 0) ? 'visually-hidden' : '' ?>">
                        <?= $notifSKL->hitung ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </div>
            </button>
            <div class="ps-title">
                <h3>Surat Kelahiran</h3>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>