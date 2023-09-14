<?php session_start(); ?>
<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Antrian General Static">
    <meta name="author" content="Ade Rahman">

    <!-- Title -->
    <title>Aplikasi Antrian General Static</title>

    <!-- Favicon icon -->
    <link href="../../assets/img/favicon.ico" type="image/x-icon" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="../../assets/vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="../../assets/vendor/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="../../assets/vendor/css/swap.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="../../assets/vendor/css/datatables.min.css" type="text/css" rel="stylesheet">

    <!-- Custom Style -->
    <link href="../../assets/css/style.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container pt-4">
            <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                <!-- judul halaman -->
                <div class="d-flex align-items-center me-md-auto">
                    <i class="bi-gear-fill text-success me-3 fs-3"></i>
                    <h1 class="h5 pt-2">Setting Aplikasi Antrian</h1>
                </div>
                <!-- breadcrumbs -->
                <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/aplikasi-antrian"><i class="bi-house-fill text-success"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Setting</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <?php if (!isset($_SESSION['username'])) : ?>
                <div class="row">
                    <div class="container pt-5">
                        <div class="row justify-content-lg-center">
                            <div class="col-lg-5 mb-4">
                                <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                                    <div class="d-flex justify-content-center align-items-center me-md-auto">
                                        <i class="bi-lock-fill text-success me-3 fs-5"></i>
                                        <h1 class="h5 pt-2">Login Admin</h1>
                                    </div>
                                </div>

                                <div class="card border-0 shadow-sm">
                                    <div class="card-body d-grid p-5">
                                        <form action="login.php" method="post">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                    </div>
                                                    <!-- button pengambilan nomor antrian -->
                                                    <button type="submit" class="btn btn-success btn-block">
                                                        <i class="bi-unlock-fill me-2 fs-4"></i> Login
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-8">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header">Informasi Instansi</div>
                            <div class="card-body p-4">
                                <div class="mb-3">
                                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="Nama Instansi">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="telpon" class="form-label">Telpon</label>
                                            <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Telpon">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="running_text" class="form-label">Running Text</label>
                                    <textarea class="form-control" id="running_text" name="running_text" rows="3" placeholder="Running Text"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="youtube_id" class="form-label">YouTube ID</label>
                                    <input type="text" class="form-control" id="youtube_id" name="youtube_id" placeholder="YouTube ID in Url parameter v Exp. U7luoXkcXrg">
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 shadow-sm mt-4">
                            <div class="card-header">Daftar Loket</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="mb-3">
                                                    <label for="nomor_loket" class="form-label">Nomor Loket</label>
                                                    <input type="text" class="form-control" id="nomor_loket" name="nomor_loket[]" placeholder="Nomor Loket">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="mb-3">
                                                    <label for="nama_loket" class="form-label">Nama Loket</label>
                                                    <input type="text" class="form-control" id="nama_loket" name="nama_loket[]" placeholder="Nama Loket">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="button" class="btn btn-success btn-sm addLoket" style="margin-top: 35px;"><i class="bi-plus-lg text-white"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div id="blockLoket"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header">Styling Monitor</div>
                            <div class="card-body p-4">
                                <div class="row justify-content-center align-items-center">
                                    <img src="../../assets/img/logo.png" class="rounded mx-auto d-block" alt="Logo" width="40px" height="400px">

                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Pilih Logo</label>
                                        <input class="form-control" type="file" id="logo" name="logo">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_primary" class="form-label">Warna Primary</label>
                                                <input type="color" class="form-control form-control-color" id="warna_primary" name="warna_primary" value="#563d7c" title="Warna Primary">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_secondary" class="form-label">Warna Secondary</label>
                                                <input type="color" class="form-control form-control-color" id="warna_secondary" name="warna_secondary" value="#563d7c" title="Warna Secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_accent" class="form-label">Warna Accent</label>
                                                <input type="color" class="form-control form-control-color" id="warna_accent" name="warna_accent" value="#563d7c" title="Warna Accent">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_background" class="form-label">Warna Background</label>
                                                <input type="color" class="form-control form-control-color" id="warna_background" name="warna_background" value="#563d7c" title="Warna Background">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="warna_text" class="form-label">Warna Text</label>
                                                <input type="color" class="form-control form-control-color" id="warna_text" name="warna_text" value="#563d7c" title="Warna Text">
                                            </div>
                                        </div>
                                        <div class="col-6"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-2 mt-4">
                            <button type="submit" class="btn btn-success btn-lg"><i class="bi-save-fill text-white me-3"></i> Simpan</button>
                            <form action="logout.php" method="post">
                                <button type="submit" class="btn btn-danger btn-lg"><i class="bi-box-arrow-right text-white me-3"></i> Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4">
        <div class="container">
            <hr class="my-4">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">&copy; <?php date('Y') ?> - <a href="https://paperlesshospital.id" target="_blank" class="text-brand text-decoration-none">paperlesshospital.id</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- jQuery Core -->
    <script src="../../assets/vendor/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="../../assets/vendor/js/popper.min.js" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="../../assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- DataTables -->
    <script src="../../assets/vendor/js/datatables.min.js" type="text/javascript"></script>
    <!-- Responsivevoice -->

    <script type="text/javascript">
        const html = `<div class="row block_row">
                        <div class="col-11">
                            <div class="row">
                                <div class="col-3">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="nomor_loket" name="nomor_loket[]" placeholder="Nomor Loket">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" id="nama_loket" name="nama_loket[]" placeholder="Nama Loket">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-danger btn-sm mt-1 deleteLoket"><i class="bi-trash text-white"></i></button>
                            </div>
                        </div>
                    </div>`;
        $(document).on("click", ".addLoket", function(e) {
            $("#blockLoket").append(html);
        });

        $(document).on("click", ".deleteLoket", function(e) {
            $(this).parents(".block_row").remove();
        });
    </script>
</body>

</html>