    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<body>
    <div class="container">
        <!-- <a href="<?= base_url('/mahasiswa/new') ?>" class="btn btn-success mb-3"><i class="bi bi-plus"></i>Tambah Mahasiswa</a> -->
        <h1>Biodata</h1>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
            </thead>
            <tbody>
                <tr>
                    <?php 
                if ($mahasiswa){
                    $no = 1 + ($paginate * ($current_page - 1));
                    foreach ($mahasiswa as $mhs) {
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $mhs['nim'];?></td>
                    <td><?php echo $mhs['nama_lengkap'];?></td>
                </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>