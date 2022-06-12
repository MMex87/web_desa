<?= $this->extend('layouts/templateAdmin'); ?>


<?= $this->section('contentAdmin'); ?>

<div class="container">
    <div class="card border-success mb-3 mt-3" style="max-width: 100%; height: 520px;">
        <div class="card-header row" style="font-weight: bold; font-size: 18px;">
            <div class="col-8">
                <?= $surat['nama_surat']; ?>
            </div>
            No Surat : <?= $surat['id_surat']; ?>
        </div>
        <div class="card-body text-success overflow-auto">
            <table class="table">
                <tr>
                    <th scope="row">Nama Lengkap</th>
                    <td>:</td>
                    <td><?= $surat['nama']; ?></td>
                </tr>
                <td colspan="3"></td>
                <tr>
                    <th scope="row">
                        <?= ($keterangan == 'skm') ? 'Tempat dan Tanggal Kematian' : 'Tempat dan Tanggal Lahir' ?></th>
                    <td>:</td>
                    <td><?= $surat['tempat']; ?>,hari <?= $surat['hari']; ?> <?= $surat['tanggal']; ?></td>
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
                <?php echo ($keterangan == 'skl') ? '<tr> <th scope="row">Nama Ibu</th> <td>:</td> <td>' . $surat["ibu"] . '
                </td>
                </tr>' : '' ?>
                <?php echo ($keterangan == 'skm') ? '<tr> <th scope="row">Umur</th> <td>:</td> <td>' . $surat["umur"] . '
                </td>
                </tr>' : '' ?>
                <tr>
                    <td colspan="3"></td>
                </tr>
                <?php echo ($keterangan == 'skl') ? '<tr> <th scope="row">Nama Ayah</th> <td>:</td> <td>' . $surat["ayah"] . '
                </td>
                </tr>' : '' ?>
                <?php echo ($keterangan == 'skm') ? '<tr> <th scope="row">Penyebab Kematian</th> <td>:</td> <td>' . $surat["penyebab"] . '
                </td>
                </tr>' : '' ?>
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
            </table>
        </div>
    </div>
    <div class="kaki row justify-content-end">
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary"
                onclick="top.location='/formulir/<?= ($keterangan == 'skm') ? 'sukem' : 'sukel' ?>'">kembali</button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>