<?php

/* =========================================================
   🔐 AUTHENTICATION DASHBOARD
========================================================= */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


/* =========================================================
   CEK LOGIN
========================================================= */

if (
    !isset($_SESSION['is_login']) ||
    $_SESSION['is_login'] !== true
) {

    header("Location: ../Login-php/login.php");
    exit;

}


/* =========================================================
   CEK ROLE
========================================================= */

if (
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'admin'
) {

    header("Location: ../Login-php/akses_ditolak.php");
    exit;

}