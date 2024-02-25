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
                <a href="<?= base_url() ?>data" class="btn btn-primary " id="back">Kembali</a>
                <button type="button" value="data/editPegawai/" class="btn btn-warning " data-bs-toggle="modal"
                    data-bs-target="#exampleModal" id="edit">Edit</button>
                <button type="submit" class="btn btn-danger" id="delete">Hapus Data</button>
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