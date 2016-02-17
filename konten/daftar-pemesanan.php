        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-shopping-cart"></i> Pemesanan
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-list"></i> <a href="">Pemesanan</a>
                            </li>
                            <li class="active">
                                Laporan Pemesanan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Laporan Data Pemesanan</h3>
                            </div>
                            <div class="panel-body">
                                <?php
									include "tambah-pemesanan-exe.php";
									viewpesanan($conn);
								?> 
                            </div><!-- panel-body -->
                        </div><!-- panel default -->
                    </div><!-- col-lg-12 -->
                </div><!-- row --> 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
