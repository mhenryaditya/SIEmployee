<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>

<h3>Tambah Pegawai</h3>
<p>Form untuk menambakan data pegawai</p>
<?php if (isset($tambah)): ?>

    <?php if ($tambah === 'Failed!'): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>
                <?= $tambah ?>
            </strong>
            <?= $message ?>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

<?php endif; ?>
<form action="<?= base_url() ?>data/tambahPegawai/simpan" method="post" enctype="multipart/form-data">

    <?php csrf_field() ?>
    <div class="mb-3">
        <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
        <input type="text"
            class="form-control <?= (!empty($validation) ? ($validation->hasError('name') ? 'is-invalid aria-describedby="nameTls"' : '') : '') ?>"
            id="name" name="name" autofocus>
        <div id="nameTls" class="invalid-feedback ">
            <?= (!empty($validation) ? ($validation->hasError('name') ? $validation->getError('name') : '') : '') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
        <input type="email"
            class="form-control <?= (!empty($validation) ? ($validation->hasError('email') ? 'is-invalid aria-describedby="emailTls"' : '') : '') ?>"
            id="email" name="email" autofocus>
        <div id="emailTls" class="invalid-feedback ">
            <?= (!empty($validation) ? ($validation->hasError('email') ? $validation->getError('email') : '') : '') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="date_accept" class="form-label">Tanggal Diterima<span class="text-danger">*</span></label>
        <input type="date"
            class="form-control <?= (!empty($validation) ? ($validation->hasError('date_accept') ? 'is-invalid aria-describedby="date_acceptTls"' : '') : '') ?>"
            id="date_accept" name="date_accept" autofocus>
        <div id="date_acceptTls" class="invalid-feedback ">
            <?= (!empty($validation) ? ($validation->hasError('date_accept') ? $validation->getError('date_accept') : '') : '') ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Foto Profile</label>
        <input
            class="form-control <?= (!empty($validation) ? ($validation->hasError('picture') ? 'is-invalid aria-describedby="pictureTls"' : '') : '') ?>"
            type="file" id="formFile" name="picture" autofocus>
        <div id="pictureTls" class="invalid-feedback">
            <?= (!empty($validation) ? ($validation->hasError('picture') ? $validation->getError('picture') : '') : '') ?>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-3 ">
        <button type="button" class="btn btn-danger" id="back">Kembali</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<script>
    $('#back').click(() => {
        window.location.replace("<?= base_url() ?>data");
    })
</script>

<?= $this->endSection() ?>