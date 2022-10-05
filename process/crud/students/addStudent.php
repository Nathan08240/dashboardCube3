<?php
include  '../../connect.php';
if (
    !isset($_POST["firstname"]) || empty($_POST["firstname"]) ||
    !isset($_POST["lastname"]) || empty($_POST["lastname"]) ||
    !isset($_POST["school_id"]) || empty($_POST["school_id"]) || strlen($_POST["school_id"]) != 7 ||
    !isset($_POST['promotion']) || empty($_POST['promotion'])
) {
    echo $_POST['id'] . $_POST['promotion'] . $_POST['school_id'] . $_POST['firstname'] . $_POST['lastname'];
    echo "error form is not valid";
    die;
}

$email = strtolower($_POST["firstname"]) . "." . strtolower($_POST["lastname"]) . "@viacesi.fr";

$sql = "INSERT INTO `students`(`school_id`, `lastname`, `firstname`, `email`) VALUES (:school_id, :lastname, :firstname, :email)";
$req = $db->prepare($sql);
$req->bindValue(":school_id", $_POST["school_id"]);
$req->bindValue(":lastname", $_POST["lastname"]);
$req->bindValue(":firstname", $_POST["firstname"]);
$req->bindValue(":email", $email);

if (!$req->execute()) {
    echo "Error: student student";
    die;
}

$sql = "INSERT INTO `promotions_students`(`promotion_id`, `student_id`) VALUES (:promotion_id, :student_id)";
$req = $db->prepare($sql);
$req->bindValue(":promotion_id", $_POST['promotion']);
$req->bindValue(":student_id", $db->lastInsertId());
if (!$req->execute()) {
    echo "Error: student student";
    die;
}

header("Location: ../../../views/students.php");
