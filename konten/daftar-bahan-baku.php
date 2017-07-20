<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Data Bahan Baku
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Data Bahan Baku</a>
                            </li>
                            <li class="active">
                                Daftar Data Bahan Baku
                            </li>
                        </ol>

                        <div class="text-right">
                    <a href=".?page=detail&content=tambah_bhnbaku"><button name="simpan" type="submit" class="btn btn-success">Tambah Data</button></a>
                </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Daftar Bahan Baku</h3>
                            </div>
                            <div class="panel-body">
                                <?php
									include "controlBahanBaku.php";
									viewbahanbaku($conn);
								?> 
                            </div><!-- panel-body -->
                        </div><!-- panel default -->
                    </div><!-- col-lg-12 -->
                </div><!-- row --> 	
	</div>
</div>

	