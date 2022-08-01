  <!-- Navbar -->
  <style>
    .dropdown-menu {
      max-width: 750px !important;
      height: auto;

      /* height: 400px !important; */
    }
  </style>
  <style>
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: red;
    color: white;
    text-align: center;
  }
  </style>
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="<?= base_url('home') ?>">
        <strong class="blue-text">Home</strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link waves-effect" href="<?= base_url('contact') ?>">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" href="<?= base_url('about') ?>">About
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">Kategori
            </a>
            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
              <?php foreach($cat as $key): ?>
                <a class="dropdown-item" href="<?= base_url('produk/cari/kategori/'.strtolower($key['nama_cat'])) ?>"><?= $key['nama_cat'] ?></a>
              <?php endforeach; ?>
            </div>
          <li class="nav-item">
            <form class="form-inline" action="<?= base_url('produk/cari_produk') ?>" id="form-keyword" method="get">
              <div class="md-form my-0">
                <input class="form-control mr-sm-2" id="keyword" name="keyword" type="text" placeholder="Cari nama batik.." aria-label="Cari nama batik..">
              </div>
            </form>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <?php
          if (!$this->session->has_userdata('email')) {
            echo
              '<li class="nav-item mr-2">'; ?>
            <a href="<?= base_url('auth/register') ?>" class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-github mr-2"></i>Register
            </a>
          <?= '</li>';
          } ?>
          <?php
          if ($this->session->has_userdata('email')) {
            echo
              '<li class="nav-item mr-2">'; ?>
            <a href="
              <?= ($this->session->level == 'Member') ?  base_url('dashboard/customers') : base_url('dashboard/admin')
                ?>" class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-github mr-2"></i>Dashboard
            </a>
          <?= '</li>';
          } ?>
          <?php
          if ($this->session->has_userdata('email')) {
            echo
              '<li class="nav-item ">'; ?>
            <a href=" <?= base_url('auth/logout') ?> " class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-github mr-2"></i>Logout
            </a>
          <?= '</li>';
          } else {
            echo '<li class="nav-item ">'; ?>
            <a href="<?= base_url('auth/login') ?>" class="nav-link border border-light rounded waves-effect">
              <i class="fab fa-github mr-2"></i>Login
            </a>
          <?= '</li>';
          }

          ?>
          <li class="nav-item">
            <div class="dropdown">
              <a href="<?= base_url('keranjang') ?>" class="nav-link waves-effect">
                <i class="fas fa-shopping-cart"></i>
                <span class="clearfix d-none d-sm-inline-block"> Keranjang </span>
                <span class="badge red z-depth-1 mr-1"> <?= count($this->cart->contents()); ?> </span>
              </a>
          </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->
  <script>
      //let a = ''
      //$('#keyword').on('input', function() {
      //    a = $(this).val();
      //});
      //document.getElementById('keyword').onkeydown = function(e){
      //    if(e.keyCode == 13){
      //        window.location.href = '<?//= base_url('produk/cari_produk/') ?>//' + a
      //    }
      //}
  </script>