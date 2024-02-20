<?= $this->extend('layout/template') ?>

<?= $this->section('section') ?>
<h3>Pendataan Agenda Perkuliahan</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Agenda</th>
            <th scope="col">Nama Agenda</th>
            <th scope="col">Kode Semester</th>
            <th scope="col">Tanggal Pembukaan</th>
            <th scope="col">Tanggal Penutupan</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        <?php foreach ($data1 as $dt): ?>
            <?php $no++ ?>
            <tr>
                <th scope="row">
                    <?= $no ?>
                </th>
                <td>
                    <?= $dt["kode_agenda"] ?>
                </td>
                <td>
                    <?= $dt["keterangan"] ?>
                </td>
                <td>
                    <?= $dt["kode_smt"] ?>
                </td>
                <td>
                    <?= $dt["date_open"] ?>
                </td>
                <td>
                    <?= $dt["date_close"] ?>
                </td>
                <td>
                    <a href="" class="btn btn-success " id="btn">Detail</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- <script>
    $('#btn').click(() => {
        $.get('')
    });
    
</script> -->
<?= $this->endSection('section') ?>