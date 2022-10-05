<?php
$sql = "SELECT * FROM `sessions`
JOIN promotions ON promotions.id = promotion_id";
$sth = $db->prepare($sql);
$sth->execute();
$sessions = $sth->fetchAll(PDO::FETCH_ASSOC);
