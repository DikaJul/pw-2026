Tugas Pemrograman Web 2026 

Project ini merupakan implementasi tugas Pemrograman Web (Pertemuan 2) dan latihan pada PDF

Aplikasi ini merupakan Web Application berbasis Laravel yang berfungsi sebagai Content Management System (CMS)  dengan fitur CRUD, relasi data, dan autentikasi user menggunakan arsitektur MVC.

Aplikasi ini memiliki fitur:
- CRUD Post (Create, Read, Update, Delete)
- Upload gambar pada post
- Relasi Post dengan User dan Category
- Pencarian post
- Pagination
- Seeder data (User, Category, Post)
- Halaman daftar kategori
- Halaman detail post berdasarkan kategori

Teknologi yang digunakan :

- Laravel 12
- PHP 8.4
- SQLite Database
- Tailwind CSS (default Breeze)


Instalasi & Menjalankan Project
1. Clone Repository
git clone https://github.com/DikaJul/pw-2026.git
cd pw-2026/pertemuan_2/latihan

2. Install Dependency
composer install

3. Setup Environment
cp .env.example .env
php artisan key:generate

4. Setup Database

Project menggunakan SQLite.

php artisan migrate:fresh --seed

Seeder akan membuat:

5 Users

2 Categories

10 Posts

5. Menjalankan Server (Default Laravel)
php artisan serve
6. Akses Aplikasi

Buka di browser:

http://127.0.0.1:8000

Login:

http://127.0.0.1:8000/login
🔑 Akun Login

Gunakan user dari database (hasil seeder):

Email: contoh@contoh.com

Password: password

📂 Fitur Halaman
URL	Keterangan
/posts	daftar post
/posts/create	tambah post
/categories	daftar kategori
/login	login
/register	register
🖼 Upload Gambar

Gambar disimpan di:

storage/app/public/posts

Jika gambar tidak muncul jalankan:

php artisan storage:link

📌 Kesesuaian Tugas 

Fitur yang dibuat sesuai dengan soal:

✔ 10 data Post
✔ 5 User
✔ 2 Category
✔ Relasi Post-User
✔ Relasi Post-Category
✔ Halaman Categories
✔ Detail post per category