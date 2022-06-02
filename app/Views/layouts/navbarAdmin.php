<div class="container-fluid mt-4">
    <div class="">
        <ul class="nav flex-column menu">
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
                        <a class="nav-link" href="/formulir">Formulir</a>
                    </div>
                </div>
            </li>
            <li class="nav-item menu-item"
                style="background-color: <?= ($navbar == 'data') ?  '#C7C7C7' : '#E0E0E0' ?>;">
                <div class="row">
                    <div class="col-1">
                        <img src="/img/penduduk.png">
                    </div>
                    <div class="col">
                        <a class="nav-link" href="/penduduk">Data Penduduk</a>
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
                        <a class="nav-link" aria-current="page" href="/logout">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>