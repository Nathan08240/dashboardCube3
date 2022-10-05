<?php
include  '../../connect.php';

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "Error : id cannot be empty";
    die;
}



$sql = "DELETE FROM students WHERE id = :id";
$sth = $db->prepare($sql);
$sth->execute([
    ":id" => $_GET["id"]
]);


header("Location: ../../../views/students.php");

