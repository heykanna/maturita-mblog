<?php
$meno = "Marek";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "counter";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO click_count (id, page_url, page_count) VALUES (NULL, '".$_SERVER["REQUEST_URI"]."', '1')";
$conn->query($sql);

$sql = "SELECT * FROM click_count";
$result = $conn->query($sql);
$pocet = $result->num_rows;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Marek</title>
</head>
<body>

<?php echo "ahoj $meno"; ?><br>
<?php echo "pocet navstev: $pocet"; ?>

</body>
</html>

