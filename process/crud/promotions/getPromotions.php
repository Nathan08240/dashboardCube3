<?php
$sql = "SELECT * FROM `promotions`
JOIN staff ON referer = staff.id";
$sth = $db->prepare($sql);
$sth->execute();
$promos = $sth->fetchAll(PDO::FETCH_ASSOC);
