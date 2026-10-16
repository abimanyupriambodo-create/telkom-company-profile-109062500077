<?php
// 1. Memuat file konfigurasi, Model, dan Controller
require '../config/database.php';
require '../app/models/Produk.php';
require '../app/controllers/ProdukController.php';

// 2. Dependency Injection: Membuat instance dan menyuntikkan dependensi
$db = (new Database())->connect();
$model = new Produk($db);
$controller = new ProdukController($model);

// 3. Membaca parameter dari URL
$page = $_GET['page'] ?? 'produk';
$action = $_GET['action'] ?? 'index';

// 4. Validasi halaman (hanya menerima 'produk')
if ($page !== 'produk') {
    http_response_code(404);
    exit('Halaman tidak ditemukan.');
}

// 5. Routing menggunakan match expression (PHP 8+)
match ($action) {
    'index'  => $controller->index(),
    'create' => $controller->create(),
    'store'  => $controller->store(),
    'edit'   => $controller->edit(),
    'update' => $controller->update(),
    'delete' => $controller->delete(),
    default  => (function() {
        http_response_code(404);
        exit('Action tidak ditemukan.');
    })()
};
