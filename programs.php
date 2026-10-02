<?php
$pageTitle = 'Program Studi - Telkom University';

require 'config/database.php';
require 'includes/header.php';

$stmt = $pdo->query("
    SELECT id, nama, jenjang, deskripsi
    FROM program_studi
    ORDER BY nama ASC
");

$programs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="section">
    <div class="container">

        <div class="section-heading">
            <span class="eyebrow">Akademik</span>
            <h1>Program Studi</h1>
            <p class="lead">
                Daftar program studi yang tersedia di Telkom University.
            </p>
        </div>

        <div class="grid-3">
            <?php foreach ($programs as $program): ?>

                <article class="card">
                    <span class="meta">
                        <?= htmlspecialchars($program['jenjang']) ?>
                    </span>

                    <h3>
                        <?= htmlspecialchars($program['nama']) ?>
                    </h3>

                    <p>
                        <?= htmlspecialchars($program['deskripsi']) ?>
                    </p>
                </article>

            <?php endforeach; ?>
        </div>

    </div>
</section>

<?php require 'includes/footer.php'; ?>