<?= $this->extend('layouts/template3'); ?>

<?= $this->section('content3'); ?>

<div class="container">
    <div style="margin-left: -40px; margin-bottom: 20px;">
        <div class="title" style="font-size: 25px;font-weight: bolder;">
            Pelayanan Surat
        </div>
    </div>
    <div class="konten container">
        <h2>Surat Kematian</h2>
        <br>
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <br>
        <div>
            <form action="/surat/savesukem" method="post">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>" id="nama"
                    type="text" name="nama" placeholder="Huruf Kapital/Besar" aria-label="default input example"
                    value="<?= old('nama'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
                <br>
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="gender" name="gender" aria-label=".form-select-sm example">
                    <option selected disabled value="">-- Jenis Kelamin --</option>
                    <option value="laki-laki" <?= (old('gender') == 'laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="perempuan" <?= (old('gender') == 'perempuan') ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('gender'); ?>
                </div>
                <br>
                <label for="adress" class="form-label">Alamat</label>
                <input class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" id="adress"
                    type="text" name="alamat" placeholder="Jalan No.01, RT/RW, Desa, Kecamatan, Kabupaten"
                    aria-label="default input example" value="<?= old('alamat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
                <br>
                <label for="umur" class="form-label">Umur</label>
                <input class="form-control <?= ($validation->hasError('umur') ? 'is-invalid' : ''); ?>" id="umur"
                    type="number" name="umur" placeholder="Umur Saat meninggal dunia" aria-label="default input example"
                    value="<?= old('umur'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('umur'); ?>
                </div>
                <br>
                <p>Telah Meninggal dunia pada:</p>
                <br>
                <label for="tgl" class="form-label">Hari dan Tanggal</label>
                <div class="row g-3">
                    <div class="col">
                        <select class="form-select <?= ($validation->hasError('hari') ? 'is-invalid' : ''); ?>"
                            id="hari" name="hari" aria-label=".form-select-sm example">
                            <option selected disabled value="">-- Pilih Hari --</option>
                            <option value="Senin" <?= (old('hari') == 'Senin') ? 'selected' : '' ?>>Senin
                            </option>
                            <option value="Selasa" <?= (old('hari') == 'Selasa') ? 'selected' : '' ?>>
                                Selasa</option>
                            <option value="Rabu" <?= (old('hari') == 'Rabu') ? 'selected' : '' ?>>Rabu
                            </option>
                            <option value="Kamis" <?= (old('hari') == 'Kamis') ? 'selected' : '' ?>>Kamis
                            </option>
                            <option value="Jum\'at" <?= (old('hari') == 'Jum\'at') ? 'selected' : '' ?>>Jum'at</option>
                            <option value="Sabtu" <?= (old('hari') == 'Sabtu') ? 'selected' : '' ?>>Sabtu
                            </option>
                            <option value="Minggu" <?= (old('hari') == 'Minggu') ? 'selected' : '' ?>>Minggu
                            </option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('hari'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <input type="date"
                            class="form-control <?= ($validation->hasError('tanggal') ? 'is-invalid' : ''); ?>"
                            name="tanggal" class="tanggal" value="<?= old('tanggal'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tanggal'); ?>
                        </div>
                    </div>
                </div>
                <br>
                <label for="tempat" class="form-label">Di</label>
                <input class="form-control <?= ($validation->hasError('tempat') ? 'is-invalid' : ''); ?>" id="tempat"
                    type="text" name="tempat" placeholder="Kediaman, desa Kesiman tengah"
                    aria-label="default input example" value="<?= old('tempat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tempat'); ?>
                </div>
                <br>
                <label for="sebab" class="form-label">Disebabkan karena</label>
                <input class="form-control <?= ($validation->hasError('sebab') ? 'is-invalid' : ''); ?>" id="sebab"
                    type="text" name="sebab" placeholder="Meninggal karena serangan jantung,."
                    aria-label="default input example" value="<?= old('sebab'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('sebab'); ?>
                </div>
                <br>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end btnb">
                    <button class="btn btn-primary me-md-2" type="button"
                        onclick="top.location='/surat'">Kembali</button>
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>