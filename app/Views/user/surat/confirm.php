<?= $this->extend('layouts/template2'); ?>

<?= $this->section('content2'); ?>

<div class="container">
    <div class="gambar d-flex justify-content-center">
        <img src="/img/g-take.png" class="img-fluid">
    </div>

    <div class="tulisan">
        <h5 class="text-center">
            Silahkan download nomor antrian dibawah untuk mengambil surat di Desa dengan hanya menunjukan file PDF
            tersebut ke Perangkat Desa yang bertugas. Untuk waktu pengambilan 1x24 jam saat jam kerja.
        </h5>
    </div>

    <div class="tombol d-flex justify-content-center mt-5">
        <div>
            <button type="button" class="btn btn-outline-secondary me-3"
                onclick="top.location='/surat'">Kembali</button>
        </div>
        <div>
            <button type="button" class="btn btn-outline-primary"
                onclick="top.location='/surat/download?id_surat=<?= $id_surat ?>'">Download</button>
        </div>
    </div>

    <div style="height: 200px;"></div>

</div>

<?= $this->endSection(); ?>