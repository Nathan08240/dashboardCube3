<?php
include  '../../connect.php';

if (!isset($_GET["ref"]) || empty($_GET["ref"])) {
    echo "Error : id cannot be empty";
    die;
}

$sql = "DELETE FROM sessions WHERE ref = :ref";
$sth = $db->prepare($sql);
$sth->execute([
    ":ref" => $_GET["ref"]
]);

echo $_GET["ref"];
echo "Session removed successfully";

header("Location: ../../../views/sessions.php");
