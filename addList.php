<?php

// $_POST["group"] $_POST["memo"] $_POST["startDate"] $_POST["endDate"]
// session_start();  $id = $_SESSION['id'];  

session_start();
$id = $_SESSION['id'];

echo $_POST["group"];
echo $_POST["memo"];
echo $_POST["startDate"];
echo $_POST["endDate"];

?>