<div id="page-wrapper">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <i class="fa fa-list"></i> Estimasi Permintaan Produk
                </h3>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-list"></i> <a href="">Forecast</a>
                    </li>
                    <li class="active">
                        Estimasi Permintaan Produk
                    </li>
                </ol>
                
                <div> <p></p></div>
            </div>
        </div><!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Estimasi Permintaan Produk</h3>
                        </div>
                        <div class="panel-body">
                            <?php
                                include "controlForecast.php";
                                viewForecast($conn);
								
								simpanforecast($conn);
                            ?>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->          
        </div>
</div>
