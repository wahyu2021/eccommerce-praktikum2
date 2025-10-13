# Proyek E-Commerce - Praktikum 2

Proyek ini adalah aplikasi E-Commerce sederhana yang dibuat menggunakan Laravel sebagai bagian dari Praktikum 2. Aplikasi ini memiliki fitur dasar CRUD (Create, Read, Update, Delete) untuk manajemen produk.

## Prasyarat

Sebelum memulai, pastikan Anda telah menginstal perangkat lunak berikut di komputer Anda:

* PHP 8.2 atau lebih tinggi
* Composer
* Node.js & NPM
* **Git**
* Database (misalnya: MySQL, PostgreSQL, atau SQLite)

---

## Instalasi

Anda dapat mengatur proyek ini dengan dua cara: menggunakan **Git (direkomendasikan)** atau dengan mengunduh file **ZIP**.

### Opsi 1: Menggunakan Git (Direkomendasikan)

1. **Clone repositori ini ke komputer Anda:**

   ```bash
   git clone https://github.com/wahyu2021/eccommerce-praktikum2.git
   ```

2. **Masuk ke direktori proyek:**

   ```bash
   cd ecommerce-praktikum2
   ```

3. Lanjutkan ke bagian **Langkah-Langkah Pengaturan** di bawah ini.

---

### Opsi 2: Mengunduh File ZIP

Jika mengunduh proyek sebagai file ZIP, folder `.git` (yang berisi riwayat versi) tidak akan disertakan.
Agar bisa berkontribusi (melakukan `push` ke GitHub), Anda perlu menginisialisasi Git secara manual.

1. **Unduh dan Ekstrak File ZIP:**

   * Buka halaman utama repositori ini di GitHub.
   * Klik tombol hijau **“<> Code”**, lalu pilih **“Download ZIP”**.
   * Setelah unduhan selesai, ekstrak file ZIP ke lokasi yang Anda inginkan.

2. **Buka Terminal dan Inisialisasi Git:**

   ```bash
   cd path/ke/folder/hasil/ekstrak
   git init -b main
   ```

3. **Hubungkan ke Repositori Asli (Remote):**
   Ganti `https://github.com/wahyu2021/eccommerce-praktikum2.git` dengan URL yang benar dari proyek ini.

   ```bash
   git remote add origin https://github.com/wahyu2021/eccommerce-praktikum2.git
   ```

4. **Lakukan Commit Awal:**

   ```bash
   git add .
   git commit -m "Initial commit from ZIP download"
   ```

Sekarang, folder Anda sudah menjadi repositori Git lokal yang terhubung dengan repositori utama.

---

## Langkah-Langkah Pengaturan

Setelah Anda mendapatkan file proyek (baik melalui `git clone` maupun unduhan ZIP), ikuti langkah-langkah berikut:

1. **Instal dependensi PHP menggunakan Composer:**

   ```bash
   composer install
   ```

2. **Instal dependensi JavaScript menggunakan NPM:**

   ```bash
   npm install
   ```

3. **Salin file `.env.example` menjadi `.env`:**

   ```bash
   cp .env.example .env
   ```

4. **Buat kunci aplikasi baru:**

   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi koneksi database di file `.env`:**

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Jalankan migrasi database:**

   ```bash
   php artisan migrate
   ```

7. **Build aset frontend:**

   ```bash
   npm run build
   ```

---

## Menjalankan Aplikasi

Jalankan server pengembangan lokal:

```bash
php artisan serve
```

Akses di: [http://127.0.0.1:8000](http://127.0.0.1:8000)

Atau jalankan semua layanan sekaligus:

```bash
composer run dev
```

---

## Cara Berkontribusi

Kami sangat senang menerima kontribusi dari siapa pun.
Ikuti langkah berikut tergantung cara Anda mendapatkan proyek ini.

### 🔹 Jika Anda Menggunakan Git Clone

1. **Selalu `pull` terlebih dahulu:**

   ```bash
   git pull origin main
   ```
2. **Buat branch baru untuk perubahan Anda:**

   ```bash
   git checkout -b nama-fitur-atau-perbaikan
   ```
3. **Lakukan perubahan dan commit:**

   ```bash
   git commit -m "feat: menambahkan fitur X"
   ```
4. **Push ke repository:**

   ```bash
   git push origin nama-fitur-atau-perbaikan
   ```
5. **Buat Pull Request di GitHub.**

---

### 🔹 Jika Anda Mengunduh Lewat ZIP

Jika mengunduh proyek ini dalam bentuk ZIP, **pastikan langkah-langkah berikut dilakukan sebelum berkontribusi:**

1. Inisialisasi Git di folder hasil ekstrak:

   ```bash
   git init -b main
   ```
2. Hubungkan ke repositori utama:

   ```bash
   git remote add origin https://github.com/wahyu2021/eccommerce-praktikum2.git
   ```
3. Tambahkan dan commit perubahan awal:

   ```bash
   git add .
   git commit -m "Initial commit from ZIP download"
   ```
4. Buat branch untuk kontribusi:

   ```bash
   git checkout -b nama-fitur-atau-perbaikan
   ```
5. Setelah melakukan perubahan:

   ```bash
   git add .
   git commit -m "feat: perbaikan fitur X"
   git push origin nama-fitur-atau-perbaikan
   ```
6. Buat **Pull Request** ke branch `main` dari repositori utama.

---

Terima kasih telah berkontribusi dan mendukung proyek ini! 🎉
