<?php

$servername = "mydbinstance.cf9smmcbedse.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "Painkiller96";

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=covid19", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Country List Record</title>
</head>
<body>

<?php 

$fileUrl = "https://corona.lmao.ninja/countries?sort=country";
$data = file_get_contents($fileUrl);
$dataArray = json_decode($data, true);

foreach ($dataArray as $row) {
	//$sql = "UPDATE countryList SET ctryName='".str_replace("'","",$row["country"])."' WHERE ctryCode='".$row["countryInfo"]["iso3"]."'";
	//$sql = "INSERT INTO countryList(ctryCode, flagUrl) VALUES ('".$row["countryInfo"]["iso3"]."', '".$row["countryInfo"]["flag"]."')";
	$allCases = $allCases + $row["cases"];
	$allDeaths = $allDeaths + $row["deaths"];
	$allRecovered = $allRecovered + $row["recovered"];
	$allTests = $allTests + $row["tests"];
	$counter++;

}
$sql = "INSERT INTO sumWorld(worldCases, worldDeaths, worldRecovered, worldTests) VALUES(".$allCases.",".$allDeaths.",".$allRecovered.",".$allTests.")";

echo "<br/>";
echo "Veri Tipi".gettype($row["cases"])." "."row['cases'] = ".$row["cases"]." "."allCases = ".$allCases;

if ($conn->exec($sql)) {
    echo "New record created successfully <br/>";
    echo "Recorded Country Count: ".$counter;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn=null;

}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
    
?>

</body>
</html>
