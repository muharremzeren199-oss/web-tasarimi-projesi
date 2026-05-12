<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İşlem Sonucu - Zeren Web</title>

    <!-- Bootstrap CSS  -->
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white text-center">
                        <h3 class="mb-0">Form Başarıyla Gönderildi!</h3>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4 text-secondary">Sunucuya Ulaşan Gelen Veriler:</h5>

                        <?php
                        // Formdan gelen verilerin POST metoduyla kontrol eder.
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                            // degiskenleri al (guvenlikli)
                            $ad = isset($_POST['ad']) ? htmlspecialchars($_POST['ad']) : 'Belirtilmedi';
                            $tel = isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : 'Belirtilmedi';
                            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Belirtilmedi';
                            $sehir = isset($_POST['sehir']) ? htmlspecialchars($_POST['sehir']) : 'Belirtilmedi';
                            $cinsiyet = isset($_POST['cinsiyet']) ? htmlspecialchars($_POST['cinsiyet']) : 'Belirtilmedi';
                            $mesaj = isset($_POST['mesaj']) ? htmlspecialchars($_POST['mesaj']) : 'Belirtilmedi';

                            // Checkbox seçiliyse "on" değeri gelir, onu "Evet" olarak değiştirir.
                            $onay = isset($_POST['onay']) ? 'Evet, Onaylandı' : 'Hayır, Onaylanmadı';

                            // Gelen verileri Bootstrap tablosu içine yazdırır.
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<tr><th style='width: 30%;'>Ad Soyad</th><td>$ad</td></tr>";
                            echo "<tr><th>Telefon</th><td>$tel</td></tr>";
                            echo "<tr><th>E-Posta</th><td>$email</td></tr>";
                            echo "<tr><th>Şehir</th><td>$sehir</td></tr>";
                            echo "<tr><th>Cinsiyet</th><td>$cinsiyet</td></tr>";
                            echo "<tr><th>Mesaj</th><td>$mesaj</td></tr>";
                            echo "<tr><th>Onay Durumu</th><td><span class='badge bg-info text-dark'>$onay</span></td></tr>";
                            echo "</table>";

                        } else {
                            // Eğer biri butona basmadan direkt islem.php adresini girerse hata ver
                            echo "<div class='alert alert-danger'>Bu sayfaya doğrudan erişim yapılamaz. Lütfen iletişim formunu kullanın.</div>";
                        }
                        ?>

                        <div class="text-center mt-4">
                            <a href="iletisim.html" class="btn btn-outline-secondary fw-bold">İletişim Sayfasına Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
