<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>

<h1>Tambah Pegawai</h1>
<p>Form untuk menambakan data pegawai</p>

<form action="/data/tambahPegawai/simpan" method="post">
    <?php csrf_field() ?>
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="date_accept" class="form-label">Tanggal Diterima</label>
        <input type="date" class="form-control" id="date_accept" name="date_accept">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?= $this->endSection() ?>