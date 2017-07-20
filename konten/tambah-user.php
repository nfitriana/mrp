<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Data Pengguna
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Data Pengguna</a>
                            </li>
                            <li class="active">
                                Tambah Data Pengguna
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                	<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
			                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Pengguna</h3>
			                    </div>
								<div class="panel-body">
									<div class="col-md-6">
										<form class="form-horizontal" action="" method="post">
										<fieldset>
											<?php
												include "controlUser.php";

												#memanggil fungsi adduser
												adduser($conn); 
												
											?>
											<div class="form-group">
												<label class="col-md-4" "control-label" for="namapengguna">Nama Pengguna</label>
												<div class="col-md-8">
													<input type="text" name="nmpengguna" class="form-control" placeholder="Nama Pengguna">
												</div>
												
											</div>
											
											<div class="form-group">
												<label class="col-md-4" "control-label" for="password">Password</label>
												<div class="col-md-8">
													<input type="password" name="psswd" class="form-control" placeholder="Password">
												</div>
												
											</div>

											<div class="form-group">
												<label class="col-md-4" "control-label" for="ulangipassword">Ulangi Password</label>
												<div class="col-md-8">
													<input type="password" class="form-control" name="repsswd" placeholder="Ulangi Password">
												</div>
												
											</div>

											<div class="form-group">
												<label class="col-md-4" "control-label" for="level">Level</label>
												<div class="col-md-8">
													<select class="form-control" name="level" id="level">
														<option value="Administrator">Administrator</option>
														<option value="Koordinator Pemesanan">Koordinator Pemesanan</option>
														<option value="Koordinator Gudang">Koordinator Gudang</option>
														<option value="Koordinator Produksi">Koordinator Produksi</option>
													</select>
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

	

