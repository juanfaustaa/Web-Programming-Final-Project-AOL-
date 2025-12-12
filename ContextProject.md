# Webprog AOL

## 1. Role & Fitur Utama

### Role

1. **Guest (belum login)**
    - Lihat homepage
    - Lihat daftar lapangan yang tersedia
    - Search & filter lapangan (jenis lapangan, jam, harga)
    - Akses **scoreboard** tanpa login
    - Akses **shuffle player** tanpa login
2. **User (setelah login)**
    - Semua fitur Guest
    - Booking lapangan (pilih lapangan, tanggal, jam, durasi)
    - Lakukan pembayaran (dummy / status pembayaran)
    - Lihat waktu main (countdown saat jam main)
    - Beri **rating** lapangan setelah main
    - Lihat riwayat booking
3. **Admin**
    - Login ke dashboard admin
    - CRUD data lapangan (nama, tipe, jumlah court, jam operasional, harga)
    - Lihat & approve / reject booking (booking approval)
    - Monitor lapangan (court mana yang sedang dipakai & sisa waktu main)
    - Lihat riwayat transaksi

---

## 2. Struktur Halaman (View)

### Untuk User

- `/` – **Homepage**
    - Search bar
    - Filter (jenis lapangan, harga, jam)
    - Card list lapangan: foto, nama, lokasi, harga, tombol “Detail”
- `/courts` – **Daftar Lapangan**
- `/courts/{id}` – **Detail Lapangan**
    - Info lengkap lapangan
    - Jadwal ketersediaan
    - Rating rata-rata
    - Tombol “Booking Sekarang” (jika belum login diarahkan ke login)
- `/scoreboard` – **Score Board**
    - Input nama pemain
    - Tombol tambah skor, reset, dll.
- `/shuffle` – **Shuffle Player**
    - Input list nama pemain
    - Tombol “Shuffle” -> tampilkan random tim
- `/booking/create` – **Form Booking (user)**
    - Pilih lapangan, tanggal, jam, durasi
    - Konfirmasi harga
- `/payment/{booking}` – **Halaman Pembayaran**
    - Simulasi pembayaran (pilih metode, konfirmasi)
    - Ubah status booking => “Paid”
- `/my-bookings` – **Riwayat Booking User**
    - Ada info sisa waktu main jika sedang berjalan
    - Tombol “Beri Rating” setelah selesai
- `/rating/{booking}` – **Form Rating**
    - Bintang 1–5 + komentar

### Untuk Admin

- `/admin/login` – Login admin
- `/admin` – **Dashboard**
    - Ringkasan jumlah booking hari ini, lapangan aktif, dll.
- `/admin/courts` – **Kelola Lapangan (CRUD)**
- `/admin/bookings` – **Booking Approval**
    - List booking dengan status: pending, approved, rejected, completed
    - Tombol Approve / Reject
- `/admin/monitoring` – **Court Monitoring**
    - Tabel lapangan yang sedang dipakai
    - Sisa waktu main (remaining time)
- `/admin/transactions` – **Transaction History**

---

## 3. Desain Database (Model & Tabel)

Minimal:

1. **users**
    - id, name, email, password
    - role (`user` / `admin`)
2. **courts**
    - id, name, type (badminton, tenis, dll)
    - description, price_per_hour
    - is_active
3. **bookings**
    - id, user_id, court_id
    - booking_date, start_time, end_time
    - total_price
    - status (`pending`, `approved`, `rejected`, `paid`, `completed`)
4. **payments**
    - id, booking_id
    - amount, method, status, paid_at
5. **ratings**
    - id, booking_id, user_id, court_id
    - rating (1–5), comment
6. (Opsional) **score_sessions** kalau kamu mau simpan histori scoreboard
7. (Opsional) **court_schedules** kalau mau granular per slot jam

---

## 4. Arsitektur Laravel (Folder / File Penting)

### Model

- `User.php`
- `Court.php`
- `Booking.php`
- `Payment.php`
- `Rating.php`

### Controller (contoh)

- `HomeController` – homepage & halaman umum
- `CourtController` – list & detail lapangan
- `BookingController` – booking & riwayat user
- `PaymentController` – simulasi pembayaran
- `RatingController` – input & tampil rating
- `ScoreboardController` – halaman scoreboard + shuffle
- `Admin\DashboardController`
- `Admin\CourtController`
- `Admin\BookingController`
- `Admin\TransactionController`

### Routes

Di `routes/web.php`:

- Route public (`/`, `/courts`, `/scoreboard`, `/shuffle`)
- Route user dengan middleware `auth`
- Route admin dengan middleware `auth` + `can:isAdmin` atau `role:admin`
    
    (pakai Route::prefix('admin')->middleware('is_admin')->group(...))
    

### Middleware

- `IsAdmin` – cek user role admin
- (Opsional) middleware untuk cek apakah booking sudah dibayar sebelum bisa akses countdown

### View (Blade)

- Layout utama: `layouts/app.blade.php`
- Folder:
    - `resources/views/home.blade.php`
    - `resources/views/courts/index.blade.php`
    - `resources/views/courts/show.blade.php`
    - `resources/views/bookings/...`
    - `resources/views/admin/...`
    - `resources/views/scoreboard.blade.php`
    - `resources/views/shuffle.blade.php`

---

## 5. Fitur Teknis Spesifik

1. **Countdown waktu bermain**
    - Di backend, simpan `start_time` & `end_time` di tabel `bookings`
    - Di frontend, pakai JavaScript hitung `end_time - now`
    - Jika waktu habis, ubah status booking ke `completed` (via job / cron / manual)
2. **Scoreboard**
    - Bisa full di frontend (JS) dulu
    - Kalau mau simpan skor, buat endpoint POST untuk simpan ke `score_sessions`
3. **Shuffle Player**
    - Ambil list nama dari form, acak di JS, tampilkan tim
    - Tidak wajib disimpan ke DB (bisa purely utility)

---

## 6. Urutan Pengerjaan (Step-by-Step)

1. Setup project Laravel + auth (Laravel Breeze/Jetstream).
2. Buat migration & model: `users`, `courts`, `bookings`, `payments`, `ratings`.
3. Seed data dummy lapangan.
4. Buat halaman public: home, list court, detail court.
5. Implement flow booking user (login → pilih lapangan → booking → payment).
6. Tambahkan countdown + status booking.
7. Implement rating.
8. Buat scoreboard & shuffle (frontend dulu).
9. Buat dashboard admin: CRUD court, booking approval, monitoring, transaksi.
10. Rapikan UI/UX + testing basic scenario sesuai flowchart.
    
    # Design DB
    
    ## 1. Rancangan Skema Database
    
    Aku pakai gaya MySQL / Laravel default (InnoDB, bigIncrements, timestamps).
    
    ### 1) `users`
    
    Untuk user biasa + admin.
    
    | Kolom | Tipe | Keterangan |
    | --- | --- | --- |
    | id | BIGINT (PK) | auto increment |
    | name | VARCHAR(100) | nama user |
    | email | VARCHAR(150) | unique |
    | password | VARCHAR(255) | password hash |
    | role | ENUM('user','admin') | default 'user' |
    | created_at | TIMESTAMP |  |
    | updated_at | TIMESTAMP |  |
    
    Relasi:
    
    - `users` 1 — N `bookings`
    - `users` 1 — N `ratings`
    
    ---
    
    ### 2) `courts`
    
    Daftar lapangan yang bisa di-booking.
    
    | Kolom | Tipe | Keterangan |
    | --- | --- | --- |
    | id | BIGINT (PK) | auto increment |
    | name | VARCHAR(100) | nama lapangan (Court A, Court B, dll) |
    | type | ENUM('badminton','tenis','squash','lainnya') | jenis |
    | location | VARCHAR(255) | alamat / deskripsi lokasi |
    | description | TEXT (nullable) | deskripsi tambahan |
    | price_per_hour | DECIMAL(10,2) | harga per jam |
    | is_active | TINYINT(1) | 1 = aktif, 0 = nonaktif |
    | created_at | TIMESTAMP |  |
    | updated_at | TIMESTAMP |  |
    
    Relasi:
    
    - `courts` 1 — N `bookings`
    - `courts` 1 — N `ratings`
    
    (Opsional) kalau satu “venue” punya banyak court:
    
    - Tambah tabel `venues` dan di `courts` ada `venue_id`. Untuk tugas kuliah, boleh skip dulu.
    
    ---
    
    ### 3) `bookings`
    
    Data booking user untuk lapangan tertentu.
    
    | Kolom | Tipe | Keterangan |
    | --- | --- | --- |
    | id | BIGINT (PK) | auto increment |
    | user_id | BIGINT (FK) | refer ke `users.id` |
    | court_id | BIGINT (FK) | refer ke `courts.id` |
    | booking_date | DATE | tanggal main |
    | start_time | TIME | jam mulai main (misal 19:00) |
    | end_time | TIME | jam selesai main (misal 21:00) |
    | duration_hour | DECIMAL(4,2) | misal 2.0 jam, 1.5 jam |
    | total_price | DECIMAL(10,2) | harga total (duration_hour * price_per_hour) |
    | status | ENUM('pending','approved','rejected','paid','completed','cancelled') |  |
    | notes | TEXT (nullable) | catatan |
    | created_at | TIMESTAMP |  |
    | updated_at | TIMESTAMP |  |
    
    Relasi:
    
    - N — 1 `users`
    - N — 1 `courts`
    - 1 — 1 atau 1 — N `payments`
    - 1 — 0/1 `ratings` (booking yg sudah selesai bisa diberi rating)
    
    ---
    
    ### 4) `payments`
    
    Simulasi pembayaran.
    
    | Kolom | Tipe | Keterangan |
    | --- | --- | --- |
    | id | BIGINT (PK) | auto increment |
    | booking_id | BIGINT (FK) | refer ke `bookings.id` |
    | amount | DECIMAL(10,2) | nominal bayar |
    | method | ENUM('cash','transfer','ewallet','other') | metode |
    | status | ENUM('pending','success','failed') |  |
    | paid_at | DATETIME (nullable) | waktu bayar sukses |
    | created_at | TIMESTAMP |  |
    | updated_at | TIMESTAMP |  |
    
    Relasi:
    
    - N — 1 `bookings` (bisa 1 booking = 1 pembayaran, atau multi payment kalau mau)
    
    ---
    
    ### 5) `ratings`
    
    User kasih rating ke lapangan berdasarkan booking.
    
    | Kolom | Tipe | Keterangan |
    | --- | --- | --- |
    | id | BIGINT (PK) | auto increment |
    | booking_id | BIGINT (FK) | refer ke `bookings.id` |
    | user_id | BIGINT (FK) | refer ke `users.id` |
    | court_id | BIGINT (FK) | refer ke `courts.id` |
    | rating | TINYINT | 1–5 |
    | comment | TEXT (nullable) | komentar |
    | created_at | TIMESTAMP |  |
    | updated_at | TIMESTAMP |  |
    
    Constraint tambahan yang bagus:
    
    - Satu `booking_id` hanya boleh punya satu rating.
    - Pastikan `user_id` dan `court_id` konsisten dengan booking itu (di level aplikasi).