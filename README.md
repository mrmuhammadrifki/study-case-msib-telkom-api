# Virtual Assistant Chat API

## Deskripsi Proyek

Proyek ini bertujuan untuk mengembangkan backend yang mendukung aplikasi asisten virtual. Backend ini menyediakan API untuk menyimpan dan mengambil data percakapan, serta memastikan respons API sesuai dengan format yang diharapkan melalui unit testing yang ketat.

## Tools & Referensi Kode

-   **[Visual Studio Code](https://code.visualstudio.com/)**: Editor kode untuk pengembangan proyek.
-   **[Postman](https://www.postman.com/)**: Alat pengujian API.
-   **[XAMPP](https://www.apachefriends.org/index.html)**: Platform pengembangan yang menyediakan Apache, MySQL, dan PHP (versi 8.1 atau lebih baru).
-   **[Laravel 10](https://laravel.com/docs/10.x)**: Framework PHP yang digunakan untuk membangun API.
-   **[Composer](https://getcomposer.org/)**: Manajer dependensi PHP untuk mengelola paket Laravel.

## Persyaratan

-   **[Composer](https://getcomposer.org/)**: Manajer dependensi PHP untuk mengelola paket Laravel.
-   **[XAMPP](https://www.apachefriends.org/index.html)**: PHP versi 8.1 atau lebih baru diperlukan.

## Cara Menjalankan

1. **Clone** repositori ini ke dalam lokal mesin Anda:
    ```bash
    git clone https://github.com/mrmuhammadrifki/study-case-msib-telkom-indonesia-api.git
    ```
2. **Install** semua dependensi PHP menggunakan Composer:
    ```bash
    composer install
    ```
3. **Buat Database**:
    - Jalankan Apache dan MySQL melalui XAMPP.
    - Buka [phpMyAdmin](http://localhost/phpmyadmin) di browser Anda.
    - Buat database baru dengan nama `db_study_case_msib_telkom_indonesia`.
4. **Jalankan Migrasi** untuk membuat tabel yang dibutuhkan di database:
    ```bash
    php artisan migrate
    ```
5. **Jalankan Server Laravel** untuk memulai aplikasi:
    ```bash
    php artisan serve
    ```

## Fitur yang Diimplementasikan

-   **API untuk Percakapan**: Implementasi API yang menyimpan dan mengambil data percakapan, memastikan persistensi data.
-   **Unit Testing**: Unit testing dilakukan untuk memastikan bahwa respons API sesuai dengan format yang diharapkan.

---

Dokumentasi ini dirancang untuk memberikan petunjuk yang jelas dan detail tentang bagaimana menjalankan dan menguji proyek "Virtual Assistant Chat API" dengan konfigurasi yang optimal dan sesuai standar.
