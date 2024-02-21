<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>

<h1>Tambah Pegawai</h1>
<p>Form untuk menambakan data pegawai</p>

<form action="/data/tambahPegawai/simpan" method="post">

    <?php csrf_field() ?>
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text"
            class="form-control <?= (!empty($validation) ? ($validation->hasError('name') ? 'is-invalid aria-describedby="nameTls"' : '') : '') ?>"
            id="name" name="name" autofocus>
        <div id="nameTls" class="invalid-feedback ">
            <?= (!empty($validation) ? ($validation->hasError('name') ? $validation->getError('name') : '') : '') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email"
            class="form-control <?= (!empty($validation) ? ($validation->hasError('email') ? 'is-invalid aria-describedby="emailTls"' : '') : '') ?>"
            id="email" name="email" autofocus>
        <div id="emailTls" class="invalid-feedback ">
            <?= (!empty($validation) ? ($validation->hasError('email') ? $validation->getError('email') : '') : '') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="date_accept" class="form-label">Tanggal Diterima</label>
        <input type="date"
            class="form-control <?= (!empty($validation) ? ($validation->hasError('date_accept') ? 'is-invalid aria-describedby="date_acceptTls"' : '') : '') ?>"
            id="date_accept" name="date_accept" autofocus>
        <div id="date_acceptTls" class="invalid-feedback ">
            <?= (!empty($validation) ? ($validation->hasError('date_accept') ? $validation->getError('date_accept') : '') : '') ?>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?= $this->endSection() ?>