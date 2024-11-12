<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Proyek Laravel 11 Anda

Deskripsi singkat tentang proyek ini dan tujuannya.

## Persyaratan Sistem

- **PHP** >= 8.2
- **Composer** >= 2.0
- **Node.js** >= 16.0
- **Database** (MySQL, PostgreSQL, atau sesuai kebutuhan)

## Instalasi

### 1. Install Dependensi PHP dengan Composer

```bash
# Jalankan perintah berikut untuk menginstal semua dependensi PHP Laravel 11:
composer install
```
### 2. Install Dependensi Frontend dengan npm

```bash
# Jalankan perintah ini untuk menginstal dependensi frontend:
npm install
```

### 3. Salin File .env dan Konfigurasi Environment

```bash
# Salin file .env.example menjadi .env dan sesuaikan pengaturannya:
cp .env.example .env
```

### 4. Jalankan Migrasi dan Seeder


```bash
# Jalankan migrasi database untuk membuat tabel:
php artisan migrate
#Jika ada seeder, Anda dapat menjalankannya juga dengan:
php artisan db:seed
```

### 5. Konfigurasi Storage Link
```bash
# Laravel membutuhkan link ke storage untuk menyimpan file secara publik:
php artisan storage:link
#Jika ada seeder, Anda dapat menjalankannya juga dengan:
php artisan db:seed
```
### 6. Build Asset Frontend
``` bash
# Jalankan perintah berikut untuk mengompilasi aset frontend:
npm run dev
Gunakan npm run build untuk produksi.
```
### 7. Menjalankan Aplikasi
``` bash
# Jalankan server Laravel dengan perintah berikut:
php artisan serve
npm run dev
```






## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
