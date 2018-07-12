<!DOCTYPE html>
<html>
<head>
<style>

#aj {
    border: 1px solid black;
    padding: 5px;
}
</style>
</head>
<body>

<?php
$q = strval($_GET['q']);

$con = mysqli_connect('sql300.epizy.com','epiz_22338357','radnikdoo23','epiz_22338357_shopit');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM software WHERE manufacturer = '".$q."'";

$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
    echo '<div class="col-12 col-md-4" id="aj">';
    echo "<h3>Name: </h3><h4>" . $row['software_name'] . "</h4><hr>";
    echo "<h3>Type: </h3><h4>" . $row['software_type'] . "</h4><hr>";
    echo "<h3>Licence Duration: </h3><h4>" . $row['licence_duration'] . "</h4><hr>";
    echo "<h3>Price: </h3><h4>$" . $row['price'] . "</h4><hr>";
    echo '</div>';
}

mysqli_close($con);
?>
</body>
</html>