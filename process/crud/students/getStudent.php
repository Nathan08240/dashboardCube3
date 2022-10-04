<?php


$sql = "SELECT * FROM `students` 
JOIN badge_entries ON badge_entries.student_id = students.id
JOIN sessions ON sessions.id = badge_entries.session_id";
$sth = $db->prepare($sql);
$sth->execute();
$students = $sth->fetchAll(PDO::FETCH_ASSOC);

foreach ($students as $key => $student) {
    $students[$key]['badge_at'] = substr($student['badge_at'], 11, 5);
    $students[$key]['enable_to_badge_at'] = substr($student['enable_to_badge_at'], 11, 5);
}


