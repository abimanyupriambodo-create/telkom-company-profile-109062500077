CREATE DATABASE IF NOT EXISTS db_produk CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_produk;

CREATE TABLE IF NOT EXISTS produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    kode_produk VARCHAR(30) NOT NULL UNIQUE,
    nama_produk VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    harga DECIMAL(12,2) NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Data awal (Seed Data) bertema Velauris
INSERT INTO produk (kode_produk, nama_produk, kategori, harga, stok) VALUES
('VL-001', 'Velauris Ocean Breeze', 'Parfum Pria', 250000.00, 25),
('VL-002', 'Velauris Rose Petal', 'Parfum Wanita', 275000.00, 15),
('VL-003', 'Velauris Midnight Oud', 'Parfum Unisex', 350000.00, 10);