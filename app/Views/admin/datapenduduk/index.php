<?= $this->extend('layouts/templateAdmin'); ?>

<?= $this->section('contentAdmin'); ?>

<div class="judul-data container-fluid">
    <h2>Data Penduduk</h2>
</div>
<div class="kepala">
    <nav class="navbar">
        <div class="container-fluid">
            <button class="navbar-brand btn btn-outline-success">Tambah Data</button>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<div class="container-fluid" id="content_penduduk">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Nik</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>AYUB</td>
                <td>3517075532094025</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Nyambek</td>
                <td>3517075532094025</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Mex</td>
                <td>3517075532094025</td>
            </tr>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>