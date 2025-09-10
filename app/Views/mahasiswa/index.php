<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biodata Mahasiswa</title>
</head>
<body>
    <div class="container">
        <?= $this->include('template/header') ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div style="color: red; margin-bottom: 10px;">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <a href="<?= base_url('/mahasiswa/new') ?>" class="btn btn-success mb-3"><i class="bi bi-plus"></i> Tambah Mahasiswa</a>
        <h1>Biodata</h1>
        <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                if ($mahasiswa){
                $no = 1 + ($paginate * ($current_page - 1));
                foreach ($mahasiswa as $mhs) {
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $mhs['nim'];?></td>
                    <td><?php echo $mhs['nama_lengkap'];?></td>
                    <td class="d-flex gap-1">
                        <a href="<?php echo base_url('/mahasiswa/' . $mhs['mahasiswa_id']) ?>" class="btn btn-info">Detail</a>
                        <a href="<?php echo base_url('/mahasiswa/' . $mhs['mahasiswa_id'] . '/edit')?>" class="btn btn-warning">Edit</a>
                
                    <form action="<?= base_url('/mahasiswa/' . $mhs['mahasiswa_id']) ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin?');">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </tr>
                <?php }
                 ?>
            </tbody>
        </table>
        <?php } else {
                    ?>
        <div class="d-flex justify-content-center align-items-center">
            <h3>Tidak Ada Data.</h3>
        </div>
        <?php } ?>
        <?php $pager->links('mahasiswa' , 'my_pager')?>
    </div>
</body>
</html>