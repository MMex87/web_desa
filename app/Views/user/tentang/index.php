<?= $this->extend('layouts/template2'); ?>

<?= $this->section('content2'); ?>

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
    </div>
</div>
</div>
<!-- akhir bg land -->

<!-- awal list artikel -->
<div class="container-fluid">
    <div class="textlist">
        <p class="tombol" onclick="top.location='/tentang/umum'">Gambaran Umum Desa</p>
    </div>
    <div class="textlist">
        <p class="tombol" onclick="top.location='/tentang/geografi'">Geografi dan Demografi</p>
    </div>
    <div class="textlist">
        <p class="tombol" onclick="top.location='/tentang/pemerintahan'">Pemerintahan Desa</p>
    </div>
</div>
<!-- akhir list artikel -->

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
                'margin-top': '-30px'
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
                'font-size': '16px',
                'width': '100px',
                'height': '40px',
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
            'margin-top': '-30px'
        })
        $('.textlist').css({
            'font-size': '9px'
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
            'font-size': '16px',
            'width': '100px',
            'height': '40px',
        })
    }
})
</script>

<?= $this->endSection(); ?>