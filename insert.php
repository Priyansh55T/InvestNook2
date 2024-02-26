<?php
$server = "localhost";
$user = "root";
$pssd = "";
$dbname = "event_details";
$sql = "insert into event values(?,?,?,?)";
$res = $conn->prepare($sql);
$name = "abc";
$name2 = "def";
$plat = "zoom";
$id = "8398432974ddfsfd";
$res->bind_param("ssss",$name,$name2,$plat,$id);
$res->execute();
$res->close();
?>