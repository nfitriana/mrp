<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Data Komponen
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Data Komponen</a>
                            </li>
                            <li class="active">
                                Daftar Data Komponen
                            </li>
                        </ol>

                        <div class="text-right">
                    <a href=".?page=detail&content=tambah_komponen"><button name="tambah" type="submit" class="btn btn-success">Tambah Data</button></a>
                </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Daftar Komponen</h3>
                            </div>
                            <div class="panel-body">
                                <?php
									include "controlKomponen.php";
									viewkomponen($conn);
								?> 
                            </div><!-- panel-body -->
                        </div><!-- panel default -->
                    </div><!-- col-lg-12 -->
                </div><!-- row --> 	
	</div>
</div>

	