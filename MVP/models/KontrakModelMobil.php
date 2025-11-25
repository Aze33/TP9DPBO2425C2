<?php

interface KontrakModelMobil {
    public function getAllMobil();
    public function getMobilById($id);
    public function addMobil($model, $mesin, $speed, $tahun);
    public function updateMobil($id, $model, $mesin, $speed, $tahun);
    public function deleteMobil($id);
}

?>