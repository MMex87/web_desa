<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/img/header_right.png" alt="logo" width="250"
                class="d-inline-block align-text-right" style="margin-left: 15px" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end me-2" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item"
                    style="background-color: <?= ($navbar == 'beranda') ?  '#263238' : '#aea7a7' ?>; border-radius: 20px; width: 120px; text-align: center; font-weight: 600; margin-right: 10px">
                    <a class="nav-link <?= ($navbar == 'beranda') ?  'active' : '' ?>" aria-current="page"
                        href="/beranda" style="color: #ffff">Beranda</a>
                </li>
                <li class="nav-item"
                    style="background-color: <?= ($navbar == 'informasi') ?  '#263238' : '#aea7a7' ?> ; border-radius: 20px; width: 120px; text-align: center; font-weight: 600; margin-right: 10px">
                    <a class="nav-link <?= ($navbar == 'informasi') ?  'active' : '' ?>" href="/informasi"
                        style="color: #ffff">Informasi</a>
                </li>
                <li class="nav-item"
                    style="background-color: <?= ($navbar == 'surat') ?  '#263238' : '#aea7a7' ?>; border-radius: 20px; width: 120px; text-align: center; font-weight: 600; margin-right: 10px">
                    <a class="nav-link <?= ($navbar == 'surat') ?  'active' : '' ?>" href="/surat"
                        style="color: #ffff">Surat</a>
                </li>
                <li class="nav-item"
                    style="background-color: <?= ($navbar == 'tentang') ?  '#263238' : '#aea7a7' ?>; border-radius: 20px; width: 120px; text-align: center; font-weight: 600; margin-right: 10px">
                    <a class="nav-link <?= ($navbar == 'tentang') ?  'active' : '' ?>" href="/tentang"
                        style="color: #ffff">Tentang</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="navbarDropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false"
                        style="background-color: #aea7a7; border-radius: 20px; width: 120px; text-align: center; font-weight: 600; margin-right: 10px">
                        Contact
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Whatsapp</a></li>
                        <li><a class="dropdown-item" href="#">Email</a></li>
                        <li><a class="dropdown-item" href="#">Telfone</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>