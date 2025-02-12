# Sistem Manajemen Barang SD-WAN dengan QR Code

📦Sistem ini dirancang untuk mempermudah pengelolaan data barang SD-WAN dengan fitur-fitur seperti menghasilkan QR Code, melakukan scan QR Code, serta menampilkan statistik barang. Sistem ini dikembangkan menggunakan Laravel dengan tambahan beberapa library.

## ✨ Fitur Utama

1. **Manajemen Data Barang**:
   - Tambah data barang
   - Edit data barang
   - Hapus data barang
   - Print QR Code

2. **Generasi QR Code**:
   - Data yang diinputkan akan secara otomatis menghasilkan QR Code.

3. **Scanner QR Code**:
   - Fitur untuk membaca QR Code dan menampilkan data terkait.

4. **Statistik Barang**:
   - Menampilkan statistik jumlah barang yang ada di dalam database.

## ⚙️ Persyaratan Sistem

Sebelum menjalankan sistem ini, pastikan bahwa server Anda memenuhi persyaratan berikut:
- **PHP**
- **Composer**
- **Database**
- **PHP Imagick Extension**: Wajib untuk menghasilkan QR Code.
- **Internet**: Karena beberapa pluggin menggunakan cdn

## 🛠️ Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstalasi dan menjalankan proyek:

1. **Clone Repository**

2. **Instalasi Library**:
   Jalankan perintah berikut untuk menginstalasi library yang dibutuhkan:
   ```bash
   composer require simplesoftwareio/simple-qrcode
   composer require mpdf/mpdf
   ```

3. **Migrasi**:
   Jalankan perintah migrasi untuk membuat tabel database yang diperlukan:
   ```bash
   php artisan migrate
   ```

4. **Jalankan Server**:
   Setelah semua langkah di atas selesai, jalankan server lokal:
   ```bash
   php artisan serve
   ```

5. **Cek Ekstensi PHP Imagick**:
   Pastikan ekstensi PHP Imagick telah diinstal

6. **Mengaktifkan Storage**:
   Pastikan storage laravel sudah dipasang, jalankan menggunakna perintah ini:
   ```bash
   php artisan storage:link
   ```

## 📜 Penggunaan

1. **Menambahkan Data Barang**:
   - Navigasikan ke halaman tambah data.
   - Isi data barang.
   - QR Code akan otomatis dihasilkan.

2. **Scan QR Code**:
   - Gunakan scanner QR Code bawaan aplikasi untuk membaca QR Code.
   - Data barang terkait akan ditampilkan.

3. **Lihat Statistik Barang**:
   - Pergi ke halaman data chart untuk melihat informasi jummlah barang barang.

