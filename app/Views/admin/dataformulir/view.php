<?= $this->extend('layouts/templateAdmin'); ?>


<?= $this->section('contentAdmin'); ?>

<div class="container">
    <div class="card border-success mb-3 mt-3" style="max-width: 100%; height: 520px;">
        <div class="card-header row" style="font-weight: bold; font-size: 18px;">
            <div class="col-8">
                <?= ($keterangan == 'skck') ? 'Surat Keterangan Catatan Kepolisian' : 'Surat Keterangan' ?>
            </div>
            No Surat : <?= $surat['id_surat']; ?>
        </div>
        <div class="card-body text-success overflow-auto">
            <table class="table">
                <tr>
                    <th scope="row">Nama Lengkap</th>
                    <td>:</td>
                    <td><?= $surat['nama_lengkap']; ?></td>
                </tr>
                <td colspan="3"></td>
                <tr>
                    <th scope="row">Tempat Tanggal Lahir</th>
                    <td>:</td>
                    <td><?= $surat['tempat']; ?>, <?= $surat['tanggal_lahir']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th scope="row">Nik</th>
                    <td>:</td>
                    <td><?= $surat['nik']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td>:</td>
                    <td><?= $surat['jenis_kelamin']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>:</td>
                    <td><?= $surat['pekerjaan']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th scope="row">Status Perkawian</th>
                    <td>:</td>
                    <td><?= $surat['status_perkawinan']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th scope="row">Agama</th>
                    <td>:</td>
                    <td><?= $surat['agama']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th scope="row">Alamat</th>
                    <td>:</td>
                    <td><?= $surat['alamat']; ?></td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <th scope="row">Tujuan</th>
                    <td>:</td>
                    <td><?= $surat['tujuan']; ?></td>
                </tr>
                <tr style="visibility: <?= ($keterangan == 'skck') ? 'hidden' : '' ?>;">
                    <th scope="row">Maksud</th>
                    <td>:</td>
                    <td><?= $surat['maksud']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="kaki row justify-content-end">
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary"
                onclick="top.location='/formulir/<?= ($keterangan == 'skck') ? 'skck' : 'suket' ?>'">kembali</button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary"
                onclick="top.location='/formulir/download<?= ($keterangan == 'skck') ? 'skck' : 'suket' ?>?id=<?= $surat['id_surat'] ?>'">Download</button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>