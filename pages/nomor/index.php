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

    <!-- Custom Style -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container pt-5">
            <div class="row justify-content-lg-center">
                <div class="col-lg-5 mb-4">
                    <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                        <!-- judul halaman -->
                        <div class="d-flex align-items-center me-md-auto">
                            <i class="bi-people-fill text-success me-3 fs-3"></i>
                            <h1 class="h5 pt-2">Nomor Antrian</h1>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center d-grid p-5">
                            <div class="border border-success rounded-2 py-2 mb-5">
                                <h3 class="pt-4">ANTRIAN</h3>
                                <!-- menampilkan informasi jumlah antrian -->
                                <h1 id="antrian" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                            </div>
                            <!-- button pengambilan nomor antrian -->
                            <a id="insert" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                                <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                            </a>
                        </div>
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
    <script src="../../assets/vendor/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="../../assets/vendor/js/popper.min.js" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="../../assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // tampilkan jumlah antrian
            $('#antrian').load('get_antrian.php');

            // proses insert data
            $('#insert').on('click', function() {
                $.ajax({
                    type: 'POST', // mengirim data dengan method POST
                    url: 'insert.php', // url file proses insert data
                    success: function(result) { // ketika proses insert data selesai
                        // jika berhasil
                        if (result === 'Sukses') {
                            // tampilkan jumlah antrian
                            $.get("get_antrian.php", function(data, status) {
                                $('#antrian').html(data).fadeIn('slow');
                            });
                        } else if (result.includes('Sukses')) {
                            $.get("get_antrian.php", function(data, status) {
                                $('#antrian').html(data).fadeIn('slow');
                                alert("Antrian anda " + data + " berhasil di ambil, tapi printer bermasalah!");
                            });
                        } else {
                            alert("Eits ada masalah nih, hubungi IT Support yaa!");
                        }
                    },
                });
            });
        });
    </script>
</body>

</html>