<?php 
echo '<div class="hidden" id="modal_read3">
        <div class="flex flex-col justify-center items-center bg-black/50 w-screen h-screen fixed inset-0">
            <div class="flex flex-col justify-center items-center bg-white p-8 rounded-lg"> 
                <form action="admin.php" method="POST" class="flex flex-col justify-center items-center gap-y-3 bg-white p-8 rounded-lg">
                    <p class="text-3xl text-black font-semibold">VOIR UN STAFF</p>
                    <input type="search" name="staffs_info" placeholder="Prénom / Nom / ID" class="border-2 border-black rounded-lg p-2">
                    <input type="submit" value="VOIR" class="cursor-pointer text-black font-semibold rounded-lg p-2">
                </form>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>
        </div>
    </div>';

$staffs_info = $_POST['staffs_info'];
$sql = "SELECT lastname, firstname, email, role, id FROM `staff` WHERE `firstname` LIKE :staffs_info OR `lastname` LIKE :staffs_info OR `role` LIKE :staffs_info";
$sth = $db->prepare($sql);
$sth->execute([':staffs_info' => $staffs_info]);
$staffs = $sth->fetchAll(PDO::FETCH_ASSOC);

if($staffs != null) {
    echo '<div class="flex" id="modal_read'.$staff['id'].'">
                <div class="flex flex-col justify-around items-center bg-black/50 w-screen h-screen fixed inset-0">
                    <div class="grid h-full justify-center items-center p-8 rounded-lg"> ';
    foreach ($staffs as $key => $staff ) {
        echo '
            <div class="flex flex-col justify-center items-center border-solid border-2 border-black  bg-white p-8 rounded-lg">
                <p class="text-xl text-black font-semibold">Prénom : '.$staff['firstname'].'</p>
                <p class="text-xl text-black font-semibold">Nom : '.$staff['lastname'].'</p>
                <p class="text-xl text-black font-semibold">Email : '.$staff['email'].'</p>
                <p class="text-xl text-black font-semibold">Rôle : '.$staff['role'].'</p>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>';

    }
    echo '          </div>
                </div>
            </div>';
}

?>