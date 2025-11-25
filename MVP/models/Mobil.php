<?php
class Mobil {
    private $id;
    private $model;
    private $mesin;
    private $topSpeed;
    private $tahun;

    public function __construct($id, $model, $mesin, $topSpeed, $tahun) {
        $this->id = $id;
        $this->model = $model;
        $this->mesin = $mesin;
        $this->topSpeed = $topSpeed;
        $this->tahun = $tahun;
    }

    public function getId() { return $this->id; }
    public function getModel() { return $this->model; }
    public function getMesin() { return $this->mesin; }
    public function getTopSpeed() { return $this->topSpeed; }
    public function getTahun() { return $this->tahun; }
}
?>