<?php
class Database {
    // Sesuaikan dengan konfigurasi XAMPP/Laragon kamu
    private string $host = 'localhost';
    private string $db   = 'db_produk';
    private string $user = 'root';
    private string $pass = ''; // Kosongkan jika pakai XAMPP default

    public function connect(): PDO {
        // Data Source Name (DSN)
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        
        // Opsi PDO untuk keamanan dan kemudahan debugging
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Tampilkan error sebagai exception
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Hasil query berupa array asosiatif
            PDO::ATTR_EMULATE_PREPARES   => false,                  // Paksa gunakan prepared statement asli dari MySQL
        ];

        try {
            return new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            // Jika koneksi gagal, hentikan aplikasi dan tampilkan pesan
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
}
