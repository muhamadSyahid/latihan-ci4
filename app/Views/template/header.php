
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"> 
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"> 
                <svg class="bi me-2" width="40" height="32" aria-hidden="true">
                    <use xlink:href="#bootstrap"></use>
                </svg> 
                <span class="fs-4">WEBSITE SMA XYZ</span> </a> 
                <ul class="nav nav-pills"> 
                    <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Home</a></li> 
                    <?php $uri = service('uri'); ?>
                    <li class="nav-item">
                        <a href="/berita" class="nav-link<?= $uri->getSegment(1) === 'berita' ? ' active' : '' ?>" aria-current="page">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a href="/mahasiswa" class="nav-link<?= $uri->getSegment(1) === 'mahasiswa' ? ' active' : '' ?>">Data Mahasiswa</a>
                    </li>
                    <li class="nav-item"><a href="/logout" class="btn btn-danger" aria-current="page">Logout</a></li>
                </ul> 
        </header> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
