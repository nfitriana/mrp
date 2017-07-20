<script type="text/javascript">
	$(document).ready(function() {
    $("#tglpesan").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true
    });
  });

	$(document).ready(function() {
    $( "#tglambil" ).datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true
    });
  });
</script>

	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-fw fa-shopping-cart"></i>Edit Data Pesanan</h3>
		</div>
	</div><!--/.row--> 
 
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-fw fa-shopping-cart"></i> Edit Data Pesanan</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form class="form-horizontal" action="" method="post">
							<fieldset>
							<?php
								include "controlPemesanan.php";

								if(isset($_GET['id'])){
									$kdnota =  $_GET['id'];
									$detailpsn = detailPesanan($conn, $kdnota);

								}
							
								           

								if(isset($_POST['ubah'])){
									$kdnota	= $_POST['kdpemesanan'];
									$nmplg 	= $_POST['nmpelanggan'];
									$almt 	= $_POST['almt'];
									$produk	= $_POST['produk'];
									$jml 	= $_POST['jml'];
									//$tglpsn = $_POST['tglpesan'];
									//$tglterima= $_POST['tglditerima'];

									function ubahformatTgl($tanggal){
										$pisah = explode('/',$tanggal);
										$urutan= array($pisah[2],$pisah[1],$pisah[0]);
										$satukan= implode('-', $urutan);
										return $satukan;
									}

									$tglpesan = $_POST['tglpesan'];
									//menggunakan function ubahFormatTgl
									$ubhtglpesan = ubahformatTgl($tglpesan);

									//$tglambil = $_POST['tglditerima'];
									//$ubhtglambil = ubahformatTgl($tglambil);
								
									editpesanan($conn, $kdnota, $nmplg, $almt, $produk, $jml, $ubhtglpesan);
								}
							?>
								<div class="form-group">
									<label class="col-md-4" "control-label" for="kodepemesanan">Kode Pemesanan</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="kdpemesanan" value="<?php echo $detailpsn[0]; ?>" readonly>
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4" "control-label" for="nmpelanggan">Nama Pelanggan</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="nmpelanggan" value="<?php echo $detailpsn[1]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="alamat">Alamat</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="almt" value="<?php echo $detailpsn[2]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="produk">Produk</label>
									<div class="col-md-8">
										<input type ="text" class="form-control" name="produk" value="<?php echo $detailpsn[3]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="jml">Jumlah</label>
									<div class="col-md-8">
										<input type="text" name="jml" class="form-control" value="<?php echo $detailpsn[4]; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="tglpesan">Tanggal Pesan</label>
									<div class="col-md-8">
										<input type="text" name="tglpesan" id="tglpesan" class="form-control" value="<?php echo $detailpsn[5]; ?>">
									</div>
								</div>


								<div class="form-actions">
									<button name="ubah" type="submit" class="btn btn-primary">Simpan</button>
									<button name="batal" type="reset" class="btn">Batal</button>
								</div>

							</fieldset>
								
								
																
								
							</form>
						</div><!-- col-md-6 -->
					</div><!-- /.panel-body-->
				</div><!-- /.panel panel-default-->
			</div><!-- /.col-->
		</div><!-- /.row -->
</div>