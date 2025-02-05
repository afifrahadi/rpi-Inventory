# Sistem Manajemen Barang dengan QR Code

Sistem ini dirancang untuk mempermudah pengelolaan data barang dengan fitur-fitur seperti menghasilkan QR Code, melakukan scan QR Code, serta menampilkan statistik barang. Sistem ini dikembangkan menggunakan Laravel dengan tambahan beberapa library.

## Fitur Utama

1. **Manajemen Data Barang**:
   - Tambah data barang
   - Edit data barang
   - Hapus data barang

2. **Generasi QR Code**:
   - Data yang diinputkan akan secara otomatis menghasilkan QR Code.

3. **Scanner QR Code**:
   - Fitur untuk membaca QR Code dan menampilkan data terkait.

4. **Statistik Barang**:
   - Menampilkan statistik barang untuk analisis data.

## Persyaratan Sistem

Sebelum menjalankan sistem ini, pastikan bahwa server Anda memenuhi persyaratan berikut:
- **PHP 7.4 atau lebih baru**
- **Composer**
- **PHP Imagick Extension**: Wajib untuk menghasilkan QR Code.

## Instalasi

Ikuti langkah-langkah di bawah ini untuk menginstalasi dan menjalankan proyek:

1. **Clone Repository**:
   ```bash
   git clone <url-repository-anda>
   cd <nama-folder-proyek>
   ```

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

6. **Jalankan Server**:
   Setelah semua langkah di atas selesai, jalankan server lokal:
   ```bash
   php artisan serve
   ```

7. **Cek Ekstensi PHP Imagick**:
   Pastikan ekstensi PHP Imagick telah diinstal dengan menjalankan perintah berikut:
   ```bash
   php -m | grep imagick
   ```

## Penggunaan

1. **Menambahkan Data Barang**:
   - Navigasikan ke halaman tambah barang.
   - Isi data barang dan simpan.
   - QR Code akan otomatis dihasilkan.

2. **Scan QR Code**:
   - Gunakan scanner QR Code bawaan aplikasi untuk membaca QR Code.
   - Data barang terkait akan ditampilkan.

3. **Lihat Statistik Barang**:
   - Pergi ke halaman statistik untuk melihat informasi analitik barang.

