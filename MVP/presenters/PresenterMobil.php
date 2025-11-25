<?php
include_once("models/TabelMobil.php");
include_once("models/Mobil.php");
include_once("KontrakPresenterMobil.php");

class PresenterMobil implements KontrakPresenterMobil {
    private $tabelMobil;
    private $viewMobil;

    public function __construct($tabelMobil, $viewMobil) {
        $this->tabelMobil = $tabelMobil;
        $this->viewMobil = $viewMobil;
    }

    public function tampilkanDaftar() {
        $data = $this->tabelMobil->getAllMobil();
        $listMobil = [];
        foreach($data as $row) {
            $listMobil[] = new Mobil($row['id'], $row['model'], $row['mesin'], $row['top_speed'], $row['tahun']);
        }
        return $this->viewMobil->tampilList($listMobil);
    }

    public function tampilkanForm($id = null) {
        $data = null;
        if ($id) {
            $data = $this->tabelMobil->getMobilById($id);
        }
        return $this->viewMobil->tampilForm($data);
    }

    public function tambahData($model, $mesin, $speed, $tahun) {
        $this->tabelMobil->addMobil($model, $mesin, $speed, $tahun);
    }

    public function ubahData($id, $model, $mesin, $speed, $tahun) {
        $this->tabelMobil->updateMobil($id, $model, $mesin, $speed, $tahun);
    }

    public function hapusData($id) {
        $this->tabelMobil->deleteMobil($id);
    }
}
?>