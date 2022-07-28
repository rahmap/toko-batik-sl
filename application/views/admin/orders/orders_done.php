<!DOCTYPE html>
<html lang="en">
  <head>
	<?php $this->load->view('admin/_partials/admin_header') ?>
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
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('home') ?>" class="site_title"><i class="fa fa-shopping-basket"></i> <span> Batik Store</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info & nama toko -->
				<?php $this->load->view('admin/_partials/admin_pp') ?>
            <!-- /menu profile quick info & nama toko -->

            <br/>

            <!-- sidebar menu -->
			<?php $this->load->view('admin/_partials/admin_sidebar') ?>
            <!-- /sidebar menu -->

          </div>
        </div>
        <!-- top navigation -->
		<?php $this->load->view('admin/_partials/admin_topnav') ?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"> <!-- Mulai Konten -->
					<div class="">
						<div class="row top_tiles">
						<div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="tile-stats">
							<div class="icon"></div>
							<div class="count"><?= $totSelesai ?></div>
							<h3>Jumlah Pesanan Sudah Selesai (barang sudah di terima pelanggan).</h3>
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
										<h2>Data Pemesanan Sudah Selesai</h2>
										<ul class="nav navbar-right panel_toolbox">
											<li><a class="collapse-link" style="margin-right:10px;"><i class="fa fa-chevron-up"></i></a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<div class="x_content">
										<p class="text-muted font-13 m-b-30">
											Data Pesanan Sudah Selesai (barang sudah di terima pelanggan).
										</p>
										<table id="tbl_pengiriman" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable-keytable_info" style="position: relative;">
											<thead>
												<tr>
													<th>ID</th>
													<th>Nama Pelanggan</th>
													<th class="text-center">Tanggal Order</th>
													<th >Total Belanja</th>
													<th class="text-center">Resi</th>
													<th class="text-center">Keterangan</th>
													<th class="text-center noExport">Aksi</th>
												</tr>
											</thead>

											<tbody>
											<?php foreach($orders as $item): ?>
												<tr class="text-center">
													<td><?= $item['id_orders'] ?></td>
													<td><?= $item['nama'] ?></td>
													<td><?= date('d/m/Y H:i', $item['tanggal_order']); ?></td>
													<td>Rp <?= number_format($item['gross_amount'], 0, ',', '.') ?></td>
													<td class="text-center"><?= $item['nomer_resi'] ?></td>
													<td><?= $item['status_pengiriman'] ?></td>
													<td class="text-center">
														<a href="" class="text-info sett_detail" 
														data-toggle="modal" 
														data-target=".modal-detail"

														data-id_target="<?= $item['id_orders'] ?>"

														data-kurir="<?= $item['kurir'] ?>"
														data-service="<?= $item['service'] ?>"
														data-estimasi="<?= $item['estimasi'] ?>"
														data-nama_penerima="<?= $item['nama_penerima'] ?>"

														data-alamat="<?= $item['alamat_pengiriman'] ?>"
														data-kode_pos="<?= $item['kode_pos'] ?>"
														data-telefon="<?= $item['no_penerima'] ?>"
														data-berat="<?= $item['berat'] ?>"

														data-tot_ongkir="<?= $item['total_ongkir'] ?>"
														data-tot_barang="<?= $item['total_harga_barang'] ?>"
														data-tot_all="<?= $item['gross_amount'] ?>"
														data-dibayar_pada="<?= $item['settlement_time'] ?>"
														>
															Detail Pesanan
														</a>
													</td>
												</tr>
											<?php  endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
            </div>
					</div>
        </div> <!-- Selesai Konten -->
				<!-- /page content -->
        <!-- Large modal -->
        <div class="modal fade modal-detail" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">

							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Detail Pemesanan <span class="text-danger id-target"></span></h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<table class="table">
										<thead>
											<tr>
												<th>Kurir</th>
												<th>Service</th>
												<th>Esimasi</th>
												<th>Nama Penerima</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="kurir"></td>
												<td class="service"></td>
												<td class="estimasi"></td>
												<td class="nama_penerima"></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="row">
									<table class="table">
										<thead>
											<tr>
												<th>Alamat Pengiriman</th>
												<th>Kode Pos</th>
												<th>Telefon</th>
												<th>Berat</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="alamat"></td>
												<td class="kode_pos"></td>
												<td class="telefon"></td>
												<td class="berat"></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="row">
									<table class="table">
										<thead>
											<tr>
												<th>Total Ongkir</th>
												<th>Total Barang</th>
												<th>Total</th>
												<th>Dibayar Pada</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="tot_ongkir"></td>
												<td class="tot_barang"></td>
												<td class="tot_all"></td>
												<td class="dibayar_pada"></td>
											</tr>
										</tbody>
									</table>
									<table class="table" id="tblItem">
									</table>
									<div class="col text-center">
										<button class="btn btn-info source" id="lihatItem">Lihat Item</button>
										<button class="btn btn-info source" id="hideItem" style="display: none;">Sembunyikan</button>
									</div>
								</div>
							</div>
							<div class="modal-footer">
							</div>
						</div>
					</div>
				</div>
				<!-- Large modal -->
        
        <!-- footer content -->
        <?php $this->load->view('admin/_partials/admin_footer'); ?>
        <!-- /footer content -->
      </div>
	</div>
	<?php $this->load->view('admin/_partials/admin_js') ?>
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
			$(document).ready(function(){
				var id_orders;
				$('#tbl_pengiriman').DataTable()

				$('.sett_detail').on('click', function(){
					$('.id-target').text($(this).data('id_target'));
					id_orders = $(this).data('id_target');
					$('.kurir').text($(this).data('kurir'));
					$('.service').text($(this).data('service'));
					$('.estimasi').text($(this).data('estimasi'));
					$('.nama_penerima').text($(this).data('nama_penerima'));

					$('.alamat').text($(this).data('alamat'));
					$('.kode_pos').text($(this).data('kode_pos'));
					$('.telefon').text($(this).data('telefon'));
					$('.berat').text($(this).data('berat') + ' Gram');

					$('.tot_ongkir').text('Rp ' + formatMoney($(this).data('tot_ongkir')));
					$('.tot_barang').text('Rp ' + formatMoney($(this).data('tot_barang')));
					$('.tot_all').text('Rp ' + formatMoney($(this).data('tot_all')));
					$('.dibayar_pada').text(($(this).data('dibayar_pada') == '')? 'PENDING' : $(this).data('dibayar_pada') );
					$('#lihatItem').click(function(){
						console.log(id_orders);
         		 $.ajax({  
							url: "<?= base_url() ?>" + 'dashboard/admin/setOrderItem',  
							method:'POST',  
							data: {id_orders:id_orders},  
							success:function(data)  
							{  
								$('#tblItem').html(data);
								$('#tblItem').show();
								$('#lihatItem').hide();
								$('#hideItem').show();
							}
						})
					})
				})

				$('.modal-detail').on('hidden.bs.modal', function (e) {
					$('#tblItem').hide();
					$('#lihatItem').show();
					$('#hideItem').hide();
				})

				$('#hideItem').click(function(){
					$('#tblItem').hide();
					$('#lihatItem').show();
					$('#hideItem').hide();
				})

				function formatMoney(amount, decimalCount = 0, decimal = ".", thousands = ".") {
					try {
						decimalCount = Math.abs(decimalCount);
						decimalCount = isNaN(decimalCount) ? 0 : decimalCount;
				
						const negativeSign = amount < 0 ? "-" : "";
				
						let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
						let j = (i.length > 3) ? i.length % 3 : 0;
				
						return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
					} catch (e) {
						console.log(e)
					}
				}

			})
		</script>
  </body>
</html>