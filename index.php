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
    <link href="assets/img/favicon.ico" type="image/x-icon" rel="shortcut icon">

    <!-- Bootstrap CSS -->
    <link href="assets/vendor/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="assets/vendor/css/bootstrap-icons.css" rel="stylesheet">

    <!-- Font -->
    <link href="assets/vendor/css/swap.css" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container">
            <?php
            require_once "config/database.php";
            $query = mysqli_query($mysqli, "SELECT * FROM queue_setting ORDER BY id DESC LIMIT 1") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
            // ambil jumlah baris data hasil query
            $rows = mysqli_num_rows($query);

            if ($rows <> 0) {
                $data = mysqli_fetch_assoc($query);
            } else {
                $data = [];
            }
            ?>
            <!-- tampilkan pesan selamat datang -->
            <div class="alert alert-light mb-3 mt-3" role="alert">
                <div class="text-center">
                    <img src="<?= $data['logo'] && file_exists('assets/img/' . $data['logo']) ? 'assets/img/' . $data['logo'] : 'assets/img/default.png' ?>" alt="Logo" width="60px" class="">
                    <h6 class="mt-2"><?= $data['nama_instansi'] ? $data['nama_instansi'] : ''; ?></h6>
                    <p>
                        <small>Silahkan pilih halaman yang ingin ditampilkan</small>
                    </p>
                </div>
            </div>

            <div class="row gx-3">
                <!-- link halaman nomor antrian -->
                <div class="col-sm-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="feature-icon-1 bg-success bg-gradient mb-4">
                                <i class="bi-people"></i>
                            </div>
                            <h3>Nomor Antrian</h3>
                            <p class="mb-5">Halaman Nomor Antrian digunakan pengunjung untuk mengambil nomor antrian.</p>
                            <a href="pages/nomor" class="btn btn-success rounded-pill px-4 py-2">
                                Tampilkan <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- link halaman panggilan antrian -->
                <div class="col-sm-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="feature-icon-1 bg-success bg-gradient mb-4">
                                <i class="bi-mic"></i>
                            </div>
                            <h3>Panggilan Antrian</h3>
                            <p class="mb-5">Halaman Panggilan Antrian digunakan petugas loket untuk memanggil antrian.</p>
                            <a href="javascript:;" class="btn btn-success rounded-pill px-4 py-2" data-bs-toggle="modal" data-bs-target="#panggilAntrian">
                                Tampilkan <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gx-3">
                <!-- link halaman monitor antrian -->
                <div class="col-sm-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="feature-icon-1 bg-success bg-gradient mb-4">
                                <i class="bi-display"></i>
                            </div>
                            <h3>Monitor Antrian</h3>
                            <p class="mb-5">Halaman Monitor Antrian digunakan menampilkan antrian pada monitor.</p>
                            <a href="pages/monitor" class="btn btn-success rounded-pill px-4 py-2">
                                Tampilkan <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- link halaman setting antrian -->
                <div class="col-sm-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="feature-icon-1 bg-success bg-gradient mb-4">
                                <i class="bi-gear"></i>
                            </div>
                            <h3>Setting Antrian</h3>
                            <p class="mb-5">Halaman Setting Antrian digunakan untuk setting antrian.</p>
                            <a href="pages/setting" class="btn btn-success rounded-pill px-4 py-2">
                                Tampilkan <i class="bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="panggilAntrian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="panggilAntrianLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="panggilAntrianLabel">Pilih Loket Antrian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <select class="form-select" id="loketAntrian">
                            <option value="" selected>Pilih Loket Antrian</option>
                            <?php $loket = json_decode($data['list_loket'], true); ?>
                            <?php if (count($loket) > 0) : ?>
                                <?php foreach ($loket as $lk) : ?>
                                    <option value="<?= $lk['no_loket']; ?>"><?= $lk['nama_loket']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary tampilAntrian">Tampilkan</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4">
        <div class="container">
            <!-- copyright -->
            <div class="copyright text-center mb-2 mb-md-0">&copy; <?php date('Y') ?> - <a href="https://paperlesshospital.id" target="_blank" class="text-brand text-decoration-none">paperlesshospital.id</a>. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- jQuery Core -->
    <script src="assets/vendor/js/jquery-3.6.0.min.js" type="text/javascript"></script>

    <!-- Popper and Bootstrap JS -->
    <script src="assets/vendor/js/popper.min.js" type="text/javascript"></script>

    <!-- Bootstrap JS -->
    <script src="assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>

    <script>
        $('.tampilAntrian').click(function(data) {
            let localLoket = localStorage.getItem("_loket");

            if (localLoket != null) {
                localStorage.removeItem("_loket");
            }

            let loket = $('#loketAntrian').val();
            if (loket != '') {
                localStorage.setItem("_loket", loket);
                window.location.href = "pages/panggilan"
            } else {
                alert("Silahkan pilih loket terlebih dahulu");
            }
        });
    </script>
</body>

</html>