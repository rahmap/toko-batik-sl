<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('produk/_partials-heda.php') ?>
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }
  </style>
</head>

<body>
  <!-- Begin Nav -->
  
  <?php $this->load->view('produk/_partials-nav.php') ?>
  <!-- End Nav -->
  <?php if ($this->session->flashdata('infoPayment')) : ?>
    <?= $this->session->flashdata('infoPayment'); ?>
  <?php endif; ?>
  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%282%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Batik Store</strong>
              </h1>
              <p>
                <strong>Produk original dengan harga bersahabat.</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>Batik Store hadir dengan berbagai kemudahan untuk anda dalam yang berkeinginan tampil 
                beda dan keran.</strong>
              </p>

            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/First slide-->

      <!--Second slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%283%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Batik Store</strong>
              </h1>

              <p>
                <strong>Produk original dengan harga bersahabat.</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>Batik Store hadir dengan berbagai kemudahan untuk anda dalam yang berkeinginan tampil 
                beda dan keran.</strong>
              </p>

            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Second slide-->

      <!--Third slide-->
      <div class="carousel-item">
        <div class="view" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/8-col/img%285%29.jpg'); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">
              <h1 class="mb-4">
                <strong>Batik Store</strong>
              </h1>

              <p>
                <strong>Produk original dengan harga bersahabat.</strong>
              </p>

              <p class="mb-4 d-none d-md-block">
                <strong>Batik Storeo hadir dengan berbagai kemudahan untuk anda dalam yang berkeinginan tampil 
                beda dan keran.</strong>
              </p>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      <!--/Third slide-->

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
  <!--/.Carousel Wrapper-->

  <!--Main layout-->
  <main>
    <div class="container">
			<?php if(count($popular) > 0): ?>
        <?php $this->load->view('produk/_partials-popular') ?>
			<?php endif; ?>

      <!--Navbar-->
        <?php $this->load->view('produk/_partials-cat') ?>
      <!--/.Navbar-->

      <!--Section: Products v.3-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <?php foreach ($produk as $item) : ?>
            <!--Grid column-->

            <div class="col-lg-3 col-md-6 mb-4">
              <!--Card-->

              <div class="card" style="height: 490px">

                <!--Card image-->
                <div class="view overlay">
									<img src="<?= base_url('assets/images/produk/' . $item['gambar_produk']) ?>"
											 style="padding: 5px;" width="372" height="431"
											 class="card-img-top img-fluid"  alt="">

                  <a href="<?= base_url('produk/detail/' . encrypt_url($item['unik_produk'])) ?>" target="_blank">
                    <div class="mask rgba-white-slight"></div>
                  </a>
                </div>
                <!--Card image-->
                <!--Card content-->
                <div class="card-body text-center">
                  <!--Category & Title-->
                  <a href="<?= base_url('produk/cari/kategori/' . strtolower($item['nama_cat'])) ?>" class="grey-text">
                    <h5><?= ucfirst($item['nama_cat']) ?></h5>
                  </a>
                  <h5>
                    <strong>
                      <a href="<?= base_url('produk/detail/' . encrypt_url($item['unik_produk'])) ?>" class="dark-grey-text"><?= ucwords($item['nama_produk']) ?>
                        <?= ($item['diskon'] != 0) ? '<span class="badge badge-pill danger-color">'.$item['diskon'].'%</span>' : '' ;?>
                      </a>
                    </strong>
                  </h5>

                  <h4 class="font-weight-bold blue-text">
                    <strong>Rp <?= number_format($item['harga_produk'] - $item['harga_produk'] * $item['diskon'] / 100, 0, ',', '.') ?></strong>
                  </h4>
                </div>
                <!--Card content-->
              </div>
              <!--Card-->
            </div>

            <!--Grid column-->
          <?php endforeach; ?>


        </div>
        <!--Grid row-->

      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">
        <?= $pagination ?>
        </ul>
      </nav>
      <!--Pagination-->

    </div>
  </main>
  <!--Main layout-->
	<?php $this->load->view('produk/_partials-footer.php') ?>
  <!--Footer-->
<!--  <footer class="page-footer text-center font-small mt-4 wow fadeIn">-->
<!---->
<!---->
<!---->
<!--    <div class="footer-copyright py-3">-->
<!--      © --><?//= date('Y') ?><!-- Copyright:-->
<!--      <a href="https://www.instagram.com/rahmaap__/" target="_blank"> rahmaap__ </a>-->
<!--    </div>-->
<!---->
<!---->
<!--  </footer>-->
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>
