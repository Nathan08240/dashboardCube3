<?php
    $sql = "SELECT * FROM `promotions`";
    $sth = $db->prepare($sql);
    $sth->execute();
    $promos = $sth->fetchAll(PDO::FETCH_ASSOC);
