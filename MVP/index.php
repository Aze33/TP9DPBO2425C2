<?php
// Include Models
include_once("models/DB.php");
include_once("models/TabelPembalap.php");
include_once("models/TabelMobil.php");

// Include Views
include_once("views/ViewPembalap.php");
include_once("views/ViewMobil.php");

// Include Presenters
include_once("presenters/PresenterPembalap.php");
include_once("presenters/PresenterMobil.php");

// Config DB
$host = 'localhost'; $db = 'mvp_db'; $user = 'root'; $pass = '';

// Cek Page
$page = $_GET['page'] ?? 'pembalap';

// ================= HALAMAN PEMBALAP =================
if ($page == 'pembalap') {
    $model = new TabelPembalap($host, $db, $user, $pass);
    $view = new ViewPembalap();
    $presenter = new PresenterPembalap($model, $view);

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            $presenter->tambahPembalap($_POST['nama'], $_POST['tim'], $_POST['negara'], $_POST['poinMusim'], $_POST['jumlahMenang']);
        } elseif ($_POST['action'] == 'edit') {
            $presenter->ubahPembalap($_POST['id'], $_POST['nama'], $_POST['tim'], $_POST['negara'], $_POST['poinMusim'], $_POST['jumlahMenang']);
        } elseif ($_POST['action'] == 'delete') {
            $presenter->hapusPembalap($_POST['id']);
        }
        header("Location: index.php?page=pembalap");
        exit;
    }

    $screen = $_GET['screen'] ?? 'list';
    if ($screen == 'add') echo $presenter->tampilkanFormPembalap();
    elseif ($screen == 'edit') echo $presenter->tampilkanFormPembalap($_GET['id']);
    else echo $presenter->tampilkanPembalap();

// ================= HALAMAN MOBIL (MESIN & SPEED) =================
} elseif ($page == 'mobil') {
    $model = new TabelMobil($host, $db, $user, $pass);
    $view = new ViewMobil();
    $presenter = new PresenterMobil($model, $view);

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'add') {
            $presenter->tambahData($_POST['model'], $_POST['mesin'], $_POST['top_speed'], $_POST['tahun']);
        } elseif ($_POST['action'] == 'edit') {
            $presenter->ubahData($_POST['id'], $_POST['model'], $_POST['mesin'], $_POST['top_speed'], $_POST['tahun']);
        } elseif ($_POST['action'] == 'delete') {
            $presenter->hapusData($_POST['id']);
        }
        header("Location: index.php?page=mobil");
        exit;
    }

    $screen = $_GET['screen'] ?? 'list';
    if ($screen == 'add') echo $presenter->tampilkanForm();
    elseif ($screen == 'edit') echo $presenter->tampilkanForm($_GET['id']);
    else echo $presenter->tampilkanDaftar();
}
?>