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
        Buat Artikel
    </button>
    <div class="konten mt-3">
        <div class="menu-konten">
            <div class="kepala mb-3">
                <nav class="navbar navbar-expand-lg bg-light">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="/artikel" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= (isset($_GET['pub'])) ? 'Publish' : (isset($_GET['draf']) ? 'Arsip' : 'Semua') ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="/artikel">Semua</a></li>
                                        <li><a class="dropdown-item" href="/artikel?pub=True">Publish</a></li>
                                        <!-- <li>
                                            <hr class="dropdown-divider">
                                        </li> -->
                                        <li><a class="dropdown-item" href="/artikel?draf=True">Arsip</a></li>
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
                <div id="kartu">
                    <?php foreach ($artikel as $row) : ?>
                    <div class="kartu mb-3" style="background: <?= ($row['status'] == '0') ? '#c7c7c7' : '#EBEBEB' ?>;">
                        <div class="row">
                            <div class="col-8">
                                <div class="judul">
                                    <?= $row['judul_artikel']; ?>
                                </div>
                                <div class="tanggal">
                                    <?= $row['updated_at']; ?>
                                </div>
                            </div>
                            <div class="col mt-4">
                                <div class="lihat float-start">
                                    <button onclick=`top.location="/informasi/viewArtikel/<?= $row['id_artikel']; ?>" `
                                        class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <img src="/img/preview.png">
                                    </button>
                                </div>
                                <div class="arsip float-start">
                                    <form action="" method="post" class="d-flex">
                                        <input type="hidden" name="id_artikel" value="<?= $row['id_artikel']; ?>">
                                        <input type="hidden" name="arsip"
                                            value="<?= ($row['status'] == 1) ? '0' : '1' ?>">
                                        <button type="submit" class="btn" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Arsip">
                                            <img src="/img/arsip.png">
                                        </button>
                                    </form>
                                </div>
                                <div class="edit float-start">
                                    <button type="button" class="btn ubah" data-id="<?= $row['id_artikel']; ?>"
                                        data-judul="<?= $row['judul_artikel']; ?>" data-gambar="<?= $row['gambar']; ?>"
                                        data-artikel="<?= $row['artikel']; ?>" data-bs-toggle="modal"
                                        data-bs-target="#editData" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Edit">
                                        <img src="/img/edit.png">
                                    </button>
                                </div>
                                <div class="delete float-start">
                                    <form class="d-inline" action="artikel/<?= $row['id_artikel']; ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn" onclick="return confirm('apakah anda Yakin?')"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <img src=" /img/delete.png">
                                        </button>
                                    </form>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="artikel/save" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-3">
                            <img src="/img/artikel/default.png" class="img-thumbnail img-preview">
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="judul" id="floatingInput"
                                    placeholder="Tulis Judul Artikel" value="<?= old('judul') ?>">
                                <label for="floatingInput">Judul Artikel</label>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label custom-file-label">Pilih Gambar</label>
                                <input
                                    class="form-control <?= ($validation->hasError('gambar') ? 'is-invalid' : ''); ?>"
                                    onchange="previewImg()" type="file" name="gambar" id="gambar"
                                    value="<?= old('gambar') ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="artikel" placeholder="Tulis Artikel disini"
                                    id="artikel"><?= old('artikel') ?></textarea>
                                <label for="artikel">Artikel</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Update-->
<div class="modal fade" id="editData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDataLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="artikel/edit" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <div class="row">
                        <div class="col-3">
                            <img src="/img/artikel/default.png" class="img-fluid gambarEdit img-preview-edit">
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control judul" name="judul" id="judul"
                                    placeholder="Tulis Judul Artikel" value="<?= old('judul') ?>">
                                <label for="floatingInput">Judul Artikel</label>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label gambarTitle custom-file-label-edit">Pilih
                                    Gambar</label>
                                <input
                                    class="form-control gambar <?= ($validation->hasError('gambar') ? 'is-invalid' : ''); ?>"
                                    type="file" onchange="previewImgEdit()" name="gambar" id="fileGambarEdit">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control artikelEdit" name="artikel"
                                    placeholder="Tulis Artikel disini" id="artikelEdit"></textarea>
                                <label for="artikel">Artikel</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_artikel" class="id_artikel">
                            <input type="hidden" name="gambarLama" class="gambarLama">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">save</button>
                        </div>
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
        const gambar = $(this).data('gambar');
        const judul = $(this).data('judul');
        const artikel = $(this).data('artikel');
        $('#editData').modal('show');
        $('.gambarEdit').attr('src', '/img/artikel/' + gambar)
        $('.gambarTitle').text(gambar)
        $('.judul').val(judul)
        $('#artikelEdit').text(artikel)
        $('.id_artikel').val(id)
        $('.gambarLama').val(gambar)
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