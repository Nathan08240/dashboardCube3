<?php

include '../middlewares/isAuth.php';
include 'connect.php';

$id = $_SESSION["id"];

$sql = "SELECT title ,end ,start FROM `sessions`
JOIN staff ON staff.id = referer
WHERE referer =". $id;
$sth = $db->prepare($sql);
$sth->execute();
$sessions = $sth->fetchAll(PDO::FETCH_ASSOC);



$output = [];
foreach ($sessions as $session) {
    array_push($output, [
        'title' => $session['title'],
        'start' => $session['start'],
        'end' => $session['end'],
    ]);
}
echo json_encode($output);


