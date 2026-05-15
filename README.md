# Pertemuan 5: Model, View, Controller

## Identitas Mahasiswa

**Nama:** Auliya Az Zahrah Salsabilah
**NRP:** 162023026

---

## Deskripsi Praktikum

Pada pertemuan ini dilakukan implementasi konsep **Model, View, dan Controller (MVC)** pada project Sistem Manajemen Sepatu menggunakan Laravel.

Project dikembangkan dengan fitur autentikasi sederhana menggunakan session, pengelolaan produk, relasi kategori, serta tampilan antarmuka menggunakan Bootstrap.

---

## Fitur yang Dibuat

### 1. Halaman Login

Membuat halaman login untuk autentikasi pengguna sebelum masuk ke sistem.

Pada bagian navbar halaman utama:

* Jika user belum login, maka akan tampil tombol **Login**
* Ketika tombol login ditekan, user akan diarahkan ke halaman login

---

### 2. Proses Autentikasi

Proses login menggunakan username dan password yang telah ditentukan sebelumnya.

Jika username dan password sesuai:

* Session akan dibuat
* User diarahkan kembali ke halaman utama

---

### 3. Session Login

Setelah berhasil login:

* Tombol **Login** berubah menjadi tombol **Logout**
* Navbar menampilkan informasi user yang sedang login

Contoh tampilan:

```php
Halo, [username]
```

---

### 4. Logout

Ketika tombol logout ditekan:

* Session akan dihapus
* User diarahkan kembali ke halaman utama

---

### 5. CRUD Produk

Menambahkan fitur pengelolaan produk sepatu:

* Menampilkan daftar produk
* Menambahkan produk baru
* Menampilkan kategori produk
* Menampilkan harga dan stok produk

---

### 6. Relasi Database

Menerapkan relasi antara:

* Tabel `products`
* Tabel `categories`

Relasi yang digunakan:

* Satu kategori dapat memiliki banyak produk

---

### 7. Upload Gambar Produk

Menambahkan fitur upload gambar produk:

* Admin dapat menambahkan gambar saat menambah produk
* Gambar disimpan pada folder `public/assets`
* Nama file gambar disimpan pada database

---

## Struktur MVC

### Model

Digunakan untuk mengelola data dan relasi database:

* Product
* Category

### View

Digunakan untuk menampilkan antarmuka:

* Halaman utama produk
* Modal tambah produk
* Halaman login

### Controller

Digunakan untuk mengatur alur aplikasi:

* AuthController
* ProductController

