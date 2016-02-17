
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header">Data Pengguna</h3>
		</div>
	</div><!--/.row-->

	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Edit Data Pengguna</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form class="form-horizontal" action="" method="post">
							<fieldset>
								<?php
									include "tambah-user-exe.php";

									if(isset($_GET['id']) && !empty($_GET['id'])){
										$iduser = $_GET['id'];
										$detail = detailuser($conn, $iduser);
									}
									
									if(isset($_POST['edit'])){
										edituser($conn);
									}
								?>
								<div class="form-group">
									<label class="col-md-4" "control-label" for="namapengguna">Nama Pengguna</label>
									<div class="col-md-8">
										<input type="text" name="nmpengguna" class="form-control" placeholder="Nama Pengguna" value="<?php echo $detail[1]; ?>">
										<input type="hidden" name="id" id="id" value="<?php echo $detail[0]; ?>">
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4" "control-label" for="password">Password</label>
									<div class="col-md-8">
										<input type="password" name="psswd" class="form-control" placeholder="Password" value="">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="ulangipassword">Ulangi Password</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="repsswd" placeholder="Ulangi Password" value="">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="level">Level</label>
									<div class="col-md-8">
										<select class="form-control" name="level" id="level">
											<?php
												$level = array('Administrator' => 'Administrator','Koordinator Pemesanan' => 'Koordinator Pemesanan','Koordinator Gudang' => 'Koordinator Gudang','Koordinator Produksi' => 'Koordinator Produksi');

												$i=0;
												foreach ($level as $levels => $item) {
													echo "<option value='$levels'";
													if($detail[3] == $levels) echo "selected='selected'";
													echo ">$item</option>";

													$i++;
												}
											?>
										</select>
									</div>
									
								</div>

								<div class="form-actions">
									<button name="edit" type="submit" class="btn btn-primary">Simpan</button>
									<a href="?page=detail&content=daftar_user"><button name="batal" type="reset" class="btn">Batal</button></a>
								</div>
 
							</fieldset>
								
								
																
								
							</form>
						</div><!-- col-md-6 -->
					</div><!-- /.panel-body-->
				</div><!-- /.panel panel-default-->
			</div><!-- /.col-->
		</div><!-- /.row -->
</div>