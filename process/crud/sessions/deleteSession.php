<?php
include  '../../connect.php';

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "Error : id cannot be empty";
    die;
}

$sql = "DELETE FROM sessions WHERE id = :id";
$sth = $db->prepare($sql);
$sth->execute([
    ":id" => $_GET["id"]
]);

echo $_GET["id"];
echo "Session removed successfully";

header("Location: ../../../views/sessions.php");
