
<div id="page-wrapper"> 
	<div class="container-fluid">
		<div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Data Bill of Material
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Detail Bahan Baku</a>
                            </li>
                            <li class="active">
                                Tambah Detail Bahan Baku
                            </li>
                        </ol>
                    </div>
        </div>
	</div>

	<div class="row">
		<div class="col-lg-12">
							<div class="panel panel-default">
								<div class="panel-heading">
			                        <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Bahan Baku Produk</h3>
			                    </div>
								<div class="panel-body">
									<div class="col-md-12">
										<div class="col-md-12">
											<form class="form-horizontal form-inline" action="" method="post">
												<fieldset>
													<?php
														include "controlDetailBahanBaku.php";
														adddetailbhnbaku($conn); 
														
													?>

													<div class="form-group form-action">
														<label "control-label" for="jmlbhnbaku">Jumlah Bahan Baku Komponen</label>
														
															<input type="text" name="jmlkomp" class="form-control" placeholder="Masukkan jumlah bahan baku">
														
															<button name="addbhnbaku" type="submit" class="btn btn-warning">Proses</button>
														
													</div>

													
												</fieldset>
											</form> 

											<form class="form-horizontal" action="" method="post">
												<fieldset>

													<!--<?php
														#include "controlDetailBahanBaku.php";
														adddetailbhnbaku($conn); 
														
													?>-->
													<h4 class="page-header">
							                            Daftar Bahan Baku
							                        </h4>

							                        <div class="form-group">
														<label class="col-md-3" "control-label" for="namaBOM">Nama BOM</label>
														<div class="col-md-4">
															<input type="text" name="nmbom" class="form-control" placeholder="Masukkan Nama BOM">
														</div>
													
													</div>

							                        <div class="form-group">
							                        	<label class="col-md-3" "control-label" for="jmlbhnbaku">Pilih Komponen</label>
							                        	<div class="col-md-4">
							                        		<?php
																$query=mysqli_query($conn, "SELECT * FROM tbkomponen ORDER BY idKomponen ASC")or die(mysqli_error());
																	echo "<select class='form-control' name='komponen[]'>";
																		echo "<option value=''>Pilih Komponen</option>";
																										
																			while($data=mysqli_fetch_array($query)){
																				echo "<option value='" . $data['idKomponen'] . "'>" . $data['nmKomponen'] . "</option>";
																			}
																	echo "</select>";
															?>
							                        	</div>
							                        </div>
														
												
											
											<div class="col-md-12">
												<table class="table table-hover">
													<thead>
														<tr>
															
															<th>Bahan Baku</th>
															<th>Jumlah Dibutuhkan</th>
															<th>Level</th>
															<th>Sumber</th>
																	
														</tr>
													</thead>
													<tbody>

														<?php
															if(isset($_POST['addbhnbaku'])){
																$jmlkomp = $_POST['jmlkomp'];
																for ($a=0; $a < $jmlkomp; $a++) { 
																	# code...

																	echo"<tr>";	
																		echo"<td>";
																			echo"<div class='form-group'>";
																				
																					
																						$query=mysqli_query($conn,"SELECT * FROM tbbahanbaku ORDER BY idBhnBaku ASC")or die(mysqli_error());
																					
																							echo"<select class='form-control' name='bhnbaku[]'>";
																								echo "<option value=''>Pilih Bahan Baku</option>";

																							while ($data=mysqli_fetch_array($query)) {
																								echo "<option value='" . $data['idBhnBaku'] . "'>" . $data['nmBhnBaku'] . "</option>";		
																							}
																							echo "</select>";
																				
																				
																			echo"</div>";
																				echo"</td>";
																				echo"<td>";
									                                                    echo"<input type='text' class='form-control' name=jmlbutuh'>";
																				echo"</td>";
																				echo"<td>";
									                                                    echo"<input type='text' class='form-control' name='level'>";
																				echo"</td>";
																				echo"<td>";
									                                                    echo"<input type='text' class='form-control' name='sumber'>";
																				echo"</td>";
																	echo"</tr>";
																}
															}
														?>
													</tbody>
												</table>
													<div class="form-actions">
														<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
													</div>
											</div>
											</fieldset>
						                        
						                    </form>
										</div>
										</div>					
														
											
										<!--</div>div-col-6-->
									<!--</div>col-md-12-->

								
								</div><!-- /.panel-body-->
							</div><!-- /.panel panel-default-->
		</div><!-- /.col-->
	</div>
</div>

