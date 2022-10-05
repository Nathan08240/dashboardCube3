<?php
$students_info = $_POST['students_info'];
$sql = "SELECT *FROM `students` 
JOIN badge_entries ON badge_entries.student_id = students.id
JOIN sessions ON sessions.id = badge_entries.session_id
WHERE `firstname` LIKE :students_info OR `lastname` LIKE :students_info OR `school_id` LIKE :students_info";
$sth = $db->prepare($sql);
$sth->execute([':students_info' => $students_info]);
$students = $sth->fetchAll(PDO::FETCH_ASSOC);


if($students != null) {
    echo '<script>
    document.getElementById("search_student").innerHTML = "";
    </script>';
    echo '<div class="w-full flex flex-col justify-center items-center border-2 border-black mb-10" id="search_student">
    <div class=" grid grid-cols-6 w-11/12 rounded-lg overflow-auto ">
        <p class="font-semibold">Prénom</p>
        <p class="font-semibold">Nom</p>
        <p class="font-semibold">Mail</p>
        <p class="font-semibold">Numéro étudiant</p>
        <p class="font-semibold">Badge</p>
        <p></p>';
    foreach ($students as $key => $student ) {
        echo '<p class="text-sm p-1 ">'.$student['firstname'].' </p>';
        echo '<p class="text-sm p-1 ">'.$student['lastname'].' </p>';
        echo '<p class="text-sm p-1 ">'.$student['email'].' </p>';
        echo '<p class="text-sm p-1 ">'.$student['school_id'].' </p>';

        $badge_at = strtotime($student['badge_at']);
        $badge_entry = date('d/m/Y H:i', $badge_at);
        $badge_end = strtotime($student['end']);
        $badge_enable = strtotime($student['enable_to_badge_at']);

        if ($badge_at < $badge_end && $badge_at >= $badge_enable) {
            $color = 'text-green-500';
        } else {
            $color = 'text-red-500';
        }
        echo '<div class="h-11 w-full flex "><p class=" py-2 text-center '.$color .'">'.$badge_entry.'</p></div>';
        echo '<div class="h-11 w-full flex justify-center items-center"><a href="../process/crud/students/deleteStudent.php?school_id='.$student['school_id'].'"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
    }
    echo '</div>
    </div>';

}

?>