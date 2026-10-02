<?php
$pageTitle = 'Beranda - Telkom University';
require 'includes/header.php';
?>

<section class="hero">
    <div class="container hero-grid">

        <div>
            <span class="eyebrow">Company Profile</span>

            <h1>Telkom University</h1>

            <p class="lead">
                Website simulasi company profile untuk praktikum
                Pengembangan Aplikasi Web.
             </p>

             <div class="hero-actions">
              <a href="profile.php" class="btn btn-primary">
              Lihat Profil
              </a>

               <a href="programs.php" class="btn btn-secondary">
                Program Studi
              </a>

              <a href="news.php" class="btn btn-secondary">
              Berita
               </a>
              </div>
            </div>

         <div class="hero-card">
            <span class="hero-card-label">Praktikum</span>
            <h2>Web Development</h2>
            <p>
                Mengintegrasikan HTML, CSS, PHP Native, MySQL,
                dan Git dalam satu proyek.
            </p>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">

        <div class="section-heading">
            <span class="eyebrow">Teknologi</span>
            <h2>Teknologi yang digunakan</h2>
        </div>

        <div class="card-grid">

            <article class="card">
                <h3>HTML</h3>
                <p>
                    Digunakan untuk membangun struktur halaman website.
                </p>
            </article>

            <article class="card">
                <h3>CSS</h3>
                <p>
                    Digunakan untuk mengatur tampilan dan layout website.
                </p>
            </article>

            <article class="card">
                <h3>PHP Native</h3>
                <p>
                    Digunakan untuk membuat halaman web dinamis.
                </p>
            </article>

            <article class="card">
                <h3>MySQL</h3>
                <p>
                    Digunakan untuk menyimpan dan mengelola data website.
                </p>
            </article>

        </div>

    </div>
</section>

<?php require 'includes/footer.php'; ?>