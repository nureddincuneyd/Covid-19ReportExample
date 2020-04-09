<?php 
include 'header.php';

try{


	$fileUrl = "https://corona.lmao.ninja/countries?sort=country";

	$data = file_get_contents($fileUrl);

	$dataArray = json_decode($data, true);

	foreach ($dataArray as $row) {

		$recData = "INSERT INTO covidData(ctryCode, cases, deaths, recovered, tests) VALUES('".$row["countryInfo"]["iso3"]."','".$row["cases"]."','".$row["deaths"]."','".$row["recovered"]."','".$row["tests"]."')";

		$conn->exec($recData);

		echo "Recorded Country Code : ".$row["countryInfo"]["iso3"]."<br/>";

	}
	echo "Country Record Succesfuly";
}catch(PDOException $e){

	echo "Country Data Record Error =  ".$e->getMessage();
}


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
		echo "New record created successfully <br/>";
		echo "Recorded Country Count: ".$counter;
	}

	$conn=null;

} catch (Exception $e) {
	echo "sumWorld Record Error = ".$e->getMessage();
}



?>


<?php
include 'footer.php';
?>