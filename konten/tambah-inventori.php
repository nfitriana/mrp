
<div id="page-wrapper">
	<div class="container-fluid">
		 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-inbox"></i>  Inventori
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-inbox"></i> <a href="">Inventori</a>
                            </li>
                            <li class="active">
                                Tambah Data Inventori
                            </li>
                        </ol>
                    </div>
                </div>


         <div class="row">
         	<div class="col-lg-12">
         		<div class="panel panel-default">
         			<div class="panel-heading">
                         <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Inventori</h3>
                    </div>
                    <div class="panel-body">
                    	<div class="col-md-8">
                    		<form class="form-horizontal" action="" method="post">
							<fieldset>
							<?php
								include "tambah-inventori-exe.php";

								#memanggil fungsi tammbah inventori
								addinventori($conn);

								if(isset($_GET['edit']) && $_GET['edit']=='success'){
									echo "
									<div class='alert alert-success'>
							  			<button type='button' class='close' data-dismiss='alert'>&times;</button>
							  			<strong>Success</strong> Data inventori bahan baku berhasil di ubah
									</div>";
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
									<button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
									<button name="batal" type="reset" class="btn">Batal</button>
								</div>

							</fieldset>	
							</form>
                    	</div>
                    </div>
         		</div>
         	</div>
         </div>
	</div>
</div>
 
	