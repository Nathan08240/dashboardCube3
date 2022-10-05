<?php

include '../../connect.php';




if (
    !isset($_POST["firstname"]) || empty($_POST["firstname"]) ||
    !isset($_POST["lastname"]) || empty($_POST["lastname"]) ||
    !isset($_POST["id"]) || empty($_POST["id"]) ||
    !isset($_POST["school_id"]) || empty($_POST["school_id"]) || strlen($_POST["school_id"]) != 7
) {
    echo "error form is not valid";
    die;
}

$email = strtolower($_POST["firstname"]) . "." . strtolower($_POST["lastname"]) . "@viacesi.fr";
$date = new DateTime();


$sql = "UPDATE `students` SET `school_id`=?,`lastname`=?,`firstname`=?,`email`=?, `updated_at`=? WHERE id = " . $_POST["id"];
$req = $db->prepare($sql);
$req->bindValue(1, $_POST["school_id"]);
$req->bindValue(2, $_POST["lastname"]);
$req->bindValue(3, $_POST["firstname"]);
$req->bindValue(4, $email);
$req->bindValue(5, $date->format('Y-m-d H:i:s'));

if (!$req->execute()) {
    echo "error during edit student";
    die;
}



header("Location: ../../../views/students.php");

