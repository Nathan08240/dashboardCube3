<?php

include '../../connect.php';




if (
    !isset($_POST["firstname"]) || empty($_POST["firstname"]) ||
    !isset($_POST["lastname"]) || empty($_POST["lastname"]) ||
    !isset($_POST["id"]) || empty($_POST["id"]) ||
    !isset($_POST["school_id"]) || empty($_POST["school_id"]) || strlen($_POST["school_id"]) != 7 ||
    !isset($_POST['promotion']) || empty($_POST['promotion'])
) {
    header("Location: ../../../views/students.php");
    echo $_POST["promotion"];
    echo "error form is not valid";
    //die;
}

$email = strtolower($_POST["firstname"]) . "." . strtolower($_POST["lastname"]) . "@viacesi.fr";
$date = new DateTime();

$sql = "UPDATE `students` 
JOIN `promotions_students` ON `students`.`id` = `promotions_students`.`student_id`
SET `school_id`=:school_id,`lastname`=:lastname,`firstname`=:firstname,`email`=:email,`updated_at`=:updated_at, `promotion_id`=:promotion_id WHERE id = :id";

$req = $db->prepare($sql);
$req->bindValue(":school_id", $_POST["school_id"]);
$req->bindValue(":lastname", $_POST["lastname"]);
$req->bindValue(":firstname", $_POST["firstname"]);
$req->bindValue(":email", $email);
$req->bindValue(":updated_at", $date->format('Y-m-d H:i:s'));
$req->bindValue(":promotion_id", $_POST['promotion']);
$req->bindValue(":id", $_POST['id']);

if (!$req->execute()) {
    echo "Error: student student";
    die;
}



header("Location: ../../../views/students.php");
