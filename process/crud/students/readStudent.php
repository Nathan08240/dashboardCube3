<?php 
echo '<div class="hidden overflow-hidden" id="modal_read0">
        <div class="flex flex-col justify-center items-center bg-black/50 w-screen h-screen fixed inset-0">
            <div class="flex flex-col justify-center items-center bg-white p-8 rounded-lg"> 
                <form action="admin.php" method="POST" class="flex flex-col justify-center items-center gap-y-3 bg-white p-8 rounded-lg">
                    <p class="text-3xl text-black font-semibold">VOIR UN ETUDIANT</p>
                    <input type="search" name="students_info" placeholder="Prénom / Nom / ID" class="border-2 border-black rounded-lg p-2">
                    <input type="submit" value="VOIR" class="cursor-pointer text-black font-semibold rounded-lg p-2">
                </form>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>
        </div>
    </div>';

$students_info = $_POST['students_info'];
$sql = "SELECT lastname, firstname, email, school_id FROM `students` WHERE `firstname` LIKE :students_info OR `lastname` LIKE :students_info OR `school_id` LIKE :students_info";
$sth = $db->prepare($sql);
$sth->execute([':students_info' => $students_info]);
$students = $sth->fetchAll(PDO::FETCH_ASSOC);

if($students != null) {
    echo '<div class="flex overflow-hidden" id="modal_read'.$student['school_id'].'">
                <div class="flex flex-col justify-around items-center bg-black/50 w-screen h-screen fixed inset-0">
                    <div class="grid h-full justify-center items-center p-8 rounded-lg"> ';
    foreach ($students as $key => $student ) {
        echo '
            <div class="flex flex-col justify-center items-center border-solid border-2 border-black  bg-white p-8 rounded-lg">
                <p class="text-xl text-black font-semibold">Prénom : '.$student['firstname'].'</p>
                <p class="text-xl text-black font-semibold">Nom : '.$student['lastname'].'</p>
                <p class="text-xl text-black font-semibold">Email : '.$student['email'].'</p>
                <p class="text-xl text-black font-semibold">ID : '.$student['school_id'].'</p>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>';

    }
    echo '          </div>
                </div>
            </div>';
}

?>