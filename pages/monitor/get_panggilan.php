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
    $query = mysqli_query($mysqli, "SELECT id, antrian, loket FROM queue_penggilan_antrian ORDER BY id ASC") or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    
    $dataAntrian = array();

    // Ambil hasil query dan masukkan ke dalam array
    while ($row = mysqli_fetch_assoc($query)) {
        $dataAntrian[] = array(
            'id' => $row['id'],
            'antrian' => $row['antrian'],
            'loket' => $row['loket']
        );
    }

    echo json_encode([
        'success' => true,
        'message' => 'Success',
        'data' => $dataAntrian
    ]);
}
