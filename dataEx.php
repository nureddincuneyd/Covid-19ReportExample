
<?php 

try {

	$mainChartData = $conn->query("SELECT * FROM sumWorld");

	$i = 0;

	while($dataFetch = $mainChartData->fetch(PDO::FETCH_ASSOC)) {

		$totalCase[$i] = intval($dataFetch["worldCases"]);
		$recDate[$i] = date('Y-m-d', strtotime($dataFetch["wRecordDate"]));
		$i++;

	}
}catch(PDOException $e){
	echo "Process failed: " . $e->getMessage();
}


?>

