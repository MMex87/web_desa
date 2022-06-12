<?= $this->extend('layouts/template3'); ?>

<?= $this->section('content3'); ?>

<div class="container">
    <div class=" title" style="font-size: 25px;font-weight: bold; margin-left: 0px; margin-bottom: 0px;">
        Pelayanan Surat
    </div>
    <div class="konten">
        <h2>Surat Keterangan</h2>
        <br>
        <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
        <?php endif; ?>
        <br>
        <div>
            <form action="/surat/savesuket" method="post">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input class="form-control <?= ($validation->hasError('nama') ? 'is-invalid' : ''); ?>" id="nama"
                    type="text" name="nama" placeholder="Huruf Kapital/Besar" aria-label="default input example"
                    value="<?= old('nama'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
                <br>
                <label for="tgl" class="form-label">Tempat, Tanggal Lahir</label>
                <div class="row g-3">
                    <div class="col">
                        <input type="text"
                            class="form-control <?= ($validation->hasError('tempat') ? 'is-invalid' : ''); ?>" id="tgl"
                            name="tempat" placeholder="Tempat" aria-label="First name" value="<?= old('tempat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tempat'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <input type="date"
                            class="form-control <?= ($validation->hasError('lahir') ? 'is-invalid' : ''); ?>"
                            name="lahir" placeholder="Last name" aria-label="Last name" value="<?= old('lahir'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('lahir'); ?>
                        </div>
                    </div>
                </div>
                <br>
                <label for="nik" class="form-label">NIK</label>
                <input class="form-control <?= ($validation->hasError('nik') ? 'is-invalid' : ''); ?>" id="nik"
                    type="text" name="nik" placeholder="Terdiri dari 16 Angka" aria-label="default input example"
                    value="<?= old('nik'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nik'); ?>
                </div>
                <br>
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="gender" name="gender" aria-label=".form-select-sm example">
                    <option value="laki-laki" <?= (old('gender') == 'laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="perempuan" <?= (old('gender') == 'perempuan') ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <br>
                <label for="work" class="form-label">Pekerjaan</label>
                <select class="form-select" id="work" name="work" aria-label=".form-select-sm example">
                    <option value="Pegawai Negeri Sipil"
                        <?= (old('work') == 'Pegawai Negeri Sipil') ? 'selected' : '' ?>>Pegawai Negeri Sipil</option>
                    <option value="Karyawan Swasta" <?= (old('work') == 'Karyawan Swasta') ? 'selected' : '' ?>>Karyawan
                        Swasta</option>
                    <option value="Wirausaha" <?= (old('work') == 'Wirausaha') ? 'selected' : '' ?>>Wirausaha</option>
                    <option value="Pedagang" <?= (old('work') == 'Pedagang') ? 'selected' : '' ?>>Pedagang</option>
                    <option value="Buruh" <?= (old('work') == 'Buruh') ? 'selected' : '' ?>>Buruh</option>
                    <option value="Pelajar Mahasiswa" <?= (old('work') == 'Pelajar Mahasiswa') ? 'selected' : '' ?>>
                        Pelajar Mahasiswa</option>
                    <option value="Pekerja Lepas/Freelancer"
                        <?= (old('work') == 'Pekerja Lepas/Freelancer') ? 'selected' : '' ?>>Pekerja Lepas/Freelancer
                    </option>
                    <option value="Belum/Tidak Bekerja" <?= (old('work') == 'Belum/Tidak Bekerja') ? 'selected' : '' ?>>
                        Belum/Tidak Bekerja</option>
                </select>
                <br>
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="kawin" aria-label=".form-select-sm example">
                    <option value="Kawin" <?= (old('kawin') == 'Kawin') ? 'selected' : '' ?>>Kawin</option>
                    <option value="Belum Kawin" <?= (old('kawin') == 'Belum Kawin') ? 'selected' : '' ?>>Belum Kawin
                    </option>
                    <option value="Cerai Hidup" <?= (old('kawin') == 'Cerai Hidup') ? 'selected' : '' ?>>Cerai Hidup
                    </option>
                    <option value="Cerai Mati" <?= (old('kawin') == 'Cerai Mati') ? 'selected' : '' ?>>Cerai Mati
                    </option>
                </select>
                <br>
                <label for="religion" class="form-label">Agama</label>
                <select class="form-select" id="religion" name="agama" aria-label=".form-select-sm example">
                    <option value="Islam" <?= (old('agama') == 'Islam') ? 'selected' : '' ?>>Islam</option>
                    <option value="Kristen" <?= (old('agama') == 'Kristen') ? 'selected' : '' ?>>Kristen</option>
                    <option value="Katolik" <?= (old('agama') == 'Katolik') ? 'selected' : '' ?>>Katolik</option>
                    <option value="Hindu" <?= (old('agama') == 'Hindu') ? 'selected' : '' ?>>Hindu</option>
                    <option value="Budha" <?= (old('agama') == 'Budha') ? 'selected' : '' ?>>Budha</option>
                    <option value="Kong Hu Chu" <?= (old('agama') == 'Kong Hu Chu') ? 'selected' : '' ?>>Kong Hu Chu
                    </option>
                </select>
                <br>
                <label for="adress" class="form-label">Alamat</label>
                <input class="form-control <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" id="adress"
                    type="text" name="alamat" placeholder="Jalan No.01, RT/RW, Desa, Kecamatan, Kabupaten"
                    aria-label="default input example" value="<?= old('alamat'); ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
                <br>
                <div class="mb-3">
                    <label for="purpose" class="form-label">Maksud</label>
                    <textarea class="form-control <?= ($validation->hasError('maksud') ? 'is-invalid' : ''); ?>"
                        id="purpose" type="text" name="maksud"
                        placeholder="Orang tersebut adalah benar-benar penduduk Desa Kesimantengah Kecamatan Pacet Kabupaten Mojokerto, dan benar orang tersebut mempunyai usaha peternakan ayam petelur,dan orang tersebut diatas pekerjaannya Wiraswasta bukan Karyawan Swasta seperti yg tercantum di KTP."
                        aria-placeholder="default input example" rows="3"><?= old('maksud'); ?></textarea>
                    <div class="invalid-feedback">
                        <?= $validation->getError('maksud'); ?>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan</label>
                        <textarea class="form-control <?= ($validation->hasError('tujuan') ? 'is-invalid' : ''); ?>"
                            id="tujuan" type="text" placeholder="Keterangan Usaha untuk Pengajuan Kredit ke BANK."
                            name="tujuan" aria-placeholder="default input example"
                            rows="3"><?= old('tujuan'); ?></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('tujuan'); ?>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end btnb">
                        <button class="btn btn-primary me-md-2" type="button"
                            onclick="top.location='/surat'">Kembali</button>
                        <button class="btn btn-primary" type="submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>