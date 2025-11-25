<?php

include_once ("KontrakView.php");
include_once ("models/Pembalap.php");

class ViewPembalap implements KontrakView {

    public function __construct() {
        // Konstruktor kosong
    }

    // Method untuk menampilkan daftar pembalap
    public function tampilPembalap($listPembalap): string {
        $tbody = '';
        $no = 1;
        
        // 1. Susun baris tabel (HTML rows) dari data database
        foreach ($listPembalap as $pembalap) {
            $tbody .= '<tr>';
            $tbody .= '<td class="col-id">' . $no . '</td>';
            $tbody .= '<td>' . htmlspecialchars($pembalap->getNama()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($pembalap->getTim()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($pembalap->getNegara()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($pembalap->getPoinMusim()) . '</td>';
            $tbody .= '<td>' . htmlspecialchars($pembalap->getJumlahMenang()) . '</td>';
            $tbody .= '<td class="col-actions">
                        <a href="index.php?page=pembalap&screen=edit&id=' . $pembalap->getId() . '" class="btn btn-edit">Edit</a>
                        <button data-id="' . $pembalap->getId() . '" class="btn btn-delete">Hapus</button>
                      </td>';
            $tbody .= '</tr>';
            $no++;
        }

        // 2. Ambil template skin.html
        $templatePath = __DIR__ . '/../template/skin.html';
        
        if (file_exists($templatePath)) {
            // Load isi file HTML ke variabel
            $template = file_get_contents($templatePath);
            
            
            $template = str_replace('DATA_TABEL', $tbody, $template);
            
            // Update Total count jika ada
            $total = count($listPembalap);
            $template = str_replace('Total:', 'Total: ' . $total, $template);
            
            return $template;
        } else {
            return "Error: Template skin.html tidak ditemukan!";
        }
    }

    // Method untuk menampilkan form tambah/ubah pembalap
    public function tampilFormPembalap($data = null): string {
        $templatePath = __DIR__ . '/../template/form.html';
        
        if (!file_exists($templatePath)) {
             return "Error: Template form.html tidak ditemukan!";
        }
        
        $template = file_get_contents($templatePath);

        // Pastikan action form mengarah ke page pembalap
        $template = str_replace('action="index.php"', 'action="index.php?page=pembalap"', $template);

        if ($data) {
            // JIKA EDIT (Data tidak null)
            $template = str_replace('value="add"', 'value="edit"', $template);
            $template = str_replace('name="id" value=""', 'name="id" value="' . htmlspecialchars($data['id']) . '"', $template);
            
            // Prefill Data (Isi kolom dengan data lama)
            // Teknik replace value untuk input
            $template = str_replace('name="nama"', 'name="nama" value="' . htmlspecialchars($data['nama']) . '"', $template);
            $template = str_replace('name="tim"', 'name="tim" value="' . htmlspecialchars($data['tim']) . '"', $template);
            $template = str_replace('name="negara"', 'name="negara" value="' . htmlspecialchars($data['negara']) . '"', $template);
            $template = str_replace('name="poinMusim"', 'name="poinMusim" value="' . htmlspecialchars($data['poinMusim']) . '"', $template);
            $template = str_replace('name="jumlahMenang"', 'name="jumlahMenang" value="' . htmlspecialchars($data['jumlahMenang']) . '"', $template);
        }

        return $template;
    }
}
?>