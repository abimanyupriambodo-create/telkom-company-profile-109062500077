<?php
$pageTitle = 'Berita - Telkom University';

require 'config/database.php';
require 'includes/header.php';

$stmt = $pdo->query("
    SELECT id, judul, ringkasan, isi, tanggal_publish
    FROM berita
    ORDER BY tanggal_publish DESC
");

$berita = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="section">
    <div class="container">

        <div class="section-heading">
            <span class="eyebrow">Informasi</span>
            <h1>Berita</h1>
            <p class="lead">
                Informasi dan berita terbaru Telkom University.
            </p>
        </div>

        <div class="grid-3">
            <?php foreach ($berita as $item): ?>

                <article class="card">

                    <span class="meta">
                        <?= htmlspecialchars($item['tanggal_publish']) ?>
                    </span>

                    <h3>
                        <?= htmlspecialchars($item['judul']) ?>
                    </h3>

                    <p>
                        <?= htmlspecialchars($item['ringkasan']) ?>
                    </p>

                    <a href="news_detail.php?id=<?= $item['id'] ?>" class="btn btn-primary">
                        Baca Selengkapnya
                    </a>

                </article>

            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php require 'includes/footer.php'; ?>