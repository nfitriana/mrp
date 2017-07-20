<?php
#include file controlForecast.php
include "controlForecast.php";

?>

<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading --> 
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-shopping-cart"></i>  Estimasi Permintaan Produk
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-shopping-cart"></i> <a href="">Forecast</a>
                            </li>
                            <li class="active">
                                Estimasi Permintaan Produk
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Estimasi Permintaan Produk</h3>
                            </div>
                            <div class="panel-body">
                                
                                    <form class="form-horizontal" action="" method="post">
                                        <fieldset>
                                          
                                            <div class="form-group">
                                                <label class="col-md-2" "control-label" for="kodenota">Kode Forecast</label>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="kdnota">
                                                </div>
                                                
                                            </div>
                                             <?php
                                                addforecast($conn);
                                                simpanforecast($conn);
                                                //viewforecast($conn);
                                            ?>
                                            
                                            <input type="submit" name="simpan" class="btn btn-primary">
                                            <input type="reset" namme="batal" class="btn">

                                        </fieldset>
                                    </form>

                                 
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