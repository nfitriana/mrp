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
										case 'edit_inventori': include "konten/edit-inventori.php";
											# code...
											break;
										case 'purchase_order': include "konten/tambah-pemesanan.php";
											# code...
											break;
										case 'daftar_purchase_order': include "konten/daftar-pemesanan.php";
											# code...
											break;
										case 'edit_pesanan': include "konten/edit-pemesanan.php";
											#code...
											break;
										case 'edit_produk': include "konten/edit-produk.php";
											# code...
											break;
										case 'edit_komponen': include "konten/edit-komponen.php";
											# code...
											break;
										case 'edit_bhnbaku': include "konten/edit-bahan-baku.php";
											# code...
											break;
										/*case 'bom': include "konten/test.php";
											# code...
											break; */
										/*case 'daftar_item_persediaan': include "konten/daftar-item-persediaan.php";
											# code...
											break; */
										/*case 'tambah_daftar_item': include "konten/tambah-daftar-item.php";
											# code...
											break; */
										case 'forecast': include "konten/forecast-produk.php";
											# code...
											break;
										case 'lap_forecast': include "konten/lap-forecast.php";
											# code...
											break;
										case 'data_bhnbaku': include "konten/daftar-bahan-baku.php";
											break;
										case 'tambah_bhnbaku': include "konten/tambah-data-bahan-baku.php";
											# code...
											break;
										case 'data_komponen': include "konten/daftar-komponen.php";
											# code...
											break;
										case 'tambah_komponen': include "konten/tambah-data-komponen.php";
											# code...
											break;
										case 'data_produk': include "konten/daftar-produk.php";
											break;
										case 'tambah_produk': include "konten/tambah-produk.php";
											# code...
											break;
										case 'detail_komponen': include "konten/tambah-detail-komponen.php";
											# code...
											break;
										case 'add_jmlbhnbaku': include "konten/add-jml-bhnbaku.php";
											# code...
											break;
										case 'detail_bhnbaku': include "konten/tambah-detail-bahanbaku.php";
											# code...
											break;
										case 'jip': include "konten/jip_persamaan0.php";
											# code...
											break;
										/*case 'persamaan_0' : include "konten/jip_persamaan0.php";
											break;*/
										case 'persamaan_1' : include "konten/jip_persamaan1.php";
											break;
										case 'persamaan_2' : include "konten/jip_persamaan2.php";
											break;
										case 'persamaan_3' : include "konten/jip_persamaan3.php";
											break;
										case 'persamaan_4' : include "konten/jip_persamaan4.php";
											break;
										case 'multiple_input': include "konten/coba-input-multiple.php";
											# code...
											break;
										default: include "konten/dashboard.php";
											# code...
											break;
									}

									/*$persamaan=(isset($_GET['persamaan']))?$_GET['persamaan']:"main";
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
										}*/
							?>
						</div>
					</div>
				</div>
			</div>
</div><!--/.row-->