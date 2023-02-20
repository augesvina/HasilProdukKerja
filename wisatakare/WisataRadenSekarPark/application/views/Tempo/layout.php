<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="theme-color" content="#009578">

  <title>PORTAL WISATA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="http://localhost/wisata/assets/Tempo/assets/img/silat.jpg" rel="icon">
  <link href="http://localhost/wisata/assets/Tempo/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="http://localhost/wisata/assets/Tempo/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://localhost/wisata/assets/Tempo/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="http://localhost/wisata/assets/Tempo/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="http://localhost/wisata/assets/Tempo/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="http://localhost/wisata/assets/Tempo/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="http://localhost/wisata/assets/Tempo/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="http://localhost/wisata/assets/Tempo/assets/css/style.css" rel="stylesheet">
  <link href="assets/pwa/manifest.json" rel="manifest"/>
  <link href="<?= base_url('assets/'); ?>pwa/images/logo192.png" rel="apple-touch-icon"/>
  
  <!-- =======================================================
  * Template Name: Tempo - v4.9.1
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">LOGO</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="<?php echo base_url() . 'Home' ?>">Home</a></li>
          <li><a class="nav-link scrollto" href="#galeri">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#fasilitas">Fasilitas</a></li>
          <li><a class="nav-link scrollto" href="#tiket">Tiket</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="<?php echo base_url() . 'Administrator' ?>">Login Admin</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <h3>Welcome to <strong>Portal Wisata </strong></h3>
      <h1>RADEN SEKAR PARK</h1>
      <h2>Enjoy With Our View</h2>
      <a href="#" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="galeri" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Gallery</h2>
          <h3>Check our <span></span></h3>
          <p>Gallery Ini Berisi View Dari Wisata Raden Sekar Park</p>
        </div>

        <?php foreach ($album->result() as $row) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="<?php echo base_url() . 'assets/images/' . $row->album_cover ?>"
                                    class="img-fluid" alt="">
                                <a href="<?php echo base_url() . 'assets/images/' . $row->album_cover ?>"
                                    data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i
                                        class="ion ion-eye"></i></a>
                            </figure>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
    <!-- ======= Portfolio Section ======= -->
    <section id="fasilitas" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Fasilitas</h2>
          <h3>Check our <span>Fasilitas</span></h3>
        </div>

        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/grape 5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Gazebo</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/grape 5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/grape 5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>SPOT FOTO</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/grape 5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/grape 5.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>PINTU MASUK</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/grape 5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>


      </div>
    </section><!-- End Portfolio Section -->
    <main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Operasional</h2>
          <h3>Jam<span> Operasional</span></h3>
        </div>
        <br><img src="<?= base_url('assets/images/jam.png') ?>" alt="" style="border:0; width: 100%; height: 500px;"><br>

</div>
<!-- Page Heading -->
<main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="tiket" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Tiket</h2>
          <h3>Check our <span>Tiket</span></h3>
        </div>
        <br><img src="<?= base_url('assets/images/tiket.jpg') style="border:0; width: 200px; height: 300px;"?>" alt=""><br>

</div>
<main id="main">
    <!-- ======= Portfolio Section ======= -->
    <section id="about" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>ABOUT US</h2>
          <h3>Check <span> About Us</span></h3>
        </div>
        <br><p><br>

</div>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Lokasi</h2>
          <h3>Lokasi <span>Grape</span></h3>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.845484652254!2d111.6395232147775!3d-7.699725694449585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79baf2a404e277%3A0x9ed509f852d475a!2sWana%20Wisata%20Grape!5e0!3m2!1sen!2sid!4v1666196083214!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Portal Wisata</h3>
            <p>
            Kresek, Wungu, Area Kebun <br><br><br>
              
              <strong>Phone:</strong> +62 25648 55145<br>
              <strong>Email:</strong> maganghore@gmail.com<br>
            </p>
          </div>
          </div>
      </div>
    </div>
    

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>magang hore 2022</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>

    <h1 style="color: black;"></h1>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="http://localhost/wisata/assets/Tempo/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="http://localhost/wisata/assets/Tempo/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="http://localhost/wisata/assets/Tempo/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="http://localhost/wisata/assets/Tempo/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="http://localhost/wisata/assets/Tempo/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="http://localhost/wisata/assets/Tempo/assets/js/main.js"></script>
  <script src=" assets/pwa/src/index.js"></script>

</body>

</html>