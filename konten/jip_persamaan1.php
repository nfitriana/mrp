<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Jip</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-8">
						<h2>Step ke-1 Mencari persamaan b<sub>n</sub></h2>
						<br />
						
						<?php
							include "controlJip_perssamaan.php";

							persamaanpertama($conn);
							
						?>
				</div><!-- col-md-6 -->
			</div><!-- /.panel-body-->
		</div><!-- /.panel panel-default-->
	</div><!-- /.col-->
</div><!-- /.row -->