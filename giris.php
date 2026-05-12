<?php
$ogrenci_no = "b251210373";
$dogru_email = $ogrenci_no . "@sakarya.edu.tr";
$dogru_sifre = $ogrenci_no;

$hata_mesaji = "";
$giris_basarili = false;
   // POST metoduyla geldiyse çalışacak kısım
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $sifre = isset($_POST['sifre']) ? trim($_POST['sifre']) : '';
    // girilen bilgiler doğru mu kontrolü yapılıyor
    if ($email === $dogru_email && $sifre === $dogru_sifre) {
        $giris_basarili = true;  // Giriş başarılı yap.
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
    <!-- Bootstrap CSS ve Font Awesome CDN bağlantıları -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page-body">

    <div class="login-bg"></div>

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
                    <li class="nav-item"><a class="nav-link" href="index.html">Hakkında</a></li>
                    <li class="nav-item"><a class="nav-link" href="ozgecmis.html">Özgeçmiş</a></li>
                    <li class="nav-item"><a class="nav-link" href="sehrim.html">Şehrim & Mirasımız</a></li>
                    <li class="nav-item"><a class="nav-link" href="ilgi-alanlarim.html">İlgi Alanlarım</a></li>
                    <li class="nav-item"><a class="nav-link" href="iletisim.html">İletişim</a></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="giris.php">Giriş</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Giriş Başarılıysa veya Hatalıysa Gösterilecek İçerik -->
    <div class="container mt-5">
        <?php if ($giris_basarili): ?>
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 text-center">
                    <div class="alert bg-white py-5 border-0 shadow-lg" style="border-radius: 15px;">

                        <h1 class="display-4 fw-bold" style="color: #2ecc71;">
                            Hoşgeldiniz <?php echo $ogrenci_no; ?>
                        </h1>

                        <p class="lead mt-3 text-dark fw-bold">
                            Kimlik doğrulama başarılı. Yönetim paneline eriştiniz.
                        </p>

                        <a href="index.html" class="btn mt-4 px-5 py-2 fw-bold text-white shadow-sm" style="background-color: #2ecc71; border-radius: 30px; font-size: 1.1rem;">
                            Ana Sayfaya Dön
                        </a>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div class="row justify-content-center align-items-center min-vh-75">
                <div class="col-md-5">
                    <div class="card glass-card border-0 shadow-lg">
                        <div class="card-header text-white text-center py-3" style="background-color: #8B0000; border-radius: 15px 15px 0 0;">
                            <h4 class="mb-0 fw-bold">Öğrenci Girişi</h4>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            <!-- Hatalı girişte ekranda beliren uyarı mesajı -->
                            <?php if (!empty($hata_mesaji)): ?>
                                <div class="alert fw-bold text-center        border-0 shadow-sm" style="background-color: #fd7e14; color: white;">
                                 <i class="fas fa-exclamation-triangle me-2"></i> <?php echo $hata_mesaji; ?>
                                </div>
                            <?php endif; ?>
                                <!-- Form POST metoduyla kendi kendine veri yollar -->
                            <form id="GirisForm" action="giris.php" method="POST">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-white">E-Posta Adresi</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-0"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="b251210373@sakarya.edu.tr">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-bold text-white">Şifre</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white border-0"><i class="fas fa-lock text-muted"></i></span>
                                        <input type="password" id="sifre" name="sifre" class="form-control" placeholder="Öğrenci Numaranız">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg w-100 fw-bold fs-5 text-white" style="background-color: #8B0000;">Sisteme Giriş Yap</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Form doğrulama için JavaScript -->
    <script>
        document.getElementById('GirisForm').addEventListener('submit', function(event) {
            // input degerlerini al ve trim ile boşlukları temizle
            const email = document.getElementById('email').value.trim();
            const sifre = document.getElementById('sifre').value.trim();
             // E-posta formatını kontrol eden kural
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

             // 1.Boşluk Kontrolü
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
        });
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
