# Janji

Saya Zahran Zaidan Saputra dengan NIM 2415429 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain Pemrograman Berorientasi Objek (DPBO) untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# 🔮 Struktur Folder

```text
MVP/
├── models/                      # Folder Model (Database & Object)
│   ├── DB.php                   # File koneksi database
│   ├── KontrakModel.php         # Interface Model Pembalap
│   ├── KontrakModelMobil.php    # Interface Model Mobil 
│   ├── Mobil.php                # Class Object Mobil
│   ├── Pembalap.php             # Class Object Pembalap
│   ├── TabelMobil.php           # Query SQL CRUD Mobil
│   └── TabelPembalap.php        # Query SQL CRUD Pembalap
│
├── presenters/                  # Folder Presenter (Logika Penghubung)
│   ├── KontrakPresenter.php     # Interface Presenter Pembalap
│   ├── KontrakPresenterMobil.php# Interface Presenter Mobil 
│   ├── PresenterMobil.php       # Logika penghubung fitur Mobil
│   └── PresenterPembalap.php    # Logika penghubung fitur Pembalap
│
├── template/                    # Folder Template HTML
│   ├── form.html                # Form input data Pembalap
│   ├── form_mobil.html          # Form input data Mobil 
│   ├── skin.html                # Tabel daftar Pembalap
│   └── skin_mobil.html          # Tabel daftar Mobil 
│
├── views/                       # Folder View (Logika Tampilan)
│   ├── KontrakView.php          # Interface View Pembalap
│   ├── KontrakViewMobil.php     # Interface View Mobil 
│   ├── ViewMobil.php            # Logika tampilan untuk Mobil
│   └── ViewPembalap.php         # Logika tampilan untuk Pembalap
│
├── index.php                    # Controller Utama (Routing halaman)
└── mvp_db.sql                   # File Database (Tabel pembalap & mobil)
```

# 🎨 Desain Program

<img width="624" height="283" alt="image" src="https://github.com/user-attachments/assets/b0742f0b-b4fa-4c2f-a5e1-15a0ef86d033" />

# Jenis Tabel

## 🏎️ Tabel Pembalap (drivers)

| Atribut        | Tipe Data      | Keterangan                     |
|----------------|----------------|--------------------------------|
| `id`           | INT            | Primary Key, Auto Increment    |
| `nama`         | VARCHAR(255)   | Nama Lengkap Pembalap          |
| `tim`          | VARCHAR(255)   | Nama Tim / Konstruktor         |
| `negara`       | VARCHAR(255)   | Asal Negara Pembalap           |
| `poinMusim`    | INT            | Jumlah Poin Musim Berjalan     |
| `jumlahMenang` | INT            | Total Kemenangan Race          |

## 🚗 Tabel Mobil (cars)

| Atribut     | Tipe Data     | Keterangan                            |
|-------------|---------------|----------------------------------------|
| `id`        | INT           | Primary Key, Auto Increment            |
| `model`     | VARCHAR(100)  | Nama Model Sasis Mobil (contoh: RB20)  |
| `mesin`     | VARCHAR(100)  | Nama Power Unit / Mesin (contoh: Honda)|
| `top_speed` | INT           | Kecepatan Maksimum (km/h)              |
| `tahun`     | INT           | Tahun Musim Balapan                    |

# 🛣️ Alur Program




# 🎥 Dokumentasi
https://github.com/user-attachments/assets/a504a0c6-5a59-4569-82ac-f69c157a579b


