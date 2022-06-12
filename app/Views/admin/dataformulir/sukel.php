<?= $this->extend('layouts/templateAdmin'); ?>


<?= $this->section('contentAdmin'); ?>

<?php if (session()->getFlashdata('pesan')) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('pesan'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<div class="konten mt-3">
    <div class="menu-konten">
        <div class="kepala mb-3">
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navbar-nav me-auto mb-2 mb-lg-0">
                            <h4>Surat Kelahiran</h4>
                        </div>
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
            <div class="kepala_body row p-2">
                <div class="col-3">
                    <span>Nama Bayi</span>
                </div>
                <div class="col-2">
                    <span>Tanggal</span>
                </div>
                <div class="col-3">
                    <span>Nama Ayah</span>
                </div>
                <div class="col-2">
                    <span>Nomor</span>
                </div>
                <div class="col-2">
                    <span>Aksi</span>
                </div>
            </div>
            <div>
                <?php foreach ($surat as $row) : ?>
                <div class="kartu-surat mb-3" style="background: #EBEBEB;">
                    <div class="row">
                        <div class="col-3">
                            <?= $row['nama']; ?>
                        </div>
                        <div class="col-2">
                            <?= $row['created_at']; ?>
                        </div>
                        <div class="col-3">
                            <?= $row['ayah']; ?>
                        </div>
                        <div class="col-2">
                            <?= $row['id_surat']; ?>
                        </div>
                        <div class="col-2 mt-4">
                            <div class="delete float-end">
                                <form class="d-inline" action="/formulir/kedua/<?= $row['id_surat']; ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn" onclick="return confirm('apakah anda Yakin?')">
                                        <img src=" /img/delete.png">
                                    </button>
                                </form>
                            </div>
                            <div class="edit float-end position-relative">
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger <?= ($row['status'] == 0) ? 'visually-hidden' : '' ?>">
                                    *
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                                <button type="button" class="btn ubah"
                                    onclick="top.location='/formulir/viewsukel/<?= $row['id_surat'] ?>'">
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
    <div class="kaki row justify-content-end mt-2">
        <div class="col-2">
            <button type="button" class="btn btn-outline-primary" onclick="top.location='/formulir'">kembali</button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>