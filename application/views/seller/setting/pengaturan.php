<!DOCTYPE html>
<html lang="en">
  <head>
	<?php $this->load->view('seller/_partials/seller_header') ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('home') ?>" class="site_title"><i class="fa fa-shopping-basket"></i> <span> Batik Store</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info & nama toko -->
				<?php $this->load->view('seller/_partials/seller_pp') ?>
            <!-- /menu profile quick info & nama toko -->

            <br/>

            <!-- sidebar menu -->
			<?php $this->load->view('seller/_partials/seller_sidebar') ?>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
		<?php $this->load->view('seller/_partials/seller_topnav') ?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pengaturan Akun</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>User Report <small>Activity report</small></h2> -->
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="<?= base_url('assets/images/user/'.$image) ?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?= $this->session->nama ?></h3>

                      <ul class="list-unstyled user_data">

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i><span class="text-warning"><b> <?= $this->session->email ?></b></span>
                        </li>
                        <li>
                          <i class="fa fa-briefcase user-profile-icon "></i> <span class="text-success"><b>Seller sejak <?= date('d/m/Y H:i', $joinAt)   ?></b> </span>
                        </li>

                      </ul>

                    </div>
                    <?php if ($this->session->flashdata('message')) : ?>
                      <?= $this->session->flashdata('message'); ?>
                    <?php endif; ?>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Keamanan</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start recent activity -->
                            <div class="x_panel">
                              <div class="x_content">

                                <!-- start form for validation -->
                                <form action="<?= base_url('dashboard/seller/updateProfile') ?>" method="POST" enctype="multipart/form-data">

                                  <label for="nama">Nama :</label>
                                  <input type="text" minlength="3" maxlength="50" id="nama" value="<?= $this->session->nama ?>" class="form-control" name="nama" required />
                                  <br/>
                                  <label for="no_hp">Phone Number :</label>
                                  <input type="text" minlength="8" maxlength="15" id="no_hp" value="<?= $dataUser['no_hp'] ?>" class="form-control" name="no_hp" required />
                                  <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>') ?>
                                  <br/>
                                  <label for="zip_code">Kode Pos :</label>
                                  <input type="text" minlength="2" maxlength="15" id="zip_code" value="<?= $dataUser['zip_code'] ?>" class="form-control" name="zip_code" required />
                                  <?= form_error('zip_code', '<small class="text-danger pl-3">', '</small>') ?>
                                  <br/>
                                  <label>Provinsi :</label>
                                  <select class="form-control" id="provinsi" name="provinsi">
                                    <?php foreach ($provinsi->rajaongkir->results as $prov): ?>
                                      <option data-id_prov="<?= $prov->province_id ?>" value="<?= $prov->province ?>"
                                        <?= (!empty($dataUser['provinsi']) AND $dataUser['provinsi'] == $prov->province)? 'selected' : '' ?>
                                      ><?= $prov->province ?></option>
                                    <?php endforeach; ?>
                                  </select>
                                  <?= form_error('provinsi', '<small class="text-danger pl-3">', '</small>') ?>
                                  <br/>
                                  <label>Kabupaten :</label>
                                  <select required id="kabupaten" name="kabupaten" class="form-control kabupaten">
                                    <option> - </option>
                                  </select>
                                  <br/>
                                  <label for="kabupaten">Kecamatan :</label>
                                  <input type="text" minlength="3" maxlength="100" id="kecamatan" value="<?= $dataUser['kecamatan'] ?>" class="form-control" name="kecamatan" required />
                                  <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>') ?>
                                  <br/>
                                  <label for="address">Alamat :</label>
                                  <input type="text" minlength="5" maxlength="100" id="address" value="<?= $dataUser['address'] ?>" class="form-control" name="address" required />
                                  <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                                  <br/>
                                  <label for="email">Email :</label>
                                  <input type="email" id="email" value="<?= $this->session->email ?>" readonly class="form-control" name="email" required />
                                  <br/>
                                  <label for="email">Foto Profile (abaikan jika tidak ingin di ganti) :</label>
                                  <input type="file" id="foto" value="<?= base_url('assets/images/user/'.$image) ?>" class="form-control" name="foto" />
                                  <br/>
                                  <button class="btn btn-primary" name="submit" type="submit">Update Profile</button>

                                </form>
                                <!-- end form for validations -->
                              </div>
                            </div>
                            <!-- end recent activity -->

                          </div>
                          <?php
                          if($this->session->flashdata('updatePswSuccess')):
                            echo $this->session->flashdata('updatePswSuccess');
                          endif;
                          ?>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start recent activity -->
                            <div class="x_panel">
                              <div class="x_content">

                                <!-- start form for validation -->
                                <form action="<?= base_url('dashboard/customers/updateKeamanan') ?>" method="POST">

                                  <label for="OldPassword">Password Lama :</label>
                                  <input type="password" id="OldPassword" class="form-control" name="OldPassword" required />
                                  <br/>
                                  <label for="PasswordBaru">Password Baru :</label>
                                  <input type="password" id="PasswordBaru" class="form-control" name="PasswordBaru" required />
                                  <br/>
                                  <label for="fixPasswordBaru">Konfirmasi Password Baru:</label>
                                  <input type="password" id="fixPasswordBaru" class="form-control" name="fixPasswordBaru" required />
                                  <br/>
                                  <button class="btn btn-primary" name="submit" type="submit">Update Password</button>

                                </form>
                                <!-- end form for validations -->

                              </div>
                            </div>
                            <!-- end recent activity -->

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('seller/_partials/seller_footer'); ?>
        <!-- /footer content -->
      </div>
	</div>
	<?php $this->load->view('seller/_partials/seller_js') ?>
    <script>
        $(document).ready(function (){
            const kabupaten = $('#kabupaten');
            const provinsi = $('#provinsi');
            const BASE_URL = "<?php echo base_url() ?>";
            let kabupatenVal = "<?= $dataUser['kabupaten'] ?>"

            $(provinsi).on('change', function () {
                $(kabupaten).attr('disabled', true);
                onLoadRajaongkir()
            })

            onLoadRajaongkir()

            function onLoadRajaongkir(){
                $.ajax({
                    url: BASE_URL + 'dashboard/seller/getKabupaten/'+ provinsi.find(':selected').data('id_prov'),
                    dataType : "json",
                    success: function(result) {

                        $(kabupaten).children('option').remove();
                        let res = JSON.parse(result)
                        $(kabupaten).append(res.rajaongkir.results.map(function (sObj) {
                            return '<option value="' +
                                sObj.city_name + '">' +
                                sObj.city_name + '</option>'
                        }));
                    },
                    complete: function (params) {
                        $(kabupaten).attr('disabled', false);
                        $(`#kabupaten option[value="${kabupatenVal}"]`).attr('selected', 'selected')
                    },
                    error: function(err){
                        console.log(err);
                    }
                })
            }
        })
    </script>
  </body>
</html>