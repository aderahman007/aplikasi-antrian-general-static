<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Antrian General Static</title>
    <!-- Favicon icon -->
    <link href="../../assets/img/favicon.ico" type="image/x-icon" rel="shortcut icon">

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
    <style>
        body {
            overflow: hidden;
        }

        main {
            height: 85vh;
            position: relative;
            z-index: 0;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        thead {
            position: sticky;
            top: 0;
            background-color: #f9f9f9;
            z-index: 1;
        }

        .card-blur {
            background-color: #fdfeff47;
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
            border-radius: 10px;
        }
    </style>
</head>

<?php
$hariIni = new DateTime();
function hariIndo($hariInggris)
{
    switch ($hariInggris) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}

require_once "../../config/database.php";
$query = mysqli_query($mysqli, "SELECT * FROM queue_setting ORDER BY id DESC LIMIT 1") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
// ambil jumlah baris data hasil query
$rows = mysqli_num_rows($query);

if ($rows <> 0) {
    $data = mysqli_fetch_assoc($query);
} else {
    $data = [];
}
?>

<body class="d-flex flex-column" style="background-color:<?= $data['warna_background'] ? $data['warna_background'] : '#6B5935' ?>;">
    <header style="background-color:<?= $data['warna_primary'] ? $data['warna_primary'] : '#6B5935' ?>;" class="d-flex flex-wrap justify-content-center align-items-center py-3 px-5  border-bottom">
        <a href="#" class="d-flex gap-3 align-items-center mb-3 mb-md-0 me-md-auto  text-decoration-none">
            <span style="color:<?= $data['warna_text'] ? $data['warna_text'] : '#fff' ?>;" class="fs-4 fw-bold">Monitor Antrian Pendaftaran</span>
        </a>
        <ul class="nav nav-pills fs-4" style="color:<?= $data['warna_text'] ? $data['warna_text'] : '#fff' ?> ">
            <li class="nav-item me-5">
                <i class="far fa-calendar-alt me-3"></i>
                <span id="date"><?= hariIndo(date('l')) . " " . strftime('%d %B %Y', $hariIni->getTimestamp()); ?></span>
            </li>
            <li class="nav-item">
                <i class="fas fa-clock me-3"></i>
                <span id="time"></span>
            </li>
        </ul>
    </header>

    <main class="px-5 overflow-auto my-2" style="color:<?= $data['warna_text'] ? $data['warna_text'] : '#fff' ?>;">
        <div class="text-dark overflow-auto">
            <div class="card mt-2 card-blur">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <img class="img-fluid d-block mx-auto" src="<?= $data['logo'] && file_exists('../../assets/img/' . $data['logo']) ? '../../assets/img/' . $data['logo'] : '../../assets/img/default.png' ?>" alt="Image" class="mr-3" style="max-width: 70px;">
                        </div>
                        <div class="col-10 text-center text-white">
                            <h4 class="card-title"><?= $data['nama_instansi'] ? $data['nama_instansi'] : ''; ?></h4>
                            <h6 class="card-text"><?= $data['alamat'] ? $data['alamat'] : ''; ?></h6>
                            <p class="card-text">Tlp. <?= $data['telpon'] ? $data['telpon'] : ''; ?>, Email. <?= $data['email'] ? $data['email'] : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex mt-3 vh-100">
            <div style="width:65%;" class="d-flex rounded justify-content-center">
                <iframe class="rounded" width="100%" height="450" allow="autoplay" src="https://www.youtube.com/embed/U7luoXkcXrg?rel=0&modestbranding=1&autohide=1&mute=0&showinfo=0&controls=1&loop=1&autoplay=1&playlist=U7luoXkcXrg">
                </iframe>
            </div>
            <div style="width:35%" class="h-100 overflow-hidden scroll-container" style="font-size:0.8em;">
                <div class="h-auto d-flex flex-column scroll-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card text-center text-white bg-info" style="margin-left:15px;">
                                <h5 class="card-header">NOMOR ANTRIAN SEKARANG</h5>
                                <div class="card-body">
                                    <h1 id="antrian-sekarang" class="text-center fw-bold" style="font-size: 100px;">-</h1>
                                </div>
                                <h5 class="card-footer text-bold namaLoketMonitor"></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <div class="card text-center text-white bg-warning" style="margin-left:15px;">
                                <h5 class="card-header">ANTRIAN SELANJUTNYA</h5>
                                <div class="card-body">
                                    <h1 id="antrian-selanjutnya" class="text-center fw-bold my-3" style="font-size: 80px;">-</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card text-center text-white bg-primary" style="margin-left:15px;">
                                <h5 class="card-header">TOTAL ANTRIAN</h5>
                                <div class="card-body">
                                    <h1 id="jumlah-antrian" class="text-center fw-bold my-3" style="font-size: 80px;">-</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <footer class="overflow-hidden position-absolute w-100 bottom-0 p-2" style="background-color: <?= $data['warna_primary'] ? $data['warna_primary'] : '#fff' ?>;color:<?= $data['warna_text'] ? $data['warna_text'] : '#fff' ?>;font-size:0.7rem;">
        <h5 class="scroll-horizontal">
            <marquee behavior="left" direction="left"><b><?= $data['running_text'] ? $data['running_text'] : ''; ?></b></marquee>
        </h5>
        <div class="text-center">
            copyright &copy; <?= date('Y') ?> by Paperless Hospital
        </div>
    </footer>

    <!-- load file audio bell antrian -->
    <audio id="tingtung" src="../../assets/audio/tingtung.mp3"></audio>

    <!-- jQuery Core -->
    <script src="../../assets/vendor/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <!-- Popper and Bootstrap JS -->
    <script src="../../assets/vendor/js/popper.min.js" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="../../assets/vendor/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Get API Key -> https://responsivevoice.org/ -->
    <script src="../../assets/vendor/js/responsivevoice.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            // buat variabel untuk menampilkan audio bell antrian
            var bell = document.getElementById('tingtung');
            var queuePanggil = [];
            var currentPanggil = 0;
            var isPlay = false;

            $('#jumlah-antrian').load('../panggilan/get_jumlah_antrian.php');
            $('#antrian-sekarang').load('../panggilan/get_antrian_sekarang.php');
            $('#antrian-selanjutnya').load('../panggilan/get_antrian_selanjutnya.php');

            // auto reload data antrian setiap 1 detik untuk menampilkan data secara realtime
            setInterval(function() {
                $('#jumlah-antrian').load('../panggilan/get_jumlah_antrian.php').fadeIn("slow");
                $('#antrian-sekarang').load('../panggilan/get_antrian_sekarang.php').fadeIn(1000);
                $("#antrian-sekarang").fadeOut(800);
                $('#antrian-selanjutnya').load('../panggilan/get_antrian_selanjutnya.php').fadeIn("slow");
            }, 1000);

            var conn = new WebSocket('ws://localhost:8081');
            conn.onopen = function(e) {
                console.log("Connection established!");
            };

            conn.onmessage = function(e) {
                let panggil = JSON.parse(e.data);
                queuePanggil.push(panggil);
                console.log(queuePanggil);
                if (!isPlay) {
                    panggilAntrian();
                }
            };

            function panggilAntrian() {
                if (queuePanggil.length > 0) {
                    queuePanggil.forEach((value, index) => {
                        if (!isPlay) {
                            isPlay = true;
                            $(".namaLoketMonitor").html("LOKET " + value.loket);
                            // mainkan suara bell antrian
                            bell.currentTime = 0;
                            bell.pause();
                            bell.play();

                            // set delay antara suara bell dengan suara nomor antrian
                            durasi_bell = bell.duration * 770;

                            // mainkan suara nomor antrian
                            setTimeout(function() {
                                responsiveVoice.speak("Nomor Antrian, " + value.no_antrian + ", menuju, loket, " + value.loket, "Indonesian Female", {
                                    rate: 0.9,
                                    pitch: 1,
                                    volume: 1,
                                    onend: () => {
                                        queuePanggil.splice(index, 1);
                                        isPlay = false;
                                        if (queuePanggil.length > 0) {
                                            panggilAntrian();
                                        }
                                    }
                                });
                            }, durasi_bell);
                        }
                    });
                }
            }
        });
    </script>

    <script>
        jam();

        function jam() {
            var e = document.getElementById("time"),
                d = new Date(),
                h,
                m,
                s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ":" + m + ":" + s;

            setTimeout("jam()", 1000);
        }

        function set(e) {
            e = e < 10 ? "0" + e : e;
            return e;
        }
    </script>
</body>

</html>