<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>

<div class="d-flex mb-2">
    <div class="flex-grow-1 d-flex flex-column ">
        <h3 class="">Data Pegawai</h3>
        <p class="m-0 ">Daftar lengkap data-data pegawai</p>
    </div>
    <div class="d-flex align-items-center ">
        <a href="/data/tambahPegawai" class="btn btn-primary align-items-center">Tambah Data</a>
    </div>
</div>

<?php if (count($dataList) > 0): ?>
    <div class="d-flex justify-content-end">
        <form class="input-group mb-3 w-25" action="<?= base_url() ?>data/find" method="post">
            <input type="text" class="form-control" placeholder="Cari data pegawai" name="search">
            <button class="btn btn-outline-primary" style="#button-addon2:hover{color: white;}" type="submit"
                id="button-addon2">
                <img src="<?= base_url() ?>icons/search.svg" alt="searchIcon">
            </button>
        </form>
    </div>
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
                        <a href="<?= base_url() ?>data/detail/<?= $dt["id_employee"] ?>" class="btn btn-success "
                            id="btn">Detail</a>
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
<?= $this->endSection('section') ?>