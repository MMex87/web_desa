<?= $this->extend('layouts/template1'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div style="width: 100%">
        <div class="sampul">
            <div class="sampulLogo">
                <img src="/img/logo_1.png" width="150" height="150">
            </div>
            <div class="text1">
                <p>DESA KESIMANTENGAH</p>
            </div>
            <div class="text2">
                <p>Kesimantengah merupakan Desa dengan 5 Dusun diantaranya Kesiman, Jati, Galangloh, Karangan, dan
                    Ngemplak. Desa ini terletak di Kecamatan Pacet, Kabupaten Mojokerto.</p>
            </div>
            <div class="button1">
                <button type="button" class="btn btn-secondary">Lokasi</button>
                <button type="button" class="btn btn-secondary">Detail</button>
            </div>
        </div>

        <div class="row cardlayout">
            <div class="headcard">
                <span>Kotak Article</span>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="background-color: #ebebeb">
                <?php $i = 1;
                foreach ($artikel as $row) : ?>
                <div class="carousel-item <?= ($i == 1) ? 'active' : '' ?> p-3">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <div id="slideArticle">
                                <button type="button"
                                    onclick="top.location='informasi/viewArtikel/'+ <?= $row['id_artikel']; ?>"
                                    class="isi-artikel">
                                    <h2 class="judul-artikel"><?= $row['judul_artikel']; ?></h2>
                                    <p class="d-block w-100 deskripsi"><?= $row['artikel']; ?></p>
                                </button>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <?php
                    $i++;
                endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <img src="/img/polygon-kiri.png" alt="" />
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <img src="/img/polygon-kanan.png" alt="" />
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row cardlayout">
            <div class="headcard">
                <span>Agenda Terdekat</span>
            </div>
        </div>

        <div>
            <div class="container">
                <div class="row justify-content-evenly">
                    <div class="col-6">
                        <h5>Jumat, 12 Mei 2020</h5>
                    </div>
                    <div class="col-6">
                        <h5>Rabu, 19 Mei 2020</h5>
                    </div>

                    <div class="row justify-content-evenly">
                        <div class="col-5" style="background-color: #ebebeb; border-radius: 10px;">
                            <h2 class="agenda">Kerja Bakti</h2>
                            <h5 class="agenda2">Dihimbau untuk para warga membawa peralatan kerja bakti</h5>
                        </div>
                        <div class="col-5" style="background-color: #ebebeb; border-radius: 10px;">
                            <h2 class="agenda">Kerja Bakti 2</h2>
                            <h5 class="agenda2">Dihimbau untuk para warga membawa peralatan kerja bakti</h5>
                        </div>
                    </div>
                </div>

                <div class="row cardlayout">
                    <div class="headcard">
                        <span>Pelayanan Surat</span>
                    </div>
                </div>

                <div class="container">
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="p-3 surat">1. Surat Keterangan Domisili</div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 surat">2. Surat Keterangan Melahirkan</div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 surat">3. Surat Keterangan Kematian</div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 surat">4. Surat Keterangan Tidak Mampu</div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 surat">5. Surat Keterangan Status</div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 surat">Lainya..</div>
                        </div>
                    </div>
                </div>

                <div class="row cardlayout">
                    <div class="headcard">
                        <span>Perkiraan Cuaca</span>
                    </div>
                </div>

                <div class="row cardlayout">
                    <div class="headcard">
                        <span>Peta Desa</span>
                    </div>
                </div>


                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>


            </div>


            <div style="height: 300px;">

            </div>
        </div>

        <?= $this->endSection(); ?>