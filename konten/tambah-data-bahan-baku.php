<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Data Bahan Baku
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href=".?page=detail&content=data_bhnbaku">Data Bahan Baku</a>
                            </li>
                            <li class="active">
                                Tambah Data Bahan Baku
                            </li>
                        </ol>
                    </div>
        </div>

        <div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
			                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Bahan Baku</h3>
			                    </div>
								<div class="panel-body">
									<div class="col-md-6">
										<form class="form-horizontal" action="" method="post">
										<fieldset>
											<?php
												include "controlBahanBaku.php";
												addbhnbaku($conn); 
												
											?>

											<div class="form-group">
												<label class="col-md-4" "control-label" for="idbhnbaku">Kode Bahan Baku</label>
												<div class="col-md-8">
													<input type="text" name="idbhnbaku" class="form-control" placeholder="Kode Bahan Baku">
												</div>
												
											</div>

											<div class="form-group">
												<label class="col-md-4" "control-label" for="namabahanbaku">Nama Bahan Baku</label>
												<div class="col-md-8">
													<input type="text" name="nmbhnbaku" class="form-control" placeholder="Nama Bahan Baku">
												</div>
												
											</div>
											
											<div class="form-group">
												<label class="col-md-4" "control-label" for="level">Level</label>
												<div class="col-md-8">
													<input type="text" name="level" class="form-control" value="Level 2" readonly>
												</div>
												
											</div>
											
											<div class="form-group">
												<label class="col-md-4" "control-label" for="jmldibutuhkan">Jumlah Dibutuhkan (per produk)</label>
												<div class="col-md-8">
													<input type="text" name="jmldibutuhkan" class="form-control" placeholder="Jumlah dibutuhkan">
												</div>
												
											</div>

											<div class="form-group">
												<label class="col-md-4" "control-label" for="jmlInventori">Jumlah Inventori</label>
												<div class="col-md-8">
													<input type="text" name="jmlinv" class="form-control" placeholder="Jumlah Inventori">
												</div>
												
											</div>

											<div class="form-group">
												<label class="col-md-4" "control-label" for="leadtime">Lead Time</label>
												<div class="col-md-8">
													<input type="text" name="leadtime" class="form-control" placeholder="Lead Time">
												</div>
												
											</div>

											<div class="form-group">
												<label class="col-md-4" "control-label" for="sumber">Sumber</label>
												<div class="col-md-8">
													<input type="text" name="sumber" class="form-control" placeholder="Sumber Bahan Baku">
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

	</div>
</div>