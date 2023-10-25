# Aplikasi Antrian General Static

Aplikasi Antrian merupakan sistem manajemen yang digunakan untuk mengelola antrian pengunjung pada suatu perusahaan atau instansi. Aplikasi antrian dapat digunakan sebagai sarana untuk mencapai kinerja efektif dan efisien bagi perusahaan atau instansi dalam melayani pengunjung.

**Aplikasi ini dibangun dengan :**

- Menggunakan bahasa pemrograman **PHP 7.\*** / Newer.
- Menggunakan database management system **MySQL** atau **MariaDB**.
- Menggunakan **MySQLi Extension** untuk berkomunikasi dengan database.
- Menggunakan framework CSS **Bootstrap 5** untuk membuat desain tampilan aplikasi.
- Menggunakan **jQuery AJAX** untuk proses CRUD.
- Menggunakan **API** teks berbicara dalam bahasa Indonesia dari **ResponsiveVoice.JS** untuk suara panggilan antrian.
- Menggunakan **Rachet PHP WebSocket** untuk server listener panggilan suara pada monitor dashboard antrian.
- Menggunakan **Mike42/EscPrinter** untuk print struck antrian 

# Fitur Apilkasi

Aplikasi Antrian ini terdiri dari 4 interface, yaitu **Nomor Antrian**, **Panggilan Antrian** **Monitor Antrian** dan **Setting Aplikasi Antrian**.

### 1. Nomor Antrian

Halaman Nomor Antrian digunakan pengunjung untuk mengambil nomor antrian. Fitur ini bisa Kamu kembangkan lagi dengan menambahkan fungsi cetak nomor antrian secara langsung ke printer POS 88Cm.

### 2. Panggilan Antrian

Halaman Panggilan Antrian digunakan petugas loket untuk memanggil antrian pengunjung. Halaman ini menampilkan informasi jumlah antrian, nomor antrian yang sedang dipanggil nomor antrian selanjutnya yang akan dipanggil, sisa antrian yang belum dipanggil. Petugas loket dapat menekan tombol panggilan antrian pada layar untuk memanggil antrian dengan menggunakan suara yang bisa dihubungkan dengan alat pengeras suara.

### 3. Monitor Antrian

Halaman monitor antrian digunakan untuk menampilkan dashboard antrian dan untuk mengeluarkan suara antrian yang sedang dipanggil oleh petugas loket antrian

### 3. Setting Aplikasi Antrian

Halaman Setting Aplikasi Antrian untuk memudahkan dalam configurasi aplikasi seperti nama aplikasi, logo, loket, styling dashboard monitor antrian

# Cara Install

## Siapkan system requirment berikut

- Xampp / Laragon (Rekomended)
- PHP 7.3 >= Newer
- MYSQL / MARIADB
- Composer

## Configurasi
- Jalankan **composer install**
- Ubah alamat WebSocket sesuai dengan alamat ip komputer server pada **pages/monitor/index.php Line 220**, **pages/panggilan/index.php Line 165**
- Jalankan Server WebSocket pada root project dengan perintah **php server.php** (Command ini jangan di close)
- Akses aplikasi antrian
- Login default static Setting Aplikasi Antrian
    Username : superadmin
    Password : superadmin@123

#### Script MIT Lisence 
