<?php

include  '../../connect.php';

if (
    !isset($_POST["name"]) || empty($_POST["name"]) ||
    !isset($_POST["reference"]) || empty($_POST["reference"]) ||
    !isset($_POST["referer"]) || empty($_POST["referer"]) ||
    !isset($_POST["start_at"]) || empty($_POST["start_at"]) ||
    !isset($_POST["finished_at"]) || empty($_POST["finished_at"])
) {
    echo "Error : form is not valid";
    die;
}

$sql = "INSERT INTO `promotions`(`name`, `reference`, `referer`, `start_at`, `finished_at`) VALUES (:name, :reference, :referer, :start_at, :finished_at)";
$req = $db->prepare($sql);
$req->bindValue(":name", $_POST["name"]);
$req->bindValue(":reference", $_POST["reference"]);
$req->bindValue(":referer", $_POST["referer"]);
$req->bindValue(":start_at", $_POST["start_at"]);
$req->bindValue(":finished_at", $_POST["finished_at"]);

if (!$req->execute()) {
    echo "Error: student student";
    die;
}

header("Location: ../../../views/promotions.php");
