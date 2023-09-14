<?php
session_start();
$username = "superadmin";
$password = "superadmin@123";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameInput = isset($_POST['username']) ? $_POST['username'] : '';
    $passwordInput = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if the entered username exists in the array and the password is correct
    if (!empty($usernameInput) && !empty($passwordInput)) {
        if ($usernameInput == $username) {
            if ($passwordInput == $password) {
                // Authentication successful
                $_SESSION['username'] = $username;
                header("Location: index.php");
                exit;
            } else {
                echo "<script>alert('Password yang anda masukan salah')</script>";
                header("Location: index.php");
                exit;
            }
        } else {
            echo "<script>alert('Username yang anda masukan salah')</script>";
            header("Location: index.php");
            exit;
        }
    } else {
        echo "<script>alert('Username dan password tidak boleh kosong')</script>";
        header("Location: index.php");
        exit;
    }
}
