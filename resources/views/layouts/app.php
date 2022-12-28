<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->e($title) ?> | Guilherme Tomé Test</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Guilherme Tomé dos Reis" />
    <link rel="shortcut icon" href="<?= asset('images/favicon.png') ?>">
    <link rel="apple-touch-icon" href="<?= asset('images/favicon.png') ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= asset('images/favicon.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= asset('images/favicon.png') ?>">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?= $this->section('scripts', '') ?>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= asset('images/fastview.png') ?>" alt="Logo" height="32" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav w-100 justify-content-between">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= url('home') ?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= request()->user->name ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <form action="<?= url('logout') ?>" method="post">
                                    <button class="dropdown-item" href="#" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?= $this->section('content') ?>
</body>

</html>