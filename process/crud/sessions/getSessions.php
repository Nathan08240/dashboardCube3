<?php
    $sql = "SELECT * FROM `sessions`";
    $sth = $db->prepare($sql);
    $sth->execute();
    $sessions = $sth->fetchAll(PDO::FETCH_ASSOC);
