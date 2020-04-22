<?php 
include 'header.php';

$countryCode = $_GET["iso3"];

try {
	
	$sql = "SELECT countryList.ctryName, cases, deaths, recovered, tests, recordDate 
	FROM covidData
	LEFT JOIN countryList
	ON covidData.ctryCode = countryList.ctryCode
	WHERE covidData.ctryCode ='".$countryCode."'";

	$getCountryNameSQL = $conn->prepare("SELECT countryList.ctryName FROM countryList
		LEFT JOIN covidData
		ON covidData.ctryCode = countryList.ctryCode
		WHERE covidData.ctryCode = '".$countryCode."' LIMIT 1");

	$getCountryNameSQL->execute();

	//$resCountryNameSQL = $getCountryNameSQL->setFetchMode(PDO::FETCH_ASSOC);

	$resCountryNameSQL=$getCountryNameSQL->fetchColumn();


} catch (Exception $e) {
	echo "Process failed: " . $e->getMessage();
}
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Country Report</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Focused Country Data</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">

		<!-- Default box -->
		<div class="card collapsed-card">
			<div class="card-header">
				<h3 class="card-title">Click plus icon for Country Graph</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-plus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">

						<canvas id="myChart"></canvas>

						<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.js"></script>
						<script src="https://chart-js.com/javascript/chart-barfunnel.js"></script>


						<script type="text/javascript">
							var ctx = document.getElementById('myChart');
							var myRadarChart = new Chart(ctx, {
								"type":"radar",
								"data":{
									"labels":["Active","Total Cases","Deaths","Recovered","Tests"],
									"datasets":[{
										"label":"CountryCode(TUR)","data":[65,59,90,81,56],"fill":true,"backgroundColor":"rgba(255, 99, 132, 0.2)","borderColor":"rgb(255, 99, 132)","pointBackgroundColor":"rgb(255, 99, 132)","pointBorderColor":"#fff","pointHoverBackgroundColor":"#fff","pointHoverBorderColor":"rgb(255, 99, 132)"}
										,{"label":"World Infection Rate","data":[28,48,40,19,96],"fill":true,"backgroundColor":"rgba(54, 62, 235, 0.2)","borderColor":"rgb(54, 62, 235)","pointBackgroundColor":"rgb(54, 62, 235)","pointBorderColor":"#fff","pointHoverBackgroundColor":"#fff","pointHoverBorderColor":"rgb(54, 62, 235)"}
										,{"label":"Selected Second Country","data":[68,15,24,30,70],"fill":true,"backgroundColor":"rgba(54, 162, 235, 0.2)","borderColor":"rgb(54, 162, 235)","pointBackgroundColor":"rgb(54, 162, 235)","pointBorderColor":"#fff","pointHoverBackgroundColor":"#fff","pointHoverBorderColor":"rgb(54, 162, 235)"}]
									},"options":{
										"elements":{
											"line":{
												"tension":0,"borderWidth":3}
											}
										}
									});
								</script>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								Footer
							</div>
							<!-- /.card-footer-->
						</div>
						<!-- /.card -->

					</section>
					<!-- /.content -->

					<!-- Main content -->
					<section class="content">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Selected Country : <?php echo $resCountryNameSQL; ?></h3>

										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-warning" style="margin-left: 15px;">
											Information
										</button>
										<div class="modal fade" id="modal-warning">
											<div class="modal-dialog">
												<div class="modal-content bg-warning">
													<div class="modal-header">
														<h4 class="modal-title">Time Zone Information</h4>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body">
															<p>Server location Ohio! Data record time zone is Ohio Time Zone&hellip;</p>
														</div>
														<div class="modal-footer justify-content-between">
															<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
														</div>
													</div>
													<!-- /.modal-content -->
												</div>
												<!-- /.modal-dialog -->
											</div>
											<!-- /.modal -->
										</div>


										<!-- /.card-header -->
										<div class="card-body">
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>Active</th>
														<th>Cases</th>
														<th>Deaths</th>
														<th>Recovered</th>
														<th>Tests</th>
														<th>Record Date</th>
													</tr>
												</thead>

												<tbody>
													<?php 


/*
									$resu = $conn->prepare("SELECT countryList.ctryName, cases, deaths, recovered, tests, recordDate 
										FROM covidData
										LEFT JOIN countryList
										ON covidData.ctryCode = countryList.ctryCode
										WHERE covidData.ctryCode ='".$countryCode."'");
									$resu->execute();

									$results = $resu->setFetchMode(PDO::FETCH_ASSOC);
*/
									foreach ($conn->query($sql) as $row) {
										

										?>
										<tr>
											<td><?php echo $row["cases"]-$row["deaths"]-$row["recovered"]; ?></td>
											<td><?php echo $row["cases"]; ?></td>
											<td><?php echo $row["deaths"]; ?></td>
											<td><?php echo $row["recovered"]; ?></td>
											<td><?php echo $row["tests"]; ?></td>
											<td><?php echo $row["recordDate"]; ?></td>
										</tr>
										<?php 
									}

									$conn = null;
									?>
								</tbody>

								<tfoot>
									<tr>
										<th>Active</th>
										<th>Cases</th>
										<th>Deaths</th>
										<th>Recovered</th>
										<th>Tests</th>
										<th>Record Date</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->

					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->



	<?php 
	include 'footer.php';
	?>