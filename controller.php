<?php

include_once("model.php");
include_once("office.php");
include_once("karyawan.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['listModel'])) {
    $_SESSION['listModel'] = array();
}

function insert()
{
    $model = new model();
    $model->nama = $_POST['nama'];
    $model->officeName = $_POST['officeName'];
    array_push($_SESSION['listModel'], $model);
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
