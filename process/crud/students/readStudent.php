<?php
$students_info = strtolower(trim($_POST['students_info']));
$sql =
    "SELECT *FROM `students` 
JOIN `promotions_students` ON `student_id` = `students`.`id`
JOIN `promotions` ON `promotions_students`.`promotion_id` = `promotions`.`id`
-- JOIN badge_entries ON badge_entries.student_id = students.id
-- JOIN sessions ON sessions.id = badge_entries.session_id
WHERE `firstname` LIKE :students_info OR `lastname` LIKE :students_info OR `school_id` LIKE :students_info OR `email` LIKE :students_info OR `name` LIKE :students_info";
$sth = $db->prepare($sql);
$sth->execute([':students_info' => $students_info]);
$students = $sth->fetchAll(PDO::FETCH_ASSOC);


if ($students != null) {
    echo '<script>
    document.getElementById("search_student").innerHTML = "";
    </script>';
    echo '<div class="w-full flex flex-col justify-center items-center border-2 border-black mb-10" id="search_student">
    <div class=" grid grid-cols-6 w-11/12 rounded-lg overflow-auto ">
        <p class="font-semibold">Prénom</p>
        <p class="font-semibold">Nom</p>
        <p class="font-semibold">Mail</p>
        <p class="font-semibold">Numéro étudiant</p>
        <p class="font-semibold">Promotion</p>
        
        <p></p>';
    foreach ($students as $key => $student) {
        echo '<p class="text-sm p-1 ">' . $student['firstname'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $student['lastname'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $student['email'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $student['school_id'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $student['name'] . ' </p>';

        echo '<div class="flex gap-x-3">';
        echo '<div class="h-11 flex justify-center items-center"><a href="../process/crud/students/deleteStudent.php?id=' . $student['student_id'] . '"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
        echo '<button class="h-11 flex justify-center items-center"  id="' . $student['student_id'] . '"><iconify-icon icon="akar-icons:pencil" style="color: #bada55;" width="32" height="32"></iconify-icon></button>';
        echo '</div>';
    }
    echo '</div>
    </div>';
}
