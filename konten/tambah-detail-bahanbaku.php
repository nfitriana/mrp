
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
										<div class="col-md-6">
												<form class="form-horizontal" action="" method="post">
													<fieldset>
														<?php
															include "controlDetailBahanBaku.php";
															adddetailbhnbaku($conn);
														?>
														<!--<div class="form-group">
															<label class="col-md-4" "control-label" for="komponen">Pilih Komponen</label>
															<?php
																#$query=mysqli_query($conn, "SELECT * FROM tbkomponen ORDER BY idKomponen ASC")or die(mysqli_error());
																#	echo "<select class='form-control' name='komponen[]'>";
																#		echo "<option value=''>Pilih Komponen</option>";
																#			
																#		while($data=mysqli_fetch_array($query)){
																#			echo "<option value='" . $data['idKomponen'] . "'>" . $data['nmKomponen'] . "</option>";
																#		}
																#		echo "</select>";
															?>
														</div>-->
										</div> <!--col-6-->
										
														<div class="col-md-12">
															<table class="table table-hover">
															<thead>
																<tr>
																	<th>Komponen</th>
																	<th>Bahan Baku</th>
																	
																</tr>
															</thead>
															<tbody>
																<?php
																	if (isset($_POST['jmlkomp'])) {
																		for($a=0; $a<$_POST['jmlkomp']; $a++){
																	
																	
																?>
																

																<tr>
																	<td>
																		<div class="form-group">
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
																	</td>
																	
																	<td>
																		<div class="form-group">
																			<?php
																				
																					$query=mysqli_query($conn,"SELECT * FROM tbbahanbaku ORDER BY idBhnBaku ASC")or die(mysqli_error());
																				
																						echo"<select class='form-control' name='bhnbaku[]'>";
																							echo "<option value=''>Pilih Bahan Baku</option>";

																						while ($data=mysqli_fetch_array($query)) {
																							echo "<option value='" . $data['idBhnBaku'] . "'>" . $data['nmBhnBaku'] . "</option>";		
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
																
																<?php
																		}
																	}
																?>
																<input type="hidden" name="jumlah" value="<?php echo $_POST['jmlkomp']; ?>"> 
															</tbody>
														</table>

														</div>
														
														<div class="form-actions">
															<button type="submit" name="simpan" class="btn btn-primary">
																Simpan
															</button>
														</div>
													</fieldset>
												</form>
																	
										
										
									</div><!-- col 12-->
									
								</div><!-- /.panel-body-->
							</div><!-- /.panel panel-default-->
		</div><!-- /.col 12-->
	</div><!-- row -->
</div><!-- page.wrapper -->

