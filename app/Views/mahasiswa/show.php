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
        <a href="<?php echo base_url('/mahasiswa') ?>" class="btn btn-info"> Kembali</a>
        <h1>Biodata</h1>
        <table class="table table-bordered">
            <thead>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $mahasiswa['nim'];?></td>
                    <td><?php echo $mahasiswa['nama_lengkap'];?></td>
                    <td><?php echo $mahasiswa['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan';?></td>
                    <td><?php echo date('d F Y', strtotime($mahasiswa['tanggal_lahir']))?></td>
                </tr>
            </tbody>
        </table>
        <!-- <a href="<?php echo base_url('/mahasiswa/' . $mahasiswa['mahasiswa_id']) ?>" class="btn btn-info">Detail</a> -->
        <a href="<?php echo base_url('/mahasiswa/' . $mahasiswa['mahasiswa_id'] . '/edit')?>" class="btn btn-warning" style="display: inline-block;">Edit</a>
        <form action="<?= base_url('/mahasiswa/' . $mahasiswa['mahasiswa_id']) ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin?');" style="display: inline-block; margin-left: 5px;">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
    </div>
</body>
</html>