<?php

include_once("KontrakViewMobil.php");

class ViewMobil implements KontrakViewMobil {
    
    public function tampilList($listMobil) {
        $rows = '';
        $no = 1;
        
        // Loop data mobil untuk membuat baris tabel
        foreach ($listMobil as $m) {
            $rows .= "<tr>";
            $rows .= "<td style='text-align:center'>$no</td>"; // Rata tengah
            $rows .= "<td>" . htmlspecialchars($m->getModel()) . "</td>";
            $rows .= "<td>" . htmlspecialchars($m->getMesin()) . "</td>";
            $rows .= "<td style='text-align:center'>" . htmlspecialchars($m->getTopSpeed()) . " km/h</td>"; // Rata tengah
            $rows .= "<td style='text-align:center'>" . htmlspecialchars($m->getTahun()) . "</td>"; // Rata tengah
            $rows .= "<td class='col-actions' style='text-align:center'>
                <a href='index.php?page=mobil&screen=edit&id={$m->getId()}' class='btn btn-edit'>Edit</a>
                <button data-id='{$m->getId()}' class='btn btn-delete'>Hapus</button>
            </td>";
            $rows .= "</tr>";
            $no++;
        }

        // Load template skin_mobil.html
        $template = file_get_contents(__DIR__ . '/../template/skin_mobil.html');
        
        // Masukkan data baris ke tabel
        $template = str_replace('DATA_TABEL', $rows, $template);

        // Hitung Total Data & Ubah Tulisan
        $total = count($listMobil);
        
        $template = str_replace('Data Terupdate', 'Total: ' . $total, $template);

        return $template;
    }

    public function tampilForm($data = null) {
        $template = file_get_contents(__DIR__ . '/../template/form_mobil.html');
        
        // Arahkan action form ke page mobil
        $template = str_replace('action="index.php"', 'action="index.php?page=mobil"', $template);

        if ($data) {
            // Mode Edit
            $template = str_replace('value="add"', 'value="edit"', $template);
            $template = str_replace('name="id" value=""', 'name="id" value="'.$data['id'].'"', $template);
            
            // Isi data lama (Prefill)
            $template = str_replace('name="model"', 'name="model" value="'.$data['model'].'"', $template);
            $template = str_replace('name="mesin"', 'name="mesin" value="'.$data['mesin'].'"', $template);
            $template = str_replace('name="top_speed"', 'name="top_speed" value="'.$data['top_speed'].'"', $template);
            $template = str_replace('name="tahun"', 'name="tahun" value="'.$data['tahun'].'"', $template);
        }
        return $template;
    }
}
?>