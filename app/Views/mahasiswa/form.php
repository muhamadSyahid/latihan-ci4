<div class="container">
<?php echo $this->include('template/header') ?>
<h2><?php echo isset($mahasiswa) ? 'Ubah' : 'Tambah'?> Mahasiswa</h2>
<a href="<?php echo base_url('/mahasiswa') ?>" class="btn btn-info"> Kembali</a>
<?php if (session()->getFlashdata('errors')): ?>
            <div style="color: red; margin-bottom: 10px;">
                <?php
                $errors = session()->getFlashdata('errors'); 
                foreach ($errors as $err){
                  echo $err; 
                } 
                ?>
            </div>
        <?php endif; ?>
<form action="<?= isset($mahasiswa) ? base_url('mahasiswa/' . $mahasiswa['mahasiswa_id']) : base_url('mahasiswa') ?>" method="POST">
<?php if (isset($mahasiswa)) : ?>
            <input type="hidden" name="_method" value="PUT">
          <?php endif; ?>
<br>
<label for="nim" class="form-label">NIM</label>
<input type="text" class="form-control" name="nim" value="<?php echo isset($mahasiswa) ? $mahasiswa['nim'] : ''?>" required>
<br>
<label for="nama" class="form-label">Nama Lengkap</label>
<input type="text" class="form-control" name="nama" value="<?php echo isset($mahasiswa) ? $mahasiswa['nama_lengkap'] : ''?>" required>
<br>
<label for="jk" class="form-label">Jenis Kelamin</label><br>
<input type="radio" name="jk" id="jkl" class="form-check-input" value="L" <?= !isset($mahasiswa) || isset($mahasiswa) && $mahasiswa['jenis_kelamin'] === 'L' ? 'checked' : '' ?>>
<label for="jkl" class="form-label">Laki-Laki</label>
<input type="radio" name="jk" id="jkp" class="form-check-input" value="P" <?= isset($mahasiswa) && $mahasiswa['jenis_kelamin'] === 'P' ? 'checked' : '' ?>>
<label for="jkl" class="form-label">Perempuan</label>
<br>
<label for="tl" class="form-label">Tanggal Lahir</label>
<input type="date" class="form-control" name="tl" value="<?= isset($mahasiswa) ? $mahasiswa['tanggal_lahir'] : '' ?>" required>
<br>
<button type="submit" class="btn btn-success"><?= isset($mahasiswa) ? 'Ubah' : 'Simpan' ?></button>
<a href="<?= base_url('mahasiswa') ?>" class="btn btn-danger">Batal</a>
</form>
</div>
