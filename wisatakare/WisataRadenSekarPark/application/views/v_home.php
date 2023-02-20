<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="theme-color" content="#009578">

  <title>RADEN SEKAR PARK</title>
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

      
      <a href="index.html" class="logo"><img src="assets/images/madiunlogo.jpg" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="<?php echo base_url() . 'Home' ?>">Home</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
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
      <h3>Welcome to <strong>Portal Wisata</strong></h3>
      <h1>RADEN SEKAR PARK</h1>
      <h2>Enjoy With Our View</h2>
      <a href="#gallery" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  
    <!-- Gallery Grid-->
    <section class="page-section bg-light" id="gallery">
        <div class="container">
            <div class="section-title">
          <h2>Gallery</h2>
          <h3>Check our <span>Gallery</span></h3>
        </div>
            <div class="row">
            <?php foreach ($album->result() as $row) : ?>
                <div class="col-lg-4 col-sm-6 my-3">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <a href="<?php echo base_url().'assets/images/'.$row->album_cover;?>" data-lightbox="example-2" data-title="<?php ?>">
                                <img class="img-fluid" style="border-radius: 10px;" src="<?php echo base_url().'assets/images/'.$row->album_cover;?>" alt="image-1">
                            </a>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <section id="fasilitas" class="portfolio">
      <div class="container">

        <div class="section-title">
          <h2>Fasilitas</h2>
          <h3>Check our <span>Fasilitas</span></h3>
        </div>
        <div class="row portfolio-container">
        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4159.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>GAZEBO</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4159.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4183.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>PLAYGROUND</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4183.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4169.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>MUSHOLA</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4169.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4167.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>TOILET</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4167.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4160.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>RUMAH MAKAN</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/IMG_4160.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="http://localhost/wisata/assets/Tempo/assets/img/galeri/parkiran.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>TEMPAT PARKIR</h4>
              <a href="http://localhost/wisata/assets/Tempo/assets/img/galeri/parkiran.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"><i class="bx bx-plus"></i></a>
            </div>
          </div>


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
        <div class="wrapper">
            <img class="mx-auto" src="<?= base_url('assets/'); ?>images/tiket 3.jpg" width="600" height="400"/>
        </div>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Lokasi</h2>
          <h3>Lokasi <span>Raden Sekar Park</span></h3>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.930169821191!2d111.55419479999999!3d-7.797218200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79a3d3cafce68f%3A0xc24fae0d6d888ed2!2sRADEN%20SEKAR%20PARK!5e0!3m2!1sen!2sid!4v1670653115670!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="row mt-5">

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
          </div>
          <div class="about-section">
<h1>About Us</h1>
<p>
Raden sekar park adalah hutan wisata yang menyuguhkan taman bunga dengan banyak spot foto menarik, 
dan menyediakan suasana yang masih sangat hijau asri nan sejuk, yang memanjakan mata pengunjung yang ingin healing dengan susasana yang masih alami
</p>

</div>

 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Universitas Sebelas Maret 2022</span></strong>. All Rights Reserved
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
<style>
       
        .about-section{
            padding: 50px;
            text-align: center;
            background-color: white;
            color: #4f4036;
        }

        
        .wrapper{
            display: flex;
        }

        .wrapper .kiri,
        .wrapper .kanan{
            width:50%;
            height: 40vh;
            text-align: center;
        }
    </style>
    