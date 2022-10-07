<?php

include  '../../connect.php';

if (!isset($_GET["reference"]) || empty($_GET["reference"])) {
    echo $_GET['reference'];
    echo "Error : id cannot be empty";
    die;
}

$sql = "DELETE FROM promotions WHERE reference = :reference";
$sth = $db->prepare($sql);
$sth->execute([
    ":reference" => $_GET["reference"]
]);

header("Location: ../../../views/promotions.php");
