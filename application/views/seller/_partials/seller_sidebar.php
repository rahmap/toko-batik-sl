<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

	<div class="menu_section">
	<h3>General</h3>
	<ul class="nav side-menu">
	<li><a href="<?= base_url('dashboard/seller') ?>"><i class="fa fa-bars"></i> Dashboard </a>
		<li><a><i class="fa fa-edit"></i> Data Produk <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="<?= base_url('dashboard/seller/data_product') ?>">List Produk</a></li>
			<li><a href="<?= base_url('dashboard/seller/add_product') ?>">Tambah Produk</a></li>
		</ul>
		</li>
		<li><a><i class="fa fa-desktop"></i> Data Orders <span class="fa fa-chevron-down"></span></a>
		<ul class="nav child_menu">
			<li><a href="<?= base_url('dashboard/seller/data_orders') ?>">List Orders</a></li>
			<li><a href="<?= base_url('dashboard/seller/orders_pengiriman') ?>">Orders (pengiriman)</a></li>
			<li><a href="<?= base_url('dashboard/seller/orders_done') ?>">Orders (sudah selesai)</a></li>
		</ul>
		</li>
	</ul>
	</div>
	<div class="menu_section">
	<h3>Akun</h3>
	<ul class="nav side-menu">
		<li><a href="<?= base_url('dashboard/seller/pengaturan') ?>"><i class="fa fa-bug"></i> Pengaturan</span></a>
		</li>
	</ul>
	</div>

</div>