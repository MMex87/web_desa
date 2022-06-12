<?= $this->extend('layouts/template1'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div style="width: 100%">
        <div class="sampul">
            <div class="sampulLogo">
                <img src="img/bg-detail.png" class="img-fluid">
            </div>
            <div class="logos">
                <img src="img/logo_1.png" width="20%">
            </div>
            <div class="text1">
                <p>DESA KESIMANTENGAH</p>
            </div>
            <div class="text2">
                <p>
                    Kesimantengah merupakan Desa dengan 5 Dusun diantaranya Kesiman,
                    Jati, Galangloh, Karangan, dan Ngemplak. Desa ini terletak di
                    Kecamatan Pacet, Kabupaten Mojokerto.
                </p>
            </div>
            <div class="lokasi">
                <button class="btn btn-secondary dropdown-toggle lk-btn" type="button" id="dropdownMenuButton2"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Lokasi
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="#">Alamat</a></li>
                    <li><a class="dropdown-item" href="#">Kecamatan</a></li>
                    <li><a class="dropdown-item" href="#">Kabupaten</a></li>
                    <li><a class="dropdown-item" href="#">Provinsi</a></li>
                    <li><a class="dropdown-item" href="#">Kode Pos</a></li>
                    <li><a class="dropdown-item" href="#">Negara</a></li>
                </ul>
            </div>
        </div>

        <div class="row cardlayout">
            <div class="headcard">
                <span>Kotak Article</span>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <?php if ($artikel) : ?>
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
            <?php else : ?>
            <div class="carousel-inner" style="background-color: #ebebeb">
                <div class="carousel-item active p-3">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col">
                            <div id="slideArticle">
                                <div class="container-fluid">
                                    <div class="kosong-wrap-beranda">
                                        <div class="kosong-item-beranda">
                                            <h3>Tidak ada Artikel yang di post</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>

            </div>
            <?php endif; ?>
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
                    <?php
                    function getHari($hari)
                    {
                        switch ($hari) {
                            case 'Sunday':
                                $hari = 'Minggu';
                                break;
                            case 'Monday':
                                $hari = 'Senin';
                                break;
                            case 'Tuesday':
                                $hari = 'Selasa';
                                break;
                            case 'Wednesday':
                                $hari = 'Rabu';
                                break;
                            case 'Thursday':
                                $hari = 'Kamis';
                                break;
                            case 'Friday':
                                $hari = 'Jum\'at';
                                break;
                            case 'Saturday':
                                $hari = 'Sabtu';
                                break;
                            default:
                                $hari = 'Tidak ada';
                                break;
                        }
                        return $hari;
                    };
                    if (isset($agenda[0])) :
                        $date1 = $agenda[0]['tanggal_selesai'];
                        $datetime1 = DateTime::createFromFormat('Y-m-d', $date1);
                        $hari1 = $datetime1->format('l');
                        $hari1 = getHari($hari1);
                    endif;
                    if (isset($agenda[1])) :
                        $date2 = $agenda[1]['tanggal_selesai'];
                        $datetime2 = DateTime::createFromFormat('Y-m-d', $date2);
                        $hari2 = $datetime2->format('l');
                    endif;

                    ?>
                    <div class="col-6">
                        <h5>
                            <?= (isset($agenda[0]) ? $hari1 . ', ' . date('d-m-Y', strtotime($agenda[0]['tanggal_selesai'])) : '') ?>
                        </h5>
                    </div>
                    <div class="col-6">
                        <h5>
                            <?= (isset($agenda[1]) ? $hari1 . ', ' . date('d-m-Y', strtotime($agenda[1]['tanggal_selesai'])) : '') ?>
                        </h5>
                    </div>

                    <div class="row justify-content-evenly">
                        <div class="col-5" style="background-color: #ebebeb; border-radius: 10px; overflow-x: auto;">
                            <h2 class="agenda">
                                <?= (isset($agenda[0]) ? $agenda[0]['nama_agenda'] : 'Tidak ada Agenda'); ?></h2>
                            <h5 class="agenda2">
                                <?= (isset($agenda[0]) ? $agenda[0]['nama_agenda'] : ''); ?></h5>
                        </div>
                        <div class="col-5" style="background-color: #ebebeb; border-radius: 10px;">
                            <h2 class="agenda">
                                <?= (isset($agenda[1]) ? $agenda[1]['nama_agenda'] : 'Tidak ada Agenda'); ?></h2>
                            <h5 class="agenda2">
                                <?= (isset($agenda[1]) ? $agenda[1]['nama_agenda'] : ''); ?></h5>
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
                            <div class="p-3 surat" onclick="top.location='/surat/suket'">1. Surat Keterangan</div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 surat" onclick="top.location='/surat/skck'">2. Surat Keterangan Catatan
                                Kepolisian</div>
                        </div>
                    </div>
                </div>

                <div class="row cardlayout">
                    <div class="headcard">
                        <span>Peta Desa</span>
                    </div>
                </div>
                <div style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    const lebar = $(window).width();
    $(window).resize(function() {
        const lebar = $(window).width();
        if (lebar < 768) {
            $('.text1').css({
                'margin-top': '5px',
                'font-size': '9px'
            })
            $('.text2').css({
                'font-size': '7px',
                'margin-left': '10px',
                'margin-right': '10px',
                'margin-top': '-15px'
            })
            $('.dropdown-menu').css({
                'font-size': '8px',
            })
            $('.lk-btn').css({
                'padding': '1px',
                'font-size': '8px',
                'width': '45px',
                'height': '20px',
                'margin-left': '43%',
                'margin-top': '-35px'
            })
            $('.agenda').css({
                'font-size': '18px',
            })
        } else {
            $('.text1').css({
                'font-size': '25px',
                'margin-top': '20px'
            })
            $('.text2').css({
                'font-size': '18px',
                'margin-left': '20px',
                'margin-right': '20px'
            })
            $('.lk-btn').css({
                'margin-left': '46%',
            })
            $('.agenda').css({
                'font-size': '23px',
            })
        }
    })
    if (lebar < 768) {
        $('.text1').css({
            'margin-top': '5px',
            'font-size': '9px'
        })
        $('.text2').css({
            'font-size': '7px',
            'margin-left': '10px',
            'margin-right': '10px',
            'margin-top': '-15px',
        })
        $('.dropdown-menu').css({
            'font-size': '8px'
        })
        $('.lk-btn').css({
            'padding': '1px',
            'font-size': '8px',
            'width': '45px',
            'margin-left': '43%',
            'height': '20px',
            'margin-top': '-35px'
        })
        $('.agenda').css({
            'font-size': '18px',
        })
    } else {
        $('.text1').css({
            'margin-top': '20px',
            'font-size': '25px'
        })
        $('.text2').css({
            'font-size': '18px',
            'margin-left': '20px',
            'margin-right': '20px'
        })
        $('.lk-btn').css({
            'margin-left': '46%',
        })
        $('.agenda').css({
            'font-size': '23px',
        })
    }
})
</script>

<?= $this->endSection(); ?>