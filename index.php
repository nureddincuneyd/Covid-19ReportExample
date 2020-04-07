<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table style="width:100%">
  <tr>
  	<th>Country Flag</th>
    <th>Country Name</th>
    <th>Active Infected</th>
    <th>Critical People</th>
  </tr>  

<?php 

$fileUrl = "https://corona.lmao.ninja/countries?sort=country";

$data = file_get_contents($fileUrl);

$dataArray = json_decode($data, true);

foreach ($dataArray as $row) {
	echo "<tr>";

	echo "<td>";
	?> 
	<img src='<?php echo $row["countryInfo"]["flag"]; ?>' alt="" width="120" height="70">
	<?php
	echo "</td>";

	echo "<td>";
	echo $row["country"];
	echo "</td>";

	echo "<td>";
	echo $row["active"];
	echo "</td>";

	echo "<td>";
	echo $row["critical"];
	echo "</td>";

	echo "</tr>";

}

 ?>
</table>
</body>
</html>