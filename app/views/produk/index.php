<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { text-decoration: none; padding: 5px 10px; color: white; border-radius: 3px; }
        .btn-edit { background-color: #4CAF50; }
        .btn-delete { background-color: #f44336; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h2>Daftar Produk</h2>
    <a href="index.php?page=produk&action=create" class="btn btn-edit">+ Tambah Produk</a>

    <table>
        <tr>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($produk as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['kode_produk']) ?></td>
            <td><?= htmlspecialchars($p['nama_produk']) ?></td>
            <td><?= htmlspecialchars($p['kategori']) ?></td>
            <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
            <td><?= $p['stok'] ?></td>
            <td>
                <a href="index.php?page=produk&action=edit&id=<?= $p['id_produk'] ?>" class="btn btn-edit">Edit</a>
                <form method="post" action="index.php?page=produk&action=delete" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                    <input type="hidden" name="id" value="<?= $p['id_produk'] ?>">
                    <button type="submit" class="btn btn-delete">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>