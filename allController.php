<?php
include_once("office.php");
include_once("karyawan.php");
include_once("model.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once("controllerKaryawan.php");
include_once("controllerOffice.php");
include_once("controller.php");
