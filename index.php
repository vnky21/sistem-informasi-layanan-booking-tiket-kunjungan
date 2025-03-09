<?php
include 'functions/crud.php';
include 'functions/hash.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>App Museum</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logodama.png" rel="icon">
  <link href="assets/img/logodama.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/admin/images/logo-white.png" alt="">

      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active me-3">Home</a></li>
          <li><a href="login">Login</a></li>
          <li><a href="register" class="btn btn-primary">Register</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero">

  <div class="info d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7 text-center mt-5">
          <h2 data-aos="fade-down"><span>MUSEUM LA GALIGO</span></h2>
          <p>Museum La Galigo adalah pusat sejarah dan budaya Sulawesi Selatan yang terletak di dalam Benteng Fort Rotterdam. Jelajahi koleksi yang menggambarkan kehidupan dan warisan budaya masyarakat Bugis-Makassar!</p>
          <a data-aos="fade-up" data-aos-delay="200" href="login" class="btn-get-started">AYO JELAJAHI!</a>
        </div>
      </div>
    </div>
  </div>

  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <ol class="carousel-indicators">
      <li data-bs-target="#hero-carousel" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#hero-carousel" data-bs-slide-to="1"></li>
      <li data-bs-target="#hero-carousel" data-bs-slide-to="2"></li>
      <li data-bs-target="#hero-carousel" data-bs-slide-to="3"></li>
    </ol>

    <div class="carousel-item active">
      <img src="assets/img/hero-carousel/img1.jpg" alt="Museum La Galigo" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="assets/img/hero-carousel/img2.jpg" alt="Koleksi Museum" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="assets/img/hero-carousel/img3.jpg" alt="Artefak Sejarah" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="assets/img/hero-carousel/img4.jpg" alt="Artefak Sejarah" class="d-block w-100">
    </div>
  </div>
</section>
<!-- End Hero Section -->

<main id="main">

  <!-- ======= Tentang Museum Section ======= -->
  <section id="tentang-museum" class="get-started">
    <div class="container">
      <div class="row justify-content-between gy-4">

        <!-- Gambar Museum -->
        <div class="col-lg-5 d-flex align-items-center" data-aos="fade-up">
          <img src="assets/img/undraw-museum.svg" alt="Museum La Galigo" style="width: 100%; height: auto;">
        </div>

        <!-- Tentang Museum -->
        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
          <div class="content">
            <h3 style="font-size:52px;">Tentang Kami</h3>
            <p>Museum La Galigo adalah museum bersejarah yang terletak di Benteng Fort Rotterdam, Makassar. Museum ini menyimpan koleksi berharga yang mencakup artefak budaya, seni, dan sejarah Sulawesi Selatan, termasuk naskah kuno Lontara yang legendaris.</p>
            <p>Didirikan untuk melestarikan warisan masyarakat Bugis-Makassar, Museum La Galigo menawarkan wawasan tentang peradaban lokal yang kaya. Setiap sudut museum ini menghidupkan cerita masa lalu dengan koleksi unik dan pameran edukatif yang dirancang untuk semua kalangan.</p>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- End Tentang Museum Section -->

  <!-- ======= Koleksi Museum Section ======= -->
  <section id="koleksi-museum" class="get-started section-bg">
    <div class="container">

      <div class="row justify-content-between gy-4">

        <!-- Sejarah Singkat -->
        <div class="col-lg-7 d-flex align-items-center" data-aos="fade-up">
          <div class="content">
            <h3 style="font-size:52px;">Sejarah Singkat</h3>
            <p>Museum La Galigo didirikan sebagai bagian dari upaya melestarikan sejarah dan budaya Sulawesi Selatan. Museum ini menyimpan koleksi artefak dari era Kerajaan Gowa-Tallo, termasuk alat musik tradisional, pakaian adat, senjata, dan peralatan sehari-hari masyarakat Bugis-Makassar.</p>

            <h4>Fakta Menarik</h4>
            <ul style="text-align: justify;">
              <li>Museum ini dinamai dari "I La Galigo," epos sastra Bugis yang merupakan salah satu karya sastra terpanjang di dunia.</li>
              <li>Koleksi museum mencakup naskah kuno Lontara, yang digunakan sebagai catatan sejarah dan budaya oleh masyarakat Bugis-Makassar.</li>
              <li>Terletak di dalam Benteng Fort Rotterdam, yang merupakan ikon sejarah kolonial di Makassar.</li>
              <li>Ruang pameran museum sering digunakan untuk kegiatan budaya dan edukasi.</li>
            </ul>
          </div>
        </div>

        <!-- Gambar Koleksi -->
        <div class="col-lg-4 d-flex align-items-center" data-aos="fade-up">
          <img src="assets/img/undraw-sejarah.svg" alt="Koleksi Museum" style="width: 100%; height: auto;">
        </div>

      </div>
    </div>
  </section>
  <!-- End Koleksi Museum Section -->

    <!-- Services Section -->
    <section id="services" class="services">

      <!-- Section Title -->
      <div class="container section-title text-center" data-aos="fade-up">
        <div class="section-header">
          <h2 style="font-size:36px;">Layanan Museum</h2>
          <p>Museum ini menyediakan berbagai layanan untuk mendukung pengalaman belajar dan eksplorasi sejarah yang menyenangkan.</p>
        </div>

      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

          <?php
          $result = selectData("tb_objek", "*");
          $dataObjek = [];
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
              $dataObjek[] = $row;
            }
          }
          ?>

          <?php
          $i = 1;
          foreach ($dataObjek as $data) : ?>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-card d-flex">
              <div class="icon flex-shrink-0" style="font-weight: bolder !important;">
                <?= $i++; ?>.
              </div>
              <div>
                <h3><?= $data->nama; ?></h3>
                <p><?= $data->keterangan; ?></p>
              </div>
            </div>
          </div><!-- End Service Card -->

          <?php endforeach; ?>
        </div>

      </div>

    </section><!-- /Services Section -->


    <!-- Services Section -->
    <section id="services" class="services section-bg">

      <div class="section-header">
        <h2>Alamat Museum</h2>
        <p>Alamat lengkap kami memudahkan Anda untuk merencanakan kunjungan.</p>
      </div>

      <div class="container" style="text-align: center;">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127162.03654646667!2d119.32293204344343!3d-5.133692219158764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbf02b00b0caa27%3A0x441e44bd89f86177!2sLa%20Galigo%20Museum!5e0!3m2!1sen!2sid!4v1734616934093!5m2!1sen!2sid"
          width="100%" height="500" style="border:0; margin: auto;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </section><!-- /Services Section -->

    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

      <div class="container">
        <div class="row">

          <div class="col-lg-5" data-aos="fade-up">
            <h2 class="faq-title">Ada Pertanyaan? Silahkan cek FAQ</h2>
            <p class="faq-description">Maecenas tempus tellus eget condimentum rhoncus sem quam semper libero sit amet
              adipiscing sem neque sed ipsum.</p>
            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
              <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z"
                  fill="currentColor"></path>
              </svg>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-container">

              <div class="faq-item">
                <h3>Apa itu Museum La Galigo?</h3>
                <div class="faq-content">
                  <p>Museum La Galigo adalah sebuah museum yang terletak di Benteng Rotterdam, Makassar, Sulawesi
                    Selatan.
                    Museum ini merupakan salah satu museum tertua di Indonesia yang menampilkan koleksi sejarah dan
                    budaya Sulawesi Selatan, khususnya budaya Bugis-Makassar.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3> Apa yang menjadi daya tarik utama Museum La Galigo?</h3>
                <div class="faq-content">
                  <p>Museum La Galigo memiliki koleksi yang mencakup benda-benda peninggalan sejarah, seperti senjata
                    tradisional,
                    pakaian adat, peralatan rumah tangga tradisional, dan manuskrip kuno, termasuk naskah Lontara. Salah
                    satu daya tarik utamanya adalah penjelasan tentang budaya maritim suku Bugis dan Makassar,
                    yang terkenal dengan kapal Pinisi-nya.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Kapan Museum La Galigo didirikan?</h3>
                <div class="faq-content">
                  <p>Museum La Galigo didirikan pada tahun 1938, awalnya sebagai bagian dari sebuah museum yang lebih
                    besar di Makassar.
                    Museum ini kemudian dikembangkan menjadi pusat dokumentasi sejarah dan budaya Sulawesi Selatan.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa saja fasilitas yang tersedia di Museum La Galigo?</h3>
                <div class="faq-content">
                  <p>Museum La Galigo dilengkapi dengan ruang pameran yang terbagi ke dalam beberapa kategori seperti
                    sejarah, arkeologi, etnografi, dan seni rupa.
                    Selain itu, terdapat layanan pemandu wisata yang menjelaskan isi museum kepada pengunjung.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara menuju Museum La Galigo?</h3>
                <div class="faq-content">
                  <p>Museum La Galigo terletak di dalam Benteng Rotterdam, Makassar, yang mudah diakses dari pusat kota.
                    Pengunjung dapat mencapainya menggunakan transportasi umum, kendaraan pribadi, atau taksi online.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa saja nilai budaya yang dapat dipelajari di Museum La Galigo?</h3>
                <div class="faq-content">
                  <p>Di museum ini, pengunjung dapat mempelajari nilai-nilai budaya Bugis-Makassar seperti keberanian,
                    kerja keras, dan
                    kebijaksanaan yang tercermin dalam tradisi maritim, seni ukir, dan manuskrip kuno.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>
          </div>

        </div>
      </div>
    </section><!-- /Faq Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

      <div class="footer-content position-relative">
        <div class="container">
          <div class="row">

            <div class="col-lg-4 col-md-6">
              <div class="footer-info">
                <h3>Museum La Galigo</h3>
                <p>
                Jl. Ujung Pandang No.2, Bulo Gading, Kec. Ujung Pandang, <br>Kota Makassar, Sulawesi Selatan 90221
                </p>
                <div class="social-links d-flex mt-3">
                  <a href="https://www.facebook.com/Disbudpar-Prov-Sulsel"
                    class="d-flex align-items-center justify-content-center" target="_blank"> <i
                      class="bi bi-facebook"></i></a>
                  <a href="https://www.instagram.com/budparsulsel"
                    class="d-flex align-items-center justify-content-center" target="_blank"> <i
                      class="bi bi-instagram"></i></a>
                  <a href="https://www.youtube.com/@disbudparsulsel1305"
                    class="d-flex align-items-center justify-content-center" target="_blank"> <i
                      class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div><!-- End footer info column-->

            <div class="footer-legal text-center position-relative">
              <div class="container">
                <div class="copyright">
                Copyright © <?= date('Y') ?> Ahmat Qhairul Mufti. All rights reserved.
                </div>
              </div>
            </div>
          </div>

    </footer>
    <!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      document.querySelectorAll('.faq-item').forEach(faqItem => {
        faqItem.addEventListener('click', function () {
          const content = this.querySelector('.faq-content'); // Ambil konten FAQ
          this.classList.toggle('faq-active'); // Toggle kelas faq-active

          // Toggle konten
          if (content.style.display === "block") {
            content.style.display = "none"; // Sembunyikan jika sudah terlihat
          } else {
            content.style.display = "block"; // Tampilkan konten
          }

          // Ubah ikon
          const toggleIcon = this.querySelector('.faq-toggle'); // Ambil ikon
          toggleIcon.classList.toggle('bi-chevron-down'); // Ubah ikon jika aktif
          toggleIcon.classList.toggle('bi-chevron-right');
        });
      });

      // Ambil elemen header
      const header = document.querySelector('.header');

      // Fungsi untuk menambahkan kelas 'scrolled' saat scroll ke bawah
      window.onscroll = function () {
        if (window.scrollY > 50) { // Ketika halaman digulir lebih dari 50px
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
      };
    </script>

</body>

</html>