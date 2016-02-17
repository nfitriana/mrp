<div class="row">				
			<div class="col-lg-12">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<div class="canvas-wrapper">
							<?php
								$content=(isset($_GET['content']))?$_GET['content']:"main";
									switch ($content) {
										case 'tambah_user': include "konten/tambah-user.php";
											break;
										case 'daftar_user': include "konten/daftar-user.php";
											break;
										case 'edit_pengguna': include "konten/edit-user.php";
											# code... 
											break;
										case 'tambah_inventori': include "konten/tambah-inventori.php";
											break;
										case 'daftar_inventori': include "konten/daftar-inventori.php";
											# code...
											break;
										case 'edit_inventori': include "konten/edit-inventori.php";
											# code...
											break;
										case 'purchase_order': include "konten/tambah-pemesanan.php";
											# code...
											break;
										case 'daftar_purchase_order': include "konten/daftar-pemesanan.php";
											# code...
											break;
										case 'bom': include "konten/bill-of-materials.php";
											# code...
											break;
										default: include "konten/dashboard.php";
											# code...
											break;
									}
							?>
						</div>
					</div>
				</div>
			</div>
</div><!--/.row-->