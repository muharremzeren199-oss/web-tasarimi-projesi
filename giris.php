<?php

$ogrenci_no = "b251210373";
$dogru_email = $ogrenci_no . "@sakarya.edu.tr";
$dogru_sifre = $ogrenci_no;

$hata_mesaji = "";
$giris_basarili = false;

// Form submit edildiyse (POST metoduyla geldiyse) çalışacak kısım
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $sifre = isset($_POST['sifre']) ? trim($_POST['sifre']) : '';

    // Gelen verileri bizim belirlediğimiz doğru bilgilerle karşılaştırıyoruz
    if ($email === $dogru_email && $sifre === $dogru_sifre) {
        $giris_basarili = true; // Şifre doğruysa başarı sayfasını tetikle
    } else {
        $hata_mesaji = "Hatalı e-posta veya şifre girdiniz. Lütfen tekrar deneyin.";
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap - Zeren Web</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid px-4">

            <!-- 1. MOBİLDE SOLDA: Hamburger Butonu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 2. MOBİLDE SAĞDA, MASAÜSTÜNDE SOLDA: Logo -->
            <a class="navbar-brand ms-auto ms-lg-0" href="index.html">Zeren Web</a>

            <!-- 3. MASAÜSTÜNDE SAĞDA: Menü Linkleri  -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-start mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Hakkında</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ozgecmis.html">Özgeçmiş</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sehrim.html">Şehrim & Mirasımız</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ilgi-alanlarim.html">İlgi Alanlarım</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="iletisim.html">İletişim</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-warning" href="giris.php">Giriş</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>



    <div class="container mt-5">

        <?php if ($giris_basarili): ?>

            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center">
                    <div class="alert alert-success shadow-lg py-5 border-0">
                        <h1 class="display-4 fw-bold text-success">Hoşgeldiniz <?php echo $ogrenci_no; ?></h1>
                        <p class="lead mt-3">Kimlik doğrulama başarılı. Yönetim paneline eriştiniz.</p>
                        <a href="index.html" class="btn btn-success mt-4 px-4 fw-bold">Ana Sayfaya Dön</a>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- GİRİŞ FORMU -->
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow-lg border-0 rounded-3">
                        <div class="card-header bg-warning text-dark text-center py-3">
                            <h4 class="mb-0 fw-bold">Öğrenci Girişi</h4>
                        </div>
                        <div class="card-body p-4">

                            <!-- Hatalı girişte ekranda beliren uyarı mesajı -->
                            <?php if (!empty($hata_mesaji)): ?>
                                <div class="alert alert-danger fw-bold text-center">
                                    <?php echo $hata_mesaji; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Form POST metoduyla kendi kendine veri yollar -->
                            <form id="GirisForm" action="giris.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary">E-Posta Adresi</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Örn: b2412100001@sakarya.edu.tr">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-secondary">Şifre</label>
                                    <input type="password" id="sifre" name="sifre" class="form-control" placeholder="Öğrenci Numaranız">
                                </div>
                                <button type="submit" class="btn btn-warning w-100 fw-bold fs-5">Sisteme Giriş Yap</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <!-- JAVASCRIPT DENETİMLERİ -->
    <script>
        document.getElementById('GirisForm').addEventListener('submit', function(event) {
            // Kutucuklardaki yazıları alıyoruz
            const email = document.getElementById('email').value.trim();
            const sifre = document.getElementById('sifre').value.trim();

            // E-posta formatını kontrol eden kural (Regex)
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // 1. Boşluk Kontrolü
            if (email === '' || sifre === '') {
                event.preventDefault(); // Formun PHP'ye gitmesini durdurur
                alert('Hata: Lütfen e-posta ve şifre alanlarını boş bırakmayınız!');
                return;
            }

            // 2. Mail Formatı Kontrolü
            if (!emailRegex.test(email)) {
                event.preventDefault();
                alert('Hata: Lütfen geçerli bir e-posta formatı giriniz (örn: isim@domain.com)!');
                return;
            }

            // Eğer JS'de hata yoksa form PHP'ye (sunucuya) doğru yolculuğa çıkar.
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
