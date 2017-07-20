<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-inbox"></i>  Edit Item Persediaan Bahan Baku
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Bill of Materials</a>
                            </li>
                            <li class="active">
                                Edit Data Item Bahan Baku
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
			                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Edit Item Persediaan </h3>
			                </div>
							<div class="panel-body">
								<div class="col-md-6">
									<form class="form-horizontal" action="" method="post">
									<fieldset>
										<?php
											include "controlBom.php";
											additempersediaan($conn);

										?>
										<!--
										<div class="form-group">
											<label class="col-md-4" "control-label" for="kodebom">Kode Bahan Baku</label>
											<div class="col-md-8">
												<input type="text" name="kdbom" class="form-control" value="<?php #echo "$nextNoNota" ?>" readonly>
											</div>
											
										</div>
										-->
										
										<div class="form-group">
											<label class="col-md-4" "control-label" for="idbhnbaku">Kode Bahan Baku</label>
											<div class="col-md-8">
												<input type="text" name="idbhnbaku" id="dataku-idbhnbaku" class="form-control">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="namabahan">Nama Bahan Baku</label>
											<div class="col-md-8">
												<input type="text" name="nmbahan" id="dataku-nmbahan" class="form-control">
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="group">Group</label>
											<div class="col-md-8">
											<?php
												$queryambildata=mysqli_query($conn, "SELECT * FROM tb_group ORDER BY idGroup ASC")or die(mysqli_error());
												
												echo "<select class='form-control' name='group'>";
												echo "<option value='Pilih Grup Produk'></option>";

												while ($tampil=mysqli_fetch_array($queryambildata)) {
													echo "<option value=$tampil[nmGroup]>$tampil[nmGroup]</option>";
												}
												echo "</select>";
											?>
												
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="stockmax">Stock Max</label>
											<div class="col-md-4">
												<input type="text" name="stockmax" class="form-control">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="tersedia">Tersedia</label>
											<div class="col-md-8">
												<input type="text" name="tersedia" class="form-control">
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="dipesan">Dipesan</label>
											<div class="col-md-8">
												<input type="text" name="dipesan" class="form-control">
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="satuan">Satuan</label>
											<div class="col-md-8">
												<input type="text" name="satuan" class="form-control">
											</div>
										</div>

										<div class="form-actions">
											<button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
											<button name="batal" type="reset" class="btn">Batal</button>
										</div>

									</fieldset>									
									</form>
								</div><!-- col-md-6 -->
							</div><!-- /.panel-body-->
						</div><!-- /.panel panel-default-->
					</div><!-- /.col-->
				</div><!-- /.row -->
	</div><!-- container -->
</div><!-- /.page wrapper -->
