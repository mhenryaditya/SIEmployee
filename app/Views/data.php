<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>

<div class="d-flex mb-2">
    <h3 class="flex-grow-1">Data Pegawai</h3>
    <a href="/data/tambahPegawai" class="btn btn-primary">Tambah Data Pegawai</a>
</div>

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
        <?php $no = 0; ?>
        <?php if (count($data1) > 0): ?>
            <?php foreach ($data1 as $dt): ?>
                <?php $no++ ?>
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
                        <a href="/data/detail/<?= $dt["id_employee"] ?>" class="btn btn-success " id="btn">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (count($data1) == 0): ?>
            <tr>
                <td colspan="6" class="text-center ">Tidak ada data pegawai yang ditampilkan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<script>
    // $('#btn').click(() => {
    //     //$.get('')
    // });

</script>
<?= $this->endSection('section') ?>