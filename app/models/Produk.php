<?php
class Produk {
    // Constructor menerima objek PDO dari entry point
    public function __construct(private PDO $db) {}

    // 1. READ: Mengambil semua data produk
    public function getAll(): array {
        $stmt = $this->db->query('SELECT * FROM produk ORDER BY nama_produk');
        return $stmt->fetchAll();
    }

    // 2. READ BY ID: Mengambil satu data berdasarkan ID (untuk Edit)
    public function findById(int $id): array|false {
        $stmt = $this->db->prepare('SELECT * FROM produk WHERE id_produk = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    // 3. CREATE: Menambah data produk baru
    public function insert(array $data): bool {
        $sql = 'INSERT INTO produk (kode_produk, nama_produk, kategori, harga, stok) 
                VALUES (:kode, :nama, :kategori, :harga, :stok)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':kode'     => $data['kode_produk'],
            ':nama'     => $data['nama_produk'],
            ':kategori' => $data['kategori'],
            ':harga'    => $data['harga'],
            ':stok'     => $data['stok']
        ]);
    }

    // 4. UPDATE: Mengubah data produk
    public function update(int $id, array $data): bool {
        $sql = 'UPDATE produk SET kode_produk=:kode, nama_produk=:nama, 
                kategori=:kategori, harga=:harga, stok=:stok WHERE id_produk=:id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'       => $id,
            ':kode'     => $data['kode_produk'],
            ':nama'     => $data['nama_produk'],
            ':kategori' => $data['kategori'],
            ':harga'    => $data['harga'],
            ':stok'     => $data['stok']
        ]);
    }

    // 5. DELETE: Menghapus data produk
    public function delete(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM produk WHERE id_produk = :id');
        return $stmt->execute([':id' => $id]);
    }
}