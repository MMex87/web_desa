<?= $this->extend('layouts/templateAdmin'); ?>

<?= $this->section('contentAdmin'); ?>

<?= $this->extend('layouts/templateAdmin'); ?>

<?= $this->section('contentAdmin'); ?>

<?php if (session()->getFlashdata('pesan') == 'Data Berhasil Ditambahkan') : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php elseif (session()->getFlashdata('pesan') == 'Data Gagal Ditambahkan') : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php elseif (session()->getFlashdata('pesan') == 'Data Berhasil Diubah') : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php elseif (session()->getFlashdata('pesan') == 'Data Gagal Diubah') : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php elseif (session()->getFlashdata('pesan') == 'Data Berhasil DiHapus') : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="container-fluid mt-2">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
        Buat Agenda
    </button>
    <div class="konten mt-3">
        <div class="menu-konten">
            <div class="kepala mb-3">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/agenda" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Urutan Tampilan
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="/agenda">ASC</a></li>
                                        <li><a class="dropdown-item" href="/agenda?des=True">DESC</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form action="" method="post" class="d-flex" role="search">
                                <input class="form-control me-2" type="text" placeholder="Cari.." name="keyword"
                                    value="<?= ($key) ? $key : ''; ?>" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Cari</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="badan">
                <div>
                    <?php foreach ($agenda as $row) : ?>
                    <div class="kartu mb-3" style="background: #EBEBEB;">
                        <div class="row">
                            <div class="col-8">
                                <div class="judul_desc">
                                    <h4>
                                        <?= $row['nama_agenda']; ?>
                                    </h4>
                                </div>
                                <div class="desc">
                                    <h6>
                                        <?= $row['deskripsi_agenda']; ?>
                                    </h6>
                                </div>
                                <div class="tanggal_desc">
                                    <h6>
                                        Tanggal : <?= $row['tanggal_mulai']; ?> / <?= $row['tanggal_selesai']; ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="delete float-end">
                                    <form class="d-inline" action="agenda/<?= $row['id_agenda']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn" onclick="return confirm('apakah anda Yakin?')">
                                            <img src=" /img/delete.png">
                                        </button>
                                    </form>
                                </div>
                                <div class="edit float-end">
                                    <button type="button" class="btn ubah" data-id="<?= $row['id_agenda']; ?>"
                                        data-nama_ag="<?= $row['nama_agenda']; ?>"
                                        data-tgl_m="<?= $row['tanggal_mulai']; ?>"
                                        data-tgl_s="<?= $row['tanggal_selesai']; ?>"
                                        data-deskripsi="<?= $row['deskripsi_agenda']; ?>" data-bs-toggle="modal"
                                        data-bs-target="#editData">
                                        <img src="/img/edit.png">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->


<!-- Modal Create-->
<div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="agenda/save" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="namaAg" id="floatingInput"
                            placeholder="Tulis namaAg agenda" value="<?= old('namaAg') ?>">
                        <label for="floatingInput">Nama Agenda</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="tglM" id="floatingInput"
                            placeholder="Tulis tglM tmulai" value="<?= old('tglM') ?>">
                        <label for="floatingInput">Tanggal Mulai</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="tglS" id="floatingInput"
                            placeholder="Tulis tglS tselesai" value="<?= old('tglS') ?>">
                        <label for="floatingInput">Tanggal Selesai</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="desc" placeholder="Tulis Descripsi disini"
                            id="desc"><?= old('desc') ?></textarea>
                        <label for="desc">Descripsi</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Update-->
<div class="modal fade" id="editData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="agenda/edit" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control namaAg" name="namaAg" id="floatingInput"
                            placeholder="Tulis Nama Agenda" value="<?= old('namaAg') ?>">
                        <label for="floatingInput">Nama Agenda</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control tglM" name="tglM" id="floatingInput"
                            value="<?= old('tglM') ?>">
                        <label for="floatingInput">Tanggal Mulai</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control tglS" name="tglS" id="floatingInput"
                            value="<?= old('tglS') ?>">
                        <label for="floatingInput">Tanggal Selesai</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control desc" name="desc" placeholder="Tulis Descripsi disini"
                            id="descEdit"><?= old('desc') ?></textarea>
                        <label for="desc">Descripsi</label>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_agenda" class="id_agenda">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$(document).ready(function() {
    $('#kartu').on('click', '.ubah', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama_ag');
        const tglM = $(this).data('tgl_m');
        const tglS = $(this).data('tgl_s');
        const deskripsi = $(this).data('deskripsi');

        $('#editData').modal('show');
        $('.namaAg').val(nama)
        $('.tglM').val(tglM)
        $('.tglS').val(tglS)
        $('#descEdit').text(deskripsi)
        $('.id_agenda').val(id)
    })
})

function previewImg() {
    const sampul = document.querySelector('#gambar');
    const sampulLabel = document.querySelector('.custom-file-label');
    const imgPerview = document.querySelector('.img-preview');


    sampulLabel.textContent = sampul.files[0].name;
    console.log(sampul.files[0].name);

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function(e) {
        imgPerview.src = e.target.result;
    }

}

function previewImgEdit() {
    const sampul = document.querySelector('#fileGambarEdit');
    const sampulLabel = document.querySelector('.custom-file-label-edit');
    const imgPerview = document.querySelector('.img-preview-edit');


    sampulLabel.textContent = sampul.files[0].name;
    console.log(sampul.files[0].name);

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function(e) {
        imgPerview.src = e.target.result;
    }

}
</script>

<?= $this->endSection(); ?>
<?= $this->endSection(); ?>