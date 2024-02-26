<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$server = "localhost";
$user = "root";
$pssd = "";
$dbname = "event_details";
$conn = new mysqli($server, $user, $pssd, $dbname);

$sql = "INSERT INTO event VALUES (?, ?, ?, ?, ?, ?)";

$res = $conn->prepare($sql);

$e_id = $_GET['a1'];
$e_name= $_GET['a']; 
$category = $_GET['a2'];
$b_i_name = $_GET['b'];
$m_plat = $_GET['c'];
$m_id = $_GET['d'];

$res->bind_param("isssss", $e_id, $e_name, $category, $b_i_name, $m_plat, $m_id);
$res->execute();

$res->close();
$conn->close();
?>
<script>
    alert("Event Created Sucessfully");
    window.location.href='Events.html';
</script>    
</body>
</html>