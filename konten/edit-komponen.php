
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa-fw fa-shopping-cart"></i>Edit Data Komponen</h3>
		</div>
	</div><!--/.row--> 
 
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-fw fa-shopping-cart"></i> Edit Data Komponen</h3>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form class="form-horizontal" action="" method="post">
							<fieldset>
							<?php
								include "controlKomponen.php";

								if(isset($_GET['id'])){
									$idkomponen =  $_GET['id'];
									$detailkomponen = detailkomponen($conn, $idkomponen);

								}

								
								if(isset($_POST['ubah'])){
									$kdkomponen = $_POST['idkomponen'];
									$nmkomponen = $_POST['nmkomponen'];
									$lvl 		= $_POST['lvl'];
									$jmlbutuh 	= $_POST['jml'];
									$jmlinv 	= $_POST['jmlinv'];
									$leadtime 	= $_POST['leadtime'];
									$sumber 	= $_POST['sumber'];

									editkomponen($conn, $kdkomponen, $nmkomponen, $lvl, $jmlbutuh, $jmlinv, $leadtime, $sumber);
								}
							
							?>
								<div class="form-group">
									<label class="col-md-4" "control-label" for="kodekomponen">Kode Komponen</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="idkomponen" value="<?php echo $detailkomponen[0]; ?>" readonly>
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4" "control-label" for="namakomponen">Nama Komponen</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="nmkomponen" value="<?php echo $detailkomponen[1]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="levelkomponen">Level Komponen</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="lvl" value="<?php echo $detailkomponen[2]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="jmldibutuhkan">Jumlah Dibutuhkan</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="jml" value="<?php echo $detailkomponen[3]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="jmlinventori">Jumlah Inventori</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="jmlinv" value="<?php echo $detailkomponen[4]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="leadtime">Lead Time</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="leadtime" value="<?php echo $detailkomponen[5]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="sumber">Sumber</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="sumber" value="<?php echo $detailkomponen[6]; ?>">
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