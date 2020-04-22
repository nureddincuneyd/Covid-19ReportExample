<?php 
include 'header.php';
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Starting Record</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active">Data Record</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Default box -->
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Country Covid Data Recording</h3>

				<div class="card-tools">
					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
						<i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
							<i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">


						<?php 

						try{


							$fileUrl = "https://corona.lmao.ninja/v2/countries?sort=country";

							$data = file_get_contents($fileUrl);

							$dataArray = json_decode($data, true);

							foreach ($dataArray as $row) {

								$recData = "INSERT INTO covidData(ctryCode, cases, deaths, recovered, tests) VALUES('".$row["countryInfo"]["iso3"]."','".$row["cases"]."','".$row["deaths"]."','".$row["recovered"]."','".$row["tests"]."')";

								$conn->exec($recData);

								echo "Recorded Country Code : ".$row["countryInfo"]["iso3"].", ";

							}
							echo "Country Record Succesfuly";
						}catch(PDOException $e){

							echo "Country Data Record Error =  ".$e->getMessage();
						}


						?>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						
					</div>
					<!-- /.card-footer-->
				</div>
				<!-- /.card -->

			</section>
			<!-- /.content -->
			<!-- Main content -->
			<section class="content">

				<!-- Default box -->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">World Covid Data Recording</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
								<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
									<i class="fas fa-times"></i></button>
								</div>
							</div>
							<div class="card-body">

								<?php 

								try {

									foreach ($dataArray as $row1) {

										$allCases = $allCases + $row1["cases"];
										$allDeaths = $allDeaths + $row1["deaths"];
										$allRecovered = $allRecovered + $row1["recovered"];
										$allTests = $allTests + $row1["tests"];
										$counter++;
									}

									$sumWorldDataRec = "INSERT INTO sumWorld(worldCases, worldDeaths, worldRecovered, worldTests) VALUES(".$allCases.",".$allDeaths.",".$allRecovered.",".$allTests.")";

									if ($conn->exec($sumWorldDataRec)) {
										echo "Recorded Country Count: ".$counter;
									}

									$conn=null;

								} catch (Exception $e) {
									echo "World Data Record Error = ".$e->getMessage();
								}

								?>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">

							</div>
							<!-- /.card-footer-->
						</div>
						<!-- /.card -->

					</section>
					<!-- /.content -->







				</div>
				<!-- /.content-wrapper -->





				<?php
				include 'footer.php';
				?>