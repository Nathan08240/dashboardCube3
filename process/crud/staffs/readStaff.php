<?php
$staffs_info = $_POST['staffs_info'];
$sql = "SELECT lastname, firstname, email, role, id FROM `staff` WHERE `firstname` LIKE :staffs_info OR `lastname` LIKE :staffs_info OR `role` LIKE :staffs_info";
$sth = $db->prepare($sql);
$sth->execute([':staffs_info' => $staffs_info]);
$staffs = $sth->fetchAll(PDO::FETCH_ASSOC);

if($staffs != null) {

    echo '<script>
    document.getElementById("search_staff").innerHTML = "";
    </script>';
    echo '<div class="w-full flex flex-col justify-center items-center border-2 border-black mb-10" id="search_staff">
    <div class=" grid grid-cols-5 w-11/12 rounded-lg overflow-auto text-center ">
        <p class="font-semibold">Prénom</p>
        <p class="font-semibold">Nom</p>
        <p class="font-semibold">Mail</p>
        <p class="font-semibold">Rôle</p>
        <p></p>';
    foreach ($staffs as $key => $staff ) {
        echo '<p class="text-sm p-1 ">'.$staff['firstname'].' </p>';
        echo '<p class="text-sm p-1 ">'.$staff['lastname'].' </p>';
        echo '<p class="text-sm p-1 ">'.$staff['email'].' </p>';
        echo '<p class="text-sm p-1 ">'.$staff['role'].' </p>';
        echo '<a href="#" class="text-sm p-1 underline text-blue-900"> Détail</a>';
    }
    echo '</div>
    </div>';

}

?>