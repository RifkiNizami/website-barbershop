# Website Barbershop

Berikut adalah panduan instalasi lengkap untuk menjalankan project ini di komputer lokal Anda:

1. Jalankan `composer install` untuk mengunduh seluruh dependensi PHP yang dibutuhkan.
2. Duplikat file `.env.example` menjadi `.env`. 
   - Untuk Windows (CMD): `copy .env.example .env`
   - Untuk Mac/Linux/Git Bash: `cp .env.example .env`
3. Generate kunci keamanan aplikasi dengan perintah `php artisan key:generate`.
4. Buka file `.env` di code editor Anda dan sesuaikan konfigurasi database MySQL berikut (pastikan sudah membuat database kosong bernama `web_barbershop` di phpMyAdmin atau HeidiSQL):
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=barbershop
   DB_USERNAME=root
   DB_PASSWORD=
5. Lalu `php artisan migrate`
6. npm install & npm run build
7. php artisan tinker
8. Insert data ke database dgn
    DB::table('users')->insert([
   'name' => 'Admin User',
    'email' => 'admin@example.com',
    'password' => Hash::make('password123'),
    'phone' => '08123456789',
    'role' => 'admin',
    'created_at' => now(),
 ]);
9. php artisan serve


akun coba:
admin@example.com
password123
