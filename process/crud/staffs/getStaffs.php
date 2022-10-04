<?php
    $sql = "SELECT * FROM `staff`";
    $sth = $db->prepare($sql);
    $sth->execute();
    $staffs = $sth->fetchAll(PDO::FETCH_ASSOC);
