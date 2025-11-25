<?php

interface KontrakPresenterMobil {
    public function tampilkanDaftar();
    public function tampilkanForm($id = null);
    public function tambahData($model, $mesin, $speed, $tahun);
    public function ubahData($id, $model, $mesin, $speed, $tahun);
    public function hapusData($id);
}

?>