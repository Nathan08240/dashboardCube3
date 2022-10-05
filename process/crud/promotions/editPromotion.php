<?php

include '../../connect.php';

if (
    !isset($_POST["id"]) || empty($_POST["id"]) ||
    !isset($_POST["name"]) || empty($_POST["name"]) ||
    !isset($_POST["reference"]) || empty($_POST["reference"]) ||
    !isset($_POST["referer"]) || empty($_POST["referer"]) ||
    !isset($_POST["start_at"]) || empty($_POST["start_at"]) ||
    !isset($_POST["finished_at"]) || empty($_POST["finished_at"])
) {
    echo $_POST["id"];
    echo "error form is not valid";
    die;
}

$sql = "UPDATE `promotions` SET `name`=?,`reference`=?,`referer`=?,`start_at`=?, `finished_at`=? WHERE id = " . $_POST["id"];
$req = $db->prepare($sql);
$req->bindValue(1, $_POST["name"]);
$req->bindValue(2, $_POST["reference"]);
$req->bindValue(3, $_POST["referer"]);
$req->bindValue(4, $_POST["start_at"]);
$req->bindValue(5, $_POST["finished_at"]);

if (!$req->execute()) {
    echo "error during edit promotion";
    die;
}

header("Location: ../../../views/promotions.php");
