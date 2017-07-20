
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-fw fa-shopping-cart"></i>Edit Data Produk</h3>
		</div>
	</div><!--/.row--> 
 
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-fw fa-shopping-cart"></i> Edit Data Produk</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form class="form-horizontal" action="" method="post">
							<fieldset>
							<?php
								include "controlProduk.php";

								if(isset($_GET['id'])){
									$idproduk =  $_GET['id'];
									$detailproduk = detailProduk($conn, $idproduk);

								}



								if(isset($_POST['ubah'])){
									$idproduk = $_POST['idproduk'];
									$nmproduk = $_POST['nmproduk'];
									$jmlinv	  = $_POST['jmlInv'];
									$leadtime = $_POST['leadtime'];
									$sumber   = $_POST['sumber'];


									editproduk($conn, $idproduk, $nmproduk, $jmlinv, $leadtime, $sumber);
								}
							
							?>
								<div class="form-group">
									<label class="col-md-4" "control-label" for="kodeproduk">Kode Produk</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="idproduk" value="<?php echo $detailproduk[0]; ?>" readonly>
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4" "control-label" for="namaproduk">Nama Produk</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="nmproduk" value="<?php echo $detailproduk[1]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="jmlInv">Jumlah Inventori</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="jmlInv" value="<?php echo $detailproduk[2]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="leadtime">Lead Time</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="leadtime" value="<?php echo $detailproduk[3]; ?>">
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4" "control-label" for="sumber">Sumber</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="sumber" value="<?php echo $detailproduk[4]; ?>">
									</div>
									
								</div>

								<div class="form-actions">
									<button name="ubah" type="submit" class="btn btn-primary">Simpan</button>
									<a href=".?page=detail&content=data_produk"><button name="batal" type="submit" class="btn">Batal</button></a>
								</div>

							</fieldset>
								
								
																
								
							</form>
						</div><!-- col-md-6 -->
					</div><!-- /.panel-body-->
				</div><!-- /.panel panel-default-->
			</div><!-- /.col-->
		</div><!-- /.row -->
</div>