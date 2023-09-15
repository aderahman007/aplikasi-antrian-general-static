<?php
require_once "../../config/database.php";

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nama_instansi = $_POST['nama_instansi'];
        $alamat = $_POST['alamat'];
        $telpon = $_POST['telpon'];
        $email = $_POST['email'];
        $running_text = $_POST['running_text'];
        $youtube_id = $_POST['youtube_id'];
        $no_loket = $_POST['no_loket'];
        $nama_loket = $_POST['nama_loket'];
        $warna_primary = $_POST['warna_primary'];
        $warna_secondary = $_POST['warna_secondary'];
        $warna_accent = $_POST['warna_accent'];
        $warna_background = $_POST['warna_background'];
        $warna_text = $_POST['warna_text'];

        $nama_logo = $_POST['nama_logo'];

        $loket = array();
        if(count($no_loket) > 0){
            foreach ($no_loket as $key_nk => $val_nk) {
                $loket[] = [
                    'no_loket' => $val_nk, 
                    'nama_loket' => $nama_loket[$key_nk]
                ];
            }
        }

        $list_loket = json_encode($loket);

        if ($_FILES['logo']['error'] == 4 || ($_FILES['logo']['size'] == 0 && $_FILES['logo']['error'] == 0)) {
            $logo = $nama_logo;
        }else {
            $targetDirectory = "../../assets/img/"; // Specify the directory where uploaded files will be stored
            $targetFile = $targetDirectory . basename($_FILES["logo"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            // Check if the file already exists
            if (file_exists($targetDirectory . $nama_logo)) {
                unlink($targetDirectory . $nama_logo);
                $uploadOk = 1;
            }

            // Check file size (limit to 2MB)
            if ($_FILES["logo"]["size"] > 2000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats (you can add more as needed)
            if ($fileType != "jpg" && $fileType != "jpeg" && $fileType != "png" && $fileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFile)) {
                    $logo = $_FILES["logo"]["name"];
                } else {
                    $logo = $nama_logo;
                }
            }
        }

        if ($id == '') {
            $save = mysqli_query($mysqli, "INSERT INTO queue_setting VALUES('', '$nama_instansi', '$logo', '$alamat', '$telpon', '$email', '$running_text', '$youtube_id', '$list_loket', '$warna_primary', '$warna_secondary', '$warna_accent', '$warna_background', '$warna_text')") or die('Ada kesalahan pada query save : ' . mysqli_error($mysqli));
        }else {
            $save = mysqli_query($mysqli, "UPDATE queue_setting SET nama_instansi='$nama_instansi', logo='$logo', alamat='$alamat', telpon='$telpon', email='$email', running_text='$running_text', youtube_id='$youtube_id', list_loket='$list_loket', warna_primary='$warna_primary', warna_secondary='$warna_secondary', warna_accent='$warna_accent', warna_background='$warna_background', warna_text='$warna_text' WHERE id='$id'") or die('Ada kesalahan pada query save : ' . mysqli_error($mysqli));
        }

        if ($save) {
            echo "Success";
        }
    }
}

?>