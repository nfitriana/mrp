<div id="page-wrapper">

	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa-fw fa-calendar"></i>  Jadwal Induk Produksi
				</h3>
				<ol class="breadcrumb">
					<li class="active">
						<i class="fa fa-calendar"></i> <a href="">Jadwal Induk Pengguna</a>
					</li>
					<li class="active">
						Tambah Data JIP
					</li>
				</ol>
			</div>
		</div>
		<!-- /.row -->

		<?php
		$persamaan=(isset($_GET['persamaan']))?$_GET['persamaan']:"main";
		switch($persamaan){
			case 'persamaan_0' : include "jip_persamaan0.php";
			break;
			case 'persamaan_1' : include "jip_persamaan1.php";
			break;
			case 'persamaan_2' : include "jip_persamaan2.php";
			break;
			case 'persamaan_3' : include "jip_persamaan3.php";
			break;
			case 'persamaan_4' : include "jip_persamaan4.php";
			break;
		}
		?>
		
	</div>
</div>

	

