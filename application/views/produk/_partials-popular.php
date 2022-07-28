
<nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5" style="background-color: #447DBF !important;">

	<!-- Navbar brand -->
	<span class="navbar-brand text-center align-center">Produk Terlaris</span>


</nav>

<section class="text-center mb-4">

	<!--Grid row-->
	<div class="row wow fadeIn">

		<?php foreach ($popular as $item) : ?>
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
