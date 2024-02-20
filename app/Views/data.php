<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>
<h3>Data Pegawai</h3>

<a href="/tambahPegawai" class="btn btn-primary ">Tambah</a>

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
                        <a href="/data/detailPegawai" class="btn btn-success " id="btn">Detail</a>
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