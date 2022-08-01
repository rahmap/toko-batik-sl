<?php $this->load->view("auth/auth_header") ?>
<?php $this->load->view("auth/auth_nav") ?>
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="p-5">
            <div class="text-center">
            <?= $this->session->flashdata('message') ?>
              <h1 class="h4 text-gray-900 mb-4">Buat Akun baru!</h1>
            </div>
            <form class="user" action="<?= base_url('auth/register') ?>" method="POST">
            
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" name="fname" class="form-control form-control-user" value="<?= set_value('fname') ?>" id="fname" placeholder="First Name">
                  <?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <input type="text" name="lname" value="<?= set_value('lname') ?>" class="form-control form-control-user" id="lname" placeholder="Last Name">
                  <?= form_error('lname', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control form-control-user" id="email" placeholder="Email Address">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <input type="text" name="no_hp" value="<?= set_value('no_hp') ?>" minlength="8" maxlength="15" class="form-control form-control-user" id="no_hp" placeholder="Phone Number">
                  <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                  <input type="text" name="address" minlength="5" maxlength="100" value="<?= set_value('address') ?>" class="form-control form-control-user" id="address" placeholder="Address">
                  <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-4">
                  <input type="text" name="zip_code" value="<?= set_value('zip_code') ?>" minlength="2" maxlength="15" class="form-control form-control-user" id="zip_code" placeholder="kode Pos">
                  <?= form_error('zip_code', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Repeat Password">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
                  <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    Daftarkan Akun
                  </button>
                </div>
              </div>
            </form>
            <hr>
            <!-- <div class="text-center">
              <a class="small" href="forgot-password.html">Lupa Kata Sandi?</a>
            </div> -->
            <div class="text-center">
              <a class="small" href="<?= base_url('auth/login') ?>">Sudah Punya Akun? Login!</a>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
<?php $this->load->view("auth/auth_footer") ?>