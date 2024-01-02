<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include 'koneksi.php';

$result = $koneksi->query("SELECT * FROM siswa ORDER BY id DESC");
