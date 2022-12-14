<?php

include  '../../connect.php';

if (
    !isset($_POST["title"]) || empty($_POST["title"]) ||
    !isset($_POST["enable_to_badge_at"]) || empty($_POST["enable_to_badge_at"]) ||
    !isset($_POST["start_at"]) || empty($_POST["start_at"]) ||
    !isset($_POST["end_at"]) || empty($_POST["end_at"]) ||
    !isset($_POST["classroom"]) || empty($_POST["classroom"]) ||
    !isset($_POST["referer"]) || empty($_POST["referer"]) ||
    !isset($_POST["promotion"]) || empty($_POST["promotion"])
) {


    echo "Error : form is not valid";
    die;
}


echo $_POST['promotion'];

$sql = "INSERT INTO `sessions`(`title`, `enable_to_badge_at`, `start`, `end`, `classroom`, `referer`, `promotion_id`) VALUES (?, ?, ?, ?, ?, ?, ?)";
$req = $db->prepare($sql);
$req->bindValue(1, $_POST["title"]);
$req->bindValue(2, $_POST["enable_to_badge_at"]);
$req->bindValue(3, $_POST["start_at"]);
$req->bindValue(4, $_POST["end_at"]);
$req->bindValue(5, $_POST["classroom"]);
$req->bindValue(6, $_POST["referer"]);
$req->bindValue(7, $_POST["promotion"]);

if (!$req->execute()) {
    echo "Error: add session";
    die;
}


header("Location: ../../../views/sessions.php");
