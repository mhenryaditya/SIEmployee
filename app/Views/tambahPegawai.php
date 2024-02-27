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
        <button type="button" class="btn btn-danger" id="back">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left-circle-fill mb-1 me-1" viewBox="0 0 16 16">
                <path
                    d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
            </svg>Kembali</button>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-plus-fill mb-1 me-1" viewBox="0 0 16 16">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                <path fill-rule="evenodd"
                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
            </svg>Submit</button>
    </div>
</form>

<script>
    $('#back').click(() => {
        window.location.replace("<?= base_url() ?>data");
    })
</script>

<?= $this->endSection() ?>