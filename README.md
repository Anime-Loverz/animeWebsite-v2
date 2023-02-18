<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang project ini

Website yang dibangun untuk organisasi anime loverz

## Cara menggunakan

-   Clone project menggunakan git clone
-   ketik `composer install` didalam project nya, untuk menginstall package yang dibutuhkan dari composer
-   ketik `npm install` didalam project nya, untuk menginstall package yang dibutuhkan dari npm
-   jalankan `php artisan key:generate` untuk menggenerate key baru pada aplikasi
-   ubah nama file .env.example menjadi .env dan isi konfigurasi pada databasenya
-   ketik `php artisan migrate --seed` atau `php artisan migrate:fresh --seed` jika didatabase sebelumnya sudah ada table yang sama
-   terakhir, untuk menjalankan aplikasi, ketika command php artisan serve

## Requirement

php 7.4 (tidak kompatibel untuk php 8 ke atas)
php package manager - composer
node package manager - npm
dbms - mysql/postgresql

## Note

Jika menggunakan linux, silahkan ikuti tutorial dari [link ini](https://computingforgeeks.com/how-to-install-php-on-ubuntu/) untuk menginstall php 7.4
Jika menggunakan windows, anda bisa menginstall xampp yang include php 7.4

Informasi user bisa dilihat di `database/seeders/UsersTableSeeder.php`

## Lisensi

Kerangka kerja Laravel adalah perangkat lunak sumber terbuka yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).
