<?php
class ProdukController {
    // Constructor menerima objek Model Produk
    public function __construct(private Produk $model) {}

    // 1. READ: Menampilkan daftar produk
    public function index(): void {
        $produk = $this->model->getAll();
        require __DIR__ . '/../views/produk/index.php';
    }

    // 2. CREATE: Menampilkan form tambah produk
    public function create(): void {
        require __DIR__ . '/../views/produk/create.php';
    }

    // 3. STORE: Memproses data dari form tambah
    public function store(): void {
        $data = $this->validateInput($_POST);
        $this->model->insert($data);
        header('Location: index.php?page=produk');
        exit;
    }

    // 4. EDIT: Menampilkan form edit dengan data lama
    public function edit(): void {
        $id = (int)($_GET['id'] ?? 0);
        $produk = $this->model->findById($id);
        
        if (!$produk) {
            http_response_code(404);
            exit('Data produk tidak ditemukan.');
        }
        require __DIR__ . '/../views/produk/edit.php';
    }

    // 5. UPDATE: Memproses perubahan data dari form edit
    public function update(): void {
        $id = (int)($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST);
        $this->model->update($id, $data);
        header('Location: index.php?page=produk');
        exit;
    }

    // 6. DELETE: Menghapus data produk
    public function delete(): void {
        $id = (int)($_POST['id'] ?? 0);
        $this->model->delete($id);
        header('Location: index.php?page=produk');
        exit;
    }

    // Fungsi Validasi Input (Syarat Wajib Laporan!)
    private function validateInput(array $input): array {
        $data = [
            'kode_produk' => trim($input['kode_produk'] ?? ''),
            'nama_produk' => trim($input['nama_produk'] ?? ''),
            'kategori'    => trim($input['kategori'] ?? ''),
            'harga'       => (float)($input['harga'] ?? 0),
            'stok'        => (int)($input['stok'] ?? 0)
        ];

        // Cek apakah field wajib kosong
        if ($data['kode_produk'] === '' || $data['nama_produk'] === '' || $data['kategori'] === '') {
            exit('Kode, nama, dan kategori produk wajib diisi.');
        }
        
        return $data;
    }
}