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

$con = mysqli_connect('fdb21.awardspace.net','2736254_shopit','radnikdoo23','2736254_shopit');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$sql="SELECT * FROM phone WHERE manufacturer = '".$q."'";

$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
    echo '<div class="col-12 col-md-4" id="aj">';
    echo "<h3>Name: </h3><h4>" . $row['name'] . "</h4><hr>";
    echo "<h3>Storage: </h3><h4>" . $row['storage'] . "</h4><hr>";
    echo "<h3>OS: </h3><h4>" . $row['os'] . "</h4><hr>";
    echo "<h3>Resolution: </h3><h4>" . $row['display_res'] . "</h4><hr>";
    echo "<h3>Price: </h3><h4>$" . $row['price'] . "</h4><hr>";
    echo '</div>';
}

mysqli_close($con);
?>
</body>
</html>