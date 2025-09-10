<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red; margin-bottom: 10px;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <form action="/login" method="POST">
            <br>
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" required>
            <br>
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" required>
            <br>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</html>