<?php 
include 'header.php';

$countryCode = $_GET["iso3"];


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

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Selected Country : <?php echo $countryCode; ?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Coutry ISO3</th>
									<th>Cases</th>
									<th>Deaths</th>
									<th>Recovered</th>
									<th>Tests</th>
									<th>Record Date</th>
								</tr>
							</thead>

							<tbody>
								<?php 
								try{

									$sql = "SELECT countryList.ctryName, cases, deaths, recovered, tests, recordDate 
									FROM covidData
									LEFT JOIN countryList
									ON covidData.ctryCode = countryList.ctryCode
									WHERE covidData.ctryCode ='".$countryCode."'";

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
											<td><?php echo $row["ctryName"]; ?></td>
											<td><?php echo $row["cases"]; ?></td>
											<td><?php echo $row["deaths"]; ?></td>
											<td><?php echo $row["recovered"]; ?></td>
											<td><?php echo $row["tests"]; ?></td>
											<td><?php echo $row["recordDate"]; ?></td>
										</tr>
										<?php 
									}
								}
								catch(PDOException $e) {
									echo "Error: " . $e->getMessage();
								}
								$conn = null;
								?>
							</tbody>

							<tfoot>
								<tr>
									<th>Coutry ISO3</th>
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