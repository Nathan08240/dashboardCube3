<?php
    $sql = "SELECT * FROM `sessions`";
    $sth = $db->prepare($sql);
    $sth->execute();
    $sessions = $sth->fetchAll(PDO::FETCH_ASSOC);

//display with eu format and hour
    foreach ($sessions as $key => $session) {
        $sessions[$key]['start'] = substr($session['start'], 8, 2).'/'.substr($session['start'], 5, 2).'/'.substr($session['start'], 0, 4).' '.substr($session['start'], 11, 5);
        $sessions[$key]['end'] = substr($session['end'], 8, 2).'/'.substr($session['end'], 5, 2).'/'.substr($session['end'], 0, 4).' '.substr($session['end'], 11, 5);
    }

