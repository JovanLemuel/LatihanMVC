<?php

include_once("allController.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['listOffice'])) {
    $_SESSION['listOffice'] = array();
}

function insertOffice()
{
    $office = new office();
    $office->officeName = $_POST['officeName'];
    $office->address = $_POST['address'];
    $office->city = $_POST['city'];
    $office->phone = $_POST['phone'];
    array_push($_SESSION['listOffice'], $office);
}

function indexOffice()
{
    return $_SESSION['listOffice'];
}

function deleteOffice($id)
{
    unset($_SESSION['listOffice'][$id]);
}

function editOffice($id)
{
    $_SESSION['listOffice'][$id]->setOfficeName($_POST['officeName']);
    $_SESSION['listOffice'][$id]->setAddress($_POST['address']);
    $_SESSION['listOffice'][$id]->setCity($_POST['city']);
    $_SESSION['listOffice'][$id]->setPhone($_POST['phone']);
}
