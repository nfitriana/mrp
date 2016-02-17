
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Data Inventori</h3>
		</div>
	</div><!--/.row-->
 
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Tambah Inventori Bahan Baku</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form class="form-horizontal" action="" method="post">
							<fieldset>
							<?php
								include "tambah-inventori-exe.php";
								$idinv = $_GET['kdbahan'];           
								

								#memanggil fungsi detail inventori
								$detail = detailinventori($conn, $idinv);
								
								if(isset($_POST['ubah'])){
									$idinv 	= $_POST['kdbahan'];
									$nm 	= $_POST['nmbahan'];
									$jml 	= $_POST['jml'];
									$st 	= $_POST['satuan'];
									$tk 	= $_POST['tingkat'];

									editinventori($conn, $idinv, $nm, $jml, $st, $tk);
								}

							?>
								<div class="form-group">
									<label class="col-md-4" "control-label" for="kodebahan">Kode Bahan</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="kdbahan">
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4" "control-label" for="namabahan">Nama Bahan</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="nmbahan" placeholder="Masukkan Nama Bahan">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="jumlah">Jumlah</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="jml" placeholder="Masukkan Jumlah">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="satuan">Satuan</label>
									<div class="col-md-8">
										<select class="form-control" name="satuan" id="level">
											<option value="Meter">Meter</option>
											<option value="Pcs">Pcs</option>
										</select>
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="tingkat">Tingkat</label>
									<div class="col-md-8">
										<input type="text" name="tingkat" class="form-control" placeholder="Masukkan Tingkat">
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