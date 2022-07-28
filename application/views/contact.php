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
<?php $this->load->view('produk/_partials-nav.php') ?>
<main style="margin-top: 100px;">
    <div class="container">
      <a target="_blank" href="https://wa.me/628982002040">
        <div class="alert alert-primary" role="alert">
          Whatsapp &nbsp;&nbsp;&nbsp;: <b>08982002040</b>
        </div>
      </a>
      <div class="alert alert-secondary" role="alert">
        Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b>lilikhidaya76@gmail.com</b>
      </div>
      <a target="_blank" href="https://www.instagram.com/rahmaap__/">
        <div class="alert alert-success" role="alert">
          Instagram &nbsp;&nbsp;: <b>sopo</b>
        </div>
      </a>
      <a target="_blank" href="https://facebook.com/rahmatvv">
        <div class="alert alert-danger" role="alert">
          Facebook &nbsp;&nbsp;: <b>sopo aku</b>
        </div>
      </a>
    </div>
</main>
  <!--Footer-->
<div style="margin-top: 250px">
	<?php $this->load->view('produk/_partials-footer.php') ?>
</div>
<!--  <footer class="page-footer text-center font-small mt-4 wow fadeIn fixed-bottom">-->
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
