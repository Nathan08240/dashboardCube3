<?php

$sql = "SELECT * FROM `students`
JOIN `promotions_students` ON `student_id` = `students`.`id`
JOIN `promotions` ON `promotions_students`.`promotion_id` = `promotions`.`id`";
//JOIN badge_entries ON badge_entries.student_id = students.id
//JOIN sessions ON sessions.id = badge_entries.session_id
$sth = $db->prepare($sql);
$sth->execute();
$students = $sth->fetchAll(PDO::FETCH_ASSOC);
