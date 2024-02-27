<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>

<div class="d-flex mb-2">
    <div class="flex-grow-1 d-flex flex-column ">
        <h3 class="mb-0">Data Pegawai</h3>
        <p class="m-0 ">Daftar lengkap data-data pegawai</p>
    </div>
    <div class="d-flex align-items-center ">
        <a href="/data/tambahPegawai" class="btn btn-danger align-items-center d-flex gap-1 ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-plus-circle align-items-center" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg>
            <span>Tambah Data</span></a>
    </div>
</div>

<?php if (count($dataList) > 0 || isset($search)): ?>
    <form class="input-group mb-3 w-25" action="<?= base_url() ?>data/find" method="GET" id="formSearch">
        <input type="text" class="form-control" placeholder="Cari data pegawai" name="search" id="search" <?= (isset($search) ? "value='$search'" : '') ?>>
        <button class="btn btn-outline-secondary" style="#button-addon2:hover{color: white;}" type="submit"
            id="button-addon2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search mb-1"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
        </button>
    </form>

<?php endif; ?>


<?php if (isset($tambah)): ?>

    <?php if ($tambah !== null): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="notif">
            <strong>
                <?= $tambah ?>
            </strong>
            <?= $message ?>.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Tanggal Diterima</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = (($pageNumber - 1) * $countofRow) + 1; ?>
        <?php if (count($dataList) > 0): ?>
            <?php foreach ($dataList as $dt): ?>
                <tr>
                    <th scope="row">
                        <?= $no ?>
                    </th>
                    <td>
                        <?= $dt["id_employee"] ?>
                    </td>
                    <td>
                        <?= $dt["name"] ?>
                    </td>
                    <td>
                        <?= $dt["email"] ?>
                    </td>
                    <td>
                        <?= $dt["date_accept"] ?>
                    </td>
                    <td>
                        <a href="<?= base_url() ?>data/detail/<?= $dt["id_employee"] ?>" class="btn btn-success" id="btn"
                            data-bs-toggle="tooltip" title="Detail Data">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-clipboard2-data mb-1" viewBox="0 0 16 16">
                                <path
                                    d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5z" />
                                <path
                                    d="M10 7a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0zm-6 4a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0zm4-3a1 1 0 0 0-1 1v3a1 1 0 1 0 2 0V9a1 1 0 0 0-1-1" />
                            </svg></a>
                    </td>
                </tr>
                <?php $no++ ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (count($dataList) == 0): ?>
            <tr>
                <td colspan="6" class="text-center ">Tidak ada data pegawai yang ditampilkan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="d-flex justify-content-end ">
    <?= $pager->links('employee', 'custom_pagination') ?>
</div>

<script>
    $('#search').keyup(() => {
        $('#formSearch').submit();
    })
</script>

<?= $this->endSection('section') ?>