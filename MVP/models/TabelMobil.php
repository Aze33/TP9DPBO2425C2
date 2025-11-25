<?php
include_once("models/DB.php");
include_once("KontrakModel.php");
include_once("KontrakModelMobil.php");

class TabelMobil extends DB implements KontrakModelMobil {
    public function __construct($host, $db_name, $username, $password) {
        parent::__construct($host, $db_name, $username, $password);
    }

    public function getAllMobil() {
        $this->executeQuery("SELECT * FROM mobil");
        return $this->getAllResult();
    }

    public function getMobilById($id) {
        $this->executeQuery("SELECT * FROM mobil WHERE id=:id", ['id' => $id]);
        $res = $this->getAllResult();
        return $res[0] ?? null;
    }

    public function addMobil($model, $mesin, $speed, $tahun) {
        $query = "INSERT INTO mobil (model, mesin, top_speed, tahun) VALUES (:model, :mesin, :speed, :tahun)";
        $this->executeQuery($query, ['model' => $model, 'mesin' => $mesin, 'speed' => $speed, 'tahun' => $tahun]);
    }

    public function updateMobil($id, $model, $mesin, $speed, $tahun) {
        $query = "UPDATE mobil SET model=:model, mesin=:mesin, top_speed=:speed, tahun=:tahun WHERE id=:id";
        $this->executeQuery($query, ['id' => $id, 'model' => $model, 'mesin' => $mesin, 'speed' => $speed, 'tahun' => $tahun]);
    }

    public function deleteMobil($id) {
        $this->executeQuery("DELETE FROM mobil WHERE id=:id", ['id' => $id]);
    }
}
?>