
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Data Bill of Material
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Detail Komponen</a>
                            </li>
                            <li class="active">
                                Tambah Detail Komponen
                            </li>
                        </ol>
                    </div>
        </div>
	</div>

	<div class="row">
		<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
			                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Komponen Produk</h3>
			                    </div>
								<div class="panel-body">
								<div>
									<div class="col-md-6">
										<form class="form-horizontal" action="" method="post">
										<fieldset>
											<?php
												include "controlDetailKomponen.php";
												addkomponen($conn); 
												
											?>


											<div class="form-group">
												<label class="col-md-4" "control-label" for="namaproduk">Produk</label>
												<div class="col-md-8">
													<select class="form-control" name="nmproduk[]">
													<option value=''>Pilih Produk</option>
													<?php
														$query = mysqli_query($conn, "SELECT * FROM tbproduk ORDER BY idProduk ASC")or die(mysqli_error());

														while ($tampil=mysqli_fetch_array($query)) {
															echo "<option value='$tampil[idProduk]'>$tampil[nmProduk]</option>";
														}
													?>
												</select>
												</div>
												
											</div>
									</div><!--div-col-6-->

									<div>
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Komponen</th>
														<th>Jumlah Komponen Dibutuhkan</th>
														<th>Level</th>
														<th>Sumber</th>
													</tr>
												</thead>
												<tbody>
												
													<tr>
														<td>
															<div class="form-group">
																<?php
																	$query=mysqli_query($conn,"SELECT * FROM tbkomponen ORDER BY idKomponen ASC")or die(mysqli_error());
																	
																	echo"<select class='form-control' name='komponen[]'>";
																		echo "<option value=''>Pilih Komponen</option>";

																	while ($data=mysqli_fetch_array($query)) {
																		echo "<option value='" . $data['idKomponen'] . "'>" . $data['nmKomponen'] . "</option>";		
																	}
																	echo "</select>";
																?>	
																
															</div>
														</td>
														<td>
			                                                    <input type="text" class="form-control" name="alamat"> 
														</td>
														<td>
			                                                    <input type="text" class="form-control" name="alamat"> 
														</td>
														<td>
			                                                    <input type="text" class="form-control" name="alamat"> 
														</td>
													</tr>
													<tr>
														<td>
															<div class="form-group">
																<?php
																	$query=mysqli_query($conn,"SELECT * FROM tbkomponen ORDER BY idKomponen ASC")or die(mysqli_error());
																	
																	echo"<select class='form-control' name='komponen[]'>";
																		echo "<option value=''>Pilih Komponen</option>";

																	while ($data=mysqli_fetch_array($query)) {
																		echo "<option value='" . $data['idKomponen'] . "'>" . $data['nmKomponen'] . "</option>";		
																	}
																	echo "</select>";
																?>	
																
															</div>
														</td>
													</tr>

												</tbody>


											</table>

											<div class="form-actions">
												<button type="submit" name="simpan" class="btn btn-primary">
													Simpan
												</button>
											</div>
									</div> <!--col-12-->
										
								</div><!-- col 12-->
										</fieldset>
										
											
																			
											
										</form>
									
								</div><!-- /.panel-body-->
							</div><!-- /.panel panel-default-->
						</div><!-- /.col-->
	</div>
</div>

