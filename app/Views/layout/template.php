<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $title ?>
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>jquery.js"></script>
</head>

<body class="d-flex flex-column " style="height: 100vh;">
    <nav class="navbar navbar-dark bg-primary mb-3 pt-3 pb-3">
        <div class="container-fluid d-flex flex-row justify-content-start ms-5">
            <a class="navbar-brand border-end pe-3 align-items-center " href="/">SIEmployee</a>
            <ul class="navbar-nav d-flex flex-row gap-4 align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?php if ($title === 'Beranda') {
                        echo 'active';
                    } ?>" aria-current="page" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($title === 'Project') {
                        echo 'active';
                    } ?>" aria-current="page" href="/project">Project</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($title === 'Pendataan') {
                        echo 'active';
                    } ?>" href="/data">Pendataan</a>
                </li>
            </ul>
        </div>
    </nav>
    <main class="ms-5 me-5 flex-grow-1 ">

        <?= $this->renderSection('section') ?>

    </main>
    <div class="container-fluid">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>
                <span class="mb-3 mb-md-0 text-muted">&copy;
                    <?= date('Y') ?> Company, Inc
                </span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter" />
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram" />
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook" />
                        </svg></a></li>
            </ul>
        </footer>
    </div>
</body>

</html>