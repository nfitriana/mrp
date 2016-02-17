<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa-list"></i> Inventori
				</h3>
				<ol class="breadcrumb">
	                <li class="active">
	                    <i class="fa fa-list"></i> <a href="">Inventori</a>
	                </li>
	                <li class="active">
	                    Laporan Inventori
	                </li>
	            </ol>
			</div>
		</div><!--/.row-->

			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Laporan Data Inventori</h3>
						</div>
						<div class="panel-body">
							<?php
								include "tambah-inventori-exe.php";
								viewinventori($conn);
							?>
						</div>
					</div>
				</div>
			</div><!--/.row-->			
		</div>
</div>
