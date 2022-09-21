<?php

include_once("allController.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['listKaryawan'])) {
    $_SESSION['listKaryawan'] = array();
}

function insertKaryawan()
{
    $karyawan = new karyawan();
    $karyawan->nama = $_POST['nama'];
    $karyawan->jabatan = $_POST['jabatan'];
    $karyawan->usia = $_POST['usia'];
    array_push($_SESSION['listKaryawan'], $karyawan);
}

function indexKaryawan()
{
    return $_SESSION['listKaryawan'];
}

function deleteKaryawan($id)
{
    unset($_SESSION['listKaryawan'][$id]);
}
