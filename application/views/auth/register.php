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
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <label style="font-weight:bold" for="fname">Nama Lengkap</label>
                  <input type="text" required name="fname" class="form-control" value="<?= set_value('fname') ?>" id="fname" placeholder="Nama Lengkap">
                  <?= form_error('fname', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label style="font-weight:bold" for="email">Email</label>
                  <input type="email" required name="email" value="<?= set_value('email') ?>" class="form-control" id="email" placeholder="Email">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <label style="font-weight:bold" for="no_hp">Nomor Hp</label>
                  <input type="text" required name="no_hp" value="<?= set_value('no_hp') ?>" minlength="8" maxlength="15" class="form-control" id="no_hp" placeholder="Nomor Hp">
                  <?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <label style="font-weight:bold" for="provinsi">Provinsi</label>
                  <select class="form-control" id="provinsi" name="provinsi">
                    <?php foreach ($provinsi->rajaongkir->results as $prov): ?>
                      <option data-id_prov="<?=$prov->province_id?>" value="<?=$prov->province?>"><?=$prov->province?></option>
                    <?php endforeach;?>
                  </select>
                  <?=form_error('provinsi', '<small class="text-danger pl-3">', '</small>')?>
                </div>
                <div class="col-sm-4">
                  <label style="font-weight:bold" for="kabupaten">Kabupaten</label>
                  <select class="form-control" disabled id="kabupaten" name="kabupaten">
                    <option> - </option>
                  </select>
                  <?=form_error('kabupaten', '<small class="text-danger pl-3">', '</small>')?>
                </div>
                <div class="col-sm-4">
                  <label style="font-weight:bold" for="kecamatan">Kecamatan</label>
                  <input type="text" required name="kecamatan" value="<?= set_value('kecamatan') ?>" minlength="3" maxlength="50" class="form-control" id="kecamatan" placeholder="Kecamatan">
                  <?= form_error('kecamatan', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                  <label style="font-weight:bold" for="address">Alamat Lengkap</label>
                  <input type="text" required name="address" minlength="5" maxlength="100" value="<?= set_value('address') ?>" class="form-control" id="address" placeholder="Kelurahan, Dusun RT/RW">
                  <?= form_error('address', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-4">
                  <label style="font-weight:bold" for="zip_code">Kode Pos</label>
                  <input type="text" required name="zip_code" value="<?= set_value('zip_code') ?>" minlength="2" maxlength="15" class="form-control" id="zip_code" placeholder="kode Pos">
                  <?= form_error('zip_code', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label style="font-weight:bold" for="password">Password</label>
                  <input type="password" required name="password" class="form-control" id="password" placeholder="Password">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <label style="font-weight:bold" for="password1">Password Konfirmasi</label>
                  <input type="password" required name="password1" class="form-control" id="password1" placeholder="Ulangi Password">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
              </div>
              <div class="row mt-5 mb-4 justify-content-center">
                <div class="col-md-4 text-center">
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
<script>
    $(document).ready( function() {
        const kabupaten = $('#kabupaten');
        const provinsi = $('#provinsi');
        const BASE_URL = "<?php echo base_url() ?>";

        $(provinsi).on('change', function () {
            kabupaten.attr('disabled', true);
            onLoadRajaongkir()
        })

        onLoadRajaongkir()

        function onLoadRajaongkir(){
            $.ajax({
                url: BASE_URL + 'auth/getKabupaten/'+ provinsi.find(':selected').data('id_prov'),
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
                error: function(err){
                    console.log(err);
                },
                complete: function(){
                    kabupaten.attr('disabled', false);
                }
            })
        }


    });

</script>
