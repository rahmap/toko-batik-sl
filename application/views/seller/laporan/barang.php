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
        <!-- PNotify -->
    <link href="<?= base_url('assets/gentelella/') ?>vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?= base_url('assets/gentelella/') ?>vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
        <div class="right_col" role="main"> <!-- Mulai Konten -->
					<div class="">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">

                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron text-center">
                      <!-- <h1>Hello, world!</h1> -->
                      <p class="text-center">Pemilik dapat mencetak laporan barang yang terjadi pada toko.</p>
                        <button class="btn btn-success source btnSemua" onclick="new PNotify({
                                    title: 'Semua Data',
                                    text: 'Menampilkan semua data penjualan yang telah terjadi!',
                                    type: 'success',
                                    styling: 'bootstrap3'
                                });">Semua</button>

                        <button id="reportrange" class="btn btn-info source" onclick="new PNotify({
                                        title: 'Data Khusus',
                                        text: 'Menampilkan data dengan tanggal tertentu.',
                                        styling: 'bootstrap3'
                                    });">Custome</button>
                      <h6 class="text-center" id="ketDateRange">Menampilkan semua data barang.</h6>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Barang </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable-barang" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">Tanggal</th>
                          <th>Nama Produk</th>
                          <th style="width: 25%">Penjualan</th>
                          <th>Total Produk Terjual</th>
                        </tr>
                      </thead>

                      <tbody id="data-lap-barang">
                        <?php foreach($laporan as $item): ?>
                        <tr>
                          <td class="text-center"><?= $item['tanggal_selesai'] ?></td>
                          <td ><?= $item['nama_orders'] ?></td>
                          <td ><?= $item['jumlah_perhari'] ?> penjualan</td>
                          <td><?=$item['tot_barang']  ?> item</td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
					</div>
        </div> <!-- Selesai Konten -->
        <!-- /page content -->

        <!-- footer content -->
        <?php $this->load->view('seller/_partials/seller_footer'); ?>
        <!-- /footer content -->
      </div>
	</div>
  <?php $this->load->view('seller/_partials/seller_js') ?>
  <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
    <!-- PNotify -->
    <script src="<?= base_url('assets/gentelella/') ?>vendors/pnotify/dist/pnotify.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/gentelella/') ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
      
      $(document).ready(function() {
		    init_daterangepicker_barang(); // laporan Barang
        let from_date, to_date

        $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
          from_date = picker.startDate.format('MMMM D, YYYY');
          to_date = picker.endDate.format('MMMM D, YYYY');
        });

        $('.btnSemua').click(function(){
          from_date = null;
          to_date = null;
          $.ajax({  
            url: "<?= base_url() ?>" + 'dashboard/seller/setRangeBarang',  
            method:'POST',
            data: {
              from_date: from_date,
              to_date: to_date
            },  
            success:function(data)  
            {  
              $('#datatable-barang').DataTable().destroy();
              $('#data-lap-barang').html(data);  
              $('#datatable-barang').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                  'excel', 'pdf', 'print','csv'
                ]
              });
            }
          })
        })

        $('.btnSemua').click(function(){
          $('#ketDateRange').text('Menampilkan semua data barang.');
        })  

        $('.ui-pnotify').remove();
        $('#datatable-barang').DataTable( {
          dom: 'Bfrtip',
          buttons: [
            'excel', 'pdf', 'print','csv'
          ]
        });
      });
    </script>
  </body>
</html>