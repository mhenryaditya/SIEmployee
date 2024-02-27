<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>

<h3 class="mb-1">Detail Data Pegawai</h3>
<p>Halaman Keterangan Detail Terkait Data Pegawai</p>

<div class="mt-2 border border-white ">

    <?php if (isset($tambah)): ?>
        <?php if ($tambah === 'Failed!'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>
                    <?= $tambah ?>
                </strong>
                <?= $message ?>
                <?php foreach ($error as $list): ?>
                    <br>
                    <?= $list ?>
                <?php endforeach; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    <form action="<?= base_url() ?>data/hapusPegawai" method="post" class="d-flex gap-4 mt-3 " id="deleteForm">
        <?php csrf_field() ?>
        <div class="mb-3 d-flex flex-column">
            <img src="<?= base_url("/img/") . $data1['picture'] ?>" alt="<?= $data1['name'] ?>Foto" class="img-fluid">
        </div>
        <div class="flex-grow-1 ">
            <input type="hidden" name="_method" value="DELETE">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $data1['name'] ?>" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $data1['email'] ?>"
                    disabled>

            </div>
            <div class="mb-3">
                <label for="date_accept" class="form-label">Tanggal Diterima</label>
                <input type="date" class="form-control" id="date_accept" name="date_accept"
                    value="<?= $data1['date_accept'] ?>" disabled>
            </div>

            <input type="hidden" name="id_employee" value="<?= $data1['id_employee'] ?>">
            <div class="d-flex justify-content-center gap-3">
                <a href="<?= base_url() ?>data" class="btn btn-primary " id="back">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left-circle-fill mb-1 me-1" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                    </svg>Kembali</a>
                <button type="button" value="data/editPegawai/" class="btn btn-warning " data-bs-toggle="modal"
                    data-bs-target="#exampleModal" id="edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil-square mb-1 me-1" viewBox="0 0 16 16">
                        <path
                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd"
                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                    </svg>Edit</button>
                <button type="submit" class="btn btn-danger" id="delete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash3-fill mb-1 me-1" viewBox="0 0 16 16">
                        <path
                            d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                    </svg>Hapus Data</button>
            </div>
        </div>
    </form>

</div>

<!-- Modal Edit Data-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengeditan Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>data/update" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <?php csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $data1['name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $data1['email'] ?>">

                    </div>
                    <div class="mb-3">
                        <label for="date_accept" class="form-label">Tanggal Diterima</label>
                        <input type="date" class="form-control" id="date_accept" name="date_accept"
                            value="<?= $data1['date_accept'] ?>">
                    </div>
                    <input type="hidden" name="id_employee" value="<?= $data1['id_employee'] ?>">
                    <div class="mb-3">
                        <div class="d-flex gap-2 ">
                            <label for="formFile" class="form-label">Foto Profile</label>
                            <span>(<a href="<?= base_url('/img/') . $data1['picture'] ?>"
                                    class="text-decoration-none ">Lihat Pratinjau Foto</a>)</span>
                        </div>
                        <input
                            class="form-control <?= (!empty($validation) ? ($validation->hasError('picture') ? 'is-invalid aria-describedby="pictureTls"' : '') : '') ?>"
                            type="file" id="formFile" name="picture" autofocus value="<?= $data1['picture'] ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#delete').click(e => {
        e.preventDefault();
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data yang telah dihapus tidak dapat dikembalikan.",
            icon: "warning",
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonColor: 'red',
        }).then(result => {
            if (result.isConfirmed) {
                $('#deleteForm').unbind('submit').submit();
            }
        })
    })

</script>

<?= $this->endSection() ?>