<!DOCTYPE html>
<html lang="en">
  <head>
	<?php $this->load->view('seller/_partials/seller_header') ?>
	    <!-- Datatables -->
		<link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
		<!-- Select2 -->
		<link href="<?= base_url('assets/gentelella/') ?>vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
	<style>
	.select2-container {
    width: 100% !important;
    padding: 0;
}
	</style>
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
        <div class="right_col" role="main"> <!-- Mulai Konten -->
					<div class="">
						<div class="row top_tiles">
						<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="tile-stats">
							<div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
							<div class="count"><?= $allProduk ?></div>
							<h3>Total Produk</h3>
							<p>Menampilkan jumlah semua produk.</p>
							</div>
						</div>
						<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="tile-stats">
							<div class="icon"><i class="fa fa-comments-o"></i></div>
							<div class="count"><?= $aktifProduk ?></div>
							<h3>Produk Aktif</h3>
							<p>Menampilkan jumlah produk akif.</p>
							</div>
						</div>
						<div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
							<div class="tile-stats">
							<div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
							<div class="count"><?= $nonaktif ?></div>
							<h3>Produk Nonaktif</h3>
							<p>Menampilkan jumlah produk nonaktif.</p>
							</div>
						</div>
						</div>
						<?php if ($this->session->flashdata('message')) : ?>
							<?= $this->session->flashdata('message'); ?>
						<?php endif; ?>
            <div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2>Data Produk</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link" style="margin-right:10px;"><i class="fa fa-chevron-up"></i></a>
											</li>
											<a href="<?= base_url('dashboard/seller/add_product') ?>"><button type="button" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                        Tambah Produk Baru
                      </button></a>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<p class="text-muted font-13 m-b-30">
											Menampilkan seluruh data produk yang belum di hapus, seller dapat memperbaruhi data sesuai keadaan sesungguhnya.
										</p>
										<table id="datatable-keytable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable-keytable_info" style="position: relative;">
											<thead>
												<tr>
													<th>ID</th>
													<th>Nama</th>
													<th class="text-center">Ukuran</th>
													<th style="width:8%;">Kategori</th>
													<th class="text-center">Harga</th>
													<th class="text-center">Stok</th>
													<th class="text-center">Diskon</th>
													<th class="text-center">Active</th>
													<th class="text-center noExport">Actions</th>
												</tr>
											</thead>

											<tbody>
												<?php
//												dd($produk);
												foreach ($produk as $key) :  ?>
													<tr>
														<td><?= $key['id_produk'] ?></td>
														<td><?= $key['nama_produk'] ?></td>
														<td class="text-center"><?= ($key['ukuran'] == 'all size, ') ? '<span class="label label-default">All Size</span>' : str_replace(' ','',rtrim($key['ukuran'], ', ')) ?></td>
														<td style="width:8%;"><?= ($key['id_cat'] == null)? '<span class="label label-danger">Update Kategori</span>' : $key['nama_cat'] ; ?></td>
														<td class="text-center">Rp <?= number_format($key['harga_produk'], 0, ',', '.') ?></td>
														<td class="text-center"><?= ($key['stok'] == 0) ? '<span class="label label-warning">Kosong</span>' : $key['stok'] ; ?></td>
														<td class="text-center">
															<?= ($key['diskon'] > 0) ? '<span class="label label-info">' . $key['diskon'] . '% </span>' : '<span class="label label-default">Tidak Ada</span>'; ?>
														</td>
														<td class="text-center"><?= ($key['aktif'] == 1) ? '<span class="label label-success">Aktif</span>' : '<span class="label label-default">Tidak Aktif</span>' ; ?></td>
														<td class="text-center">
															<li role="presentation" class="dropdown" style="list-style: none;">
																<a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
																	Pilih
																	<span class="caret"></span>
																</a>
																<ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
																	<li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="btnHapus" data-ket="menghapus" onclick="set_url('<?= site_url('dashboard/seller/delete_produk/' . encrypt_url($key['id_produk']))  ?>')" data-toggle="modal" data-target="#kt_modal_1">
																	 Hapus Produk</a>
																	</li>
																	<?php
																		if ($key['aktif'] == 1) {
																			echo '<li role="presentation"><a class="btnHapus" data-ket="mengnonaktifkan" data-href="' . site_url('dashboard/seller/nonaktif_produk/' . encrypt_url($key['id_produk'])) . '"  data-toggle="modal" data-target="#kt_modal_1"> Nonaktifkan Produk</a></li>';
																		} else {
																			echo '<li role="presentation"><a class="btnHapus" data-ket="mengaktifkan" data-href="' . site_url('dashboard/seller/aktif_produk/' . encrypt_url($key['id_produk'])) . '"  data-toggle="modal" data-target="#kt_modal_1"> Aktifkan Produk</a></li>';
																		}
																			echo ' <li role="presentation"><a role="menuitem" tabindex="-1" href="#" class="btnEdit" 
																			data-toggle="modal" 
																			data-target=".modal-update" 
																			data-toggle="modal"
																			data-id="'.$key['id_produk'].'"
																			data-id_unik="'.$key['unik_produk'].'"
																			data-id_cat="'.$key['id_cat'].'"
																			data-nama="'.$key['nama_produk'].'"
																			data-keterangan="'.$key['ket_produk'].'"
																			data-ukuran="'.str_replace(' ','',rtrim($key['ukuran'], ', ')).'"
																			data-harga="'.$key['harga_produk'].'"
																			data-stok="'.$key['stok'].'"
																			data-diskon="'.$key['diskon'].'"
																			>
																				Update Produk</a>
																			</li>';
																		?>
																</ul>
															</li>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
            </div>
					</div>
        </div> <!-- Selesai Konten -->
        <!-- /page content -->
					<!--begin::Modal-->
	<div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					</button>
				</div>
				<div class="modal-body">
					<p id="ket_modal"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<a class="fixHapus"><button class="btn btn-danger" type="button">Setuju</button></a>
				</div>
			</div>
		</div>
	</div>
	<!--end::Modal-->

<!-- Update data Produk -->
<div class="modal fade modal-update" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Update Data Produk <span class="text-danger nama-target"></span></h4>
			</div>
			<div class="modal-body">
				<div class="x_panel">
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Umum</a>
								</li>
								<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Stok</a>
								</li>
								<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Harga dan Diskon</a>
								</li>
								<li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Foto Produk</a>
								</li>
							</ul>
							<form method="POST" action="<?= base_url('dashboard/seller/updateDataProduk') ?>" novalidate enctype="multipart/form-data">
							
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
										<label for="nama_tag">ID Unik :</label>
										<input name="id_unik" readonly class="form-control m_id_unik" required/>
										<br>
										<label for="nama_tag">ID Produk :</label>
										<input name="id_produk" readonly class="form-control m_id" required/>
										<br>
										<label for="nama_tag">Nama Produk :</label>
                    <input name="nama" type="text" class="form-control m_nama" required />
										<br>
										<label for="nama_tag">Keterangan Produk :</label>
                    <input name="keterangan" type="text" class="form-control m_keterangan" required />
										<br>
										<label for="kategori">Kategori Produk :</label>
										<span style="width: 100%;">
											<select required id="kategori" name="kategori" class="form-control m_id_cat">
												<option value=""> Pilih </option>
												<?php foreach ($cat as $key) : ?>
													<option value="<?= $key['id_cat'] ?>" class="select_id_cat"><?= $key['nama_cat'] ?></option>
												<?php endforeach; ?>
											</select>
										</span>
										<br>
										<br>
										<label for="ukuran">Ukuran Tersedia :</label>
										<span style="width: 100%;" class="select2-container">
											<select required multiple="multiple" name="ukuran[]" class="form-control ukuran">
												<option value="all size" selected>all size</option>
												<option value="XS" class="m_xs">XS</option>
												<option value="S" class="m_s">S</option>
												<option value="M" class="m_m">M</option>
												<option value="L" class="m_l">L</option>
												<option value="XL" class="m_xl">XL</option>
												<option value="XXL" class="m_xxl">XXL</option>
											</select>
										</span>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
										<label for="stok">Stok Barang :</label>
                    <input name="stok" type="number" class="form-control m_stok" required />
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
										<label for="harga">Harga :</label>
                    <input name="harga" type="number" class="form-control m_harga" required />
										<br>
										<label for="diskon">Diskon :</label>
                    <input name="diskon" type="number" class="form-control m_diskon" required />
									</div>
									<div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
										<div class='col-sm-12'>
											Foto Utama
											<div class="form-group">
												<div class='input-group' id='foto_utama'>
													<input type="file" name="foto" class="form-control"/>
													<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
															</span>
												</div>
											</div>
										</div>
										<div class='col-sm-12'>
											Foto Tambahan
											<div class="form-group">
												<div class='input-group' id='foto_tambahan'>
													<input type="file" name="foto1" class="form-control"/>
													<span class="input-group-addon">
															<span class="glyphicon glyphicon-calendar"></span>
															</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="col-md-12 text-center">
									<button data-dismiss="modal" class="btn btn-secondary">Batal</button>
									<button type="submit" name="submit" class="btn btn-primary">Update Data</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Update data Produk -->

        <!-- footer content -->
        <?php $this->load->view('seller/_partials/seller_footer'); ?>
        <!-- /footer content -->
      </div>
	</div>
	<?php $this->load->view('seller/_partials/seller_js') ?>
	<!-- Datatables -->
	<script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/pdfmake/build/pdfmake.min.js"></script>
		<script src="<?= base_url('assets/gentelella/') ?>vendors/pdfmake/build/vfs_fonts.js"></script>
		<!-- Select2 -->
		<script src="<?= base_url('assets/gentelella/') ?>vendors/select2/dist/js/select2.full.min.js"></script>
		<script>
			$('.select2-container1').select2();
			function set_url(id) {
				$('.fixHapus').attr('href', id);
			}
			$(document).ready(function() {

				$('.ukuran').select2({
					allowClear:true,
					placeholder: 'all size',
				});

				$('#kt_modal_1').on('show.bs.modal', function (e) {
					let triggerLink = $(e.relatedTarget);
					let id = triggerLink.data('href');
					let ket = triggerLink.data('ket');
					$('.fixHapus').attr('href', id);
					$('#ket_modal').text('Anda yakin ingin ' + ket + ' data produk ini?');
				});

				$('.modal-update').on('show.bs.modal', function (e) {
					let triggerLink = $(e.relatedTarget);
					let id = triggerLink.data('id');
					let id_unik = triggerLink.data('id_unik');
					let id_cat = triggerLink.data('id_cat');
					let nama = triggerLink.data('nama');
					let keterangan = triggerLink.data('keterangan');
					let ukuran = triggerLink.data('ukuran');
					let harga = triggerLink.data('harga');
					let stok = triggerLink.data('stok');
					let diskon = triggerLink.data('diskon');
					$('.ukuran').val(null).trigger('change'); //reset selected
			
					$('.m_id').val(id);
					$('.m_id_unik').val(id_unik);
					$('.m_id_cat').val(id_cat).select();
					// $("div.id_100 select").val("val2");
					$('.m_nama').val(nama);
					$('.m_keterangan').val(keterangan);
					$('.m_ukuran').val(ukuran);
					$('.m_harga').val(harga);
					$('.m_stok').val(stok);
					$('.m_diskon').val(diskon);
					$('.nama-target').text(nama);
					newUkuran = ukuran.split(',');
					// newTag = id_tag.split(',');
					// for (let i of newTag) {
					// 	$(`.m_id_tag option[value="${i}"]`).prop('selected', true)
					// 	// console.log(i)
					// 	// $(".m_id_tag > option").find($(this).val(i)).select();
					// 	// $(".m_id_tag > option").each(function() {
					// 	// 	// console.log($(this).val())
					// 	// 	// console.log(i)
					// 	// 	if($(this).val() === i){
					// 	// 		$(this).val(i).select();
					// 	// 	}
					// 	// });
					// }
					// console.log($('.m_id_tag').val())
					for (let i of newUkuran) {
						// console.log(i)
						let newOption = $("<option selected='selected'></option>").val(i).text(i);
						if (i == 'XS') $('.ukuran').append(newOption).trigger('change');
						else if (i == 'S') $('.ukuran').append(newOption).trigger('change');
						else if (i == 'M') $('.ukuran').append(newOption).trigger('change');
						else if (i == 'L') $('.ukuran').append(newOption).trigger('change');
						else if (i == 'XL') $('.ukuran').append(newOption).trigger('change');
						else if (i == 'XXL') $('.ukuran').append(newOption).trigger('change');
						else $('.ukuran').select2().val('all size').trigger('change');
					}
				});

				$('.btnHapus').on('click', function() {

				});

				$('.btnEdit').on('click', function(){

				})
			});
	</script>
  </body>
</html>
