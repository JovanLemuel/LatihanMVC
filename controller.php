<?php

include_once("allController.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['listModel'])) {
    $_SESSION['listModel'] = array();
}

function insert()
{
    $modelData = new model();
    $modelData->karyawanData = $_POST['karyawanData'];
    $modelData->officeData = $_POST['officeData'];
    array_push($_SESSION['listModel'], $modelData);
}

function index()
{
    return $_SESSION['listModel'];
}

function delete($id)
{
    unset($_SESSION['listModel'][$id]);
}

function dataKaryawan()
{
    return $_SESSION['listKaryawan'];
}

function dataOffice()
{
    return $_SESSION['listOffice'];
}
