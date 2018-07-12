<!DOCTYPE html>
<html>
<head>
<style>

#aj {
    border: 1px solid black;
    padding: 5px;
}

#update {
    background-color: #008CBA;
}

#delete {
    background-color: #f44336;
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

$sql="SELECT * FROM console WHERE manufacturer = '".$q."'";

$result = mysqli_query($con,$sql);


while($row = mysqli_fetch_array($result)) {
    echo '<div class="col-12 col-md-4" id="aj">';
    echo "<h3>Name: </h3><h4>" . $row['console_name'] . "</h4><hr>";
    echo "<h3>Storage: </h3><h4>" . $row['storage'] . "</h4><hr>";
    echo "<h3>CPU: </h3><h4>" . $row['cpu'] . "</h4><hr>";
    echo "<h3>GPU: </h3><h4>" . $row['gpu'] . "</h4><hr>";
    echo "<h3>RAM: </h3><h4>" . $row['ram'] . "</h4><hr>";
    echo "<h3>Price: </h3><h4>$" . $row['price'] . "</h4><hr>";
    echo '</div>';
}

mysqli_close($con);
?>
</body>
</html>