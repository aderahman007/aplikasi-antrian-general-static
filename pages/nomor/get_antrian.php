<?php
// Mengatasi CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header('Access-Control-Allow-Methods: GET, POST');
header("Allow: GET, POST");
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET')) {
    // panggil file "database.php" untuk koneksi ke database
    require_once "../../config/database.php";

    // ambil tanggal sekarang
    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

    // sql statement untuk menampilkan jumlah data dari tabel "queue_antrian_admisi" berdasarkan "tanggal"
    $query = mysqli_query($mysqli, "SELECT max(no_antrian) as jumlah FROM queue_antrian_admisi WHERE tanggal='$tanggal'") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil data hasil query
    $data = mysqli_fetch_assoc($query);
    // buat variabel untuk menampilkan data
    $jumlah_antrian = $data['jumlah'];

    // tampilkan data
    echo $jumlah_antrian;
}
