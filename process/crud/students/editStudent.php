<?php

include '../../connect.php';


$email = strtolower($_POST["firstname"]) . "." . strtolower($_POST["lastname"]) . "@viacesi.fr";
$date = new DateTime();


$sql = "UPDATE `students` SET `school_id`=?,`lastname`=?,`firstname`=?,`email`=?, `updated_at`=? WHERE id = " . $_POST["id"];
$req = $db->prepare($sql);
$req->bindValue(1, $_POST["school_id"]);
$req->bindValue(2, $_POST["lastname"]);
$req->bindValue(3, $_POST["firstname"]);
$req->bindValue(4, $email);
$req->bindValue(5, $date->format('Y-m-d H:i:s'));
$req->execute();


//header("Location: ../../../views/students.php");

