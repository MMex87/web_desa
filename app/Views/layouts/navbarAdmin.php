<div class="container-fluid mt-4">
    <div class="">
        <ul class="nav flex-column menu">
            <li class="nav-item menu-item"
                style="background-color: <?= ($navbar == 'home') ?  '#C7C7C7' : '#E0E0E0' ?>;">
                <div class="row">
                    <div class="col-1">
                        <img src="/img/home.png">
                    </div>
                    <div class="col">
                        <a class="nav-link" aria-current="page" href="/admin">Home</a>
                    </div>
                </div>
            </li>
            <li class="nav-item menu-item"
                style="background-color: <?= ($navbar == 'artikel') ?  '#C7C7C7' : '#E0E0E0' ?>;">
                <div class="row">
                    <div class="col-1">
                        <img src="/img/article.png">
                    </div>
                    <div class="col">
                        <a class="nav-link" aria-current="page" href="/artikel">Artikel</a>
                    </div>
                </div>
            </li>
            <li class="nav-item menu-item"
                style="background-color: <?= ($navbar == 'agenda') ?  '#C7C7C7' : '#E0E0E0' ?>;">
                <div class="row">
                    <div class="col-1">
                        <img src="/img/agenda.png">
                    </div>
                    <div class="col">
                        <a class="nav-link" href="/agenda">Agenda</a>
                    </div>
                </div>
            </li>
            <li class="nav-item menu-item"
                style="background-color: <?= ($navbar == 'formulir') ?  '#C7C7C7' : '#E0E0E0' ?>;">
                <div class="row">
                    <div class="col-1">
                        <img src="/img/forms.png">
                    </div>
                    <div class="col">
                        <a class="nav-link position-relative" href="/formulir">
                            Formulir
                            <?php
                            $db = \Config\Database::connect();
                            $notif = $db->query('SELECT COUNT(nama_lengkap) as hitung FROM tbl_surat WHERE status = 1;')->getRow();
                            ?>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger <?= ($notif->hitung == 0) ? 'visually-hidden' : '' ?>">
                                <?= $notif->hitung ?>
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>

                    </div>
                </div>
            </li>
        </ul>
    </div>
    <br><br><br><br><br>
    <br><br><br><br><br>
    <div class="">
        <ul class="nav flex-column menu">
            <li class=" nav-item menu-item" style="background-color: #E0E0E0">
                <div class="row">
                    <div class="col-1">
                        <img src="/img/logout.png">
                    </div>
                    <div class="col">
                        <a class="nav-link" aria-current="page" href="/logout"
                            onclick="return confirm('Apakah anda yakin ingin keluar?')">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>