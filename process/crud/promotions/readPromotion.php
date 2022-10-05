<?php
$promos_info = $_POST['promos_info'];
$sql = "SELECT name, reference, referer FROM `promotions` WHERE `name` LIKE :promos_info OR `reference` LIKE :promos_info OR `referer` LIKE :promos_info";
$sth = $db->prepare($sql);
$sth->execute([':promos_info' => $promos_info]);
$promos = $sth->fetchAll(PDO::FETCH_ASSOC);


if($promos != null) {
    echo '<script>
    document.getElementById("search_promo").innerHTML = "";
    </script>';
    echo '<div class="w-full flex flex-col justify-center items-center border-2 border-black mb-10" id="search_promo">
    <div class=" grid grid-cols-4 w-11/12 rounded-lg overflow-auto text-center">
        <p class="font-semibold">Nom</p>
        <p class="font-semibold">Référence</p>
        <p class="font-semibold">Référent</p>
        <p></p>';
    foreach ($promos as $key => $promo ) {
        echo '<p class="text-sm p-1 ">'.$promo['name'].' </p>';
        echo '<p class="text-sm p-1 ">'.$promo['reference'].' </p>';
        echo '<p class="text-sm p-1 ">'.$promo['referer'].' </p>';
        echo '<div class="flex gap-x-3">';
            echo '<div class="h-11 flex justify-center items-center"><a href="../process/crud/students/deleteStudent.php?id='.$student['id'].'"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
            echo '<button class="h-11 flex justify-center items-center"  id="'.$student['id'].'"><iconify-icon icon="akar-icons:pencil" style="color: #bada55;" width="32" height="32"></iconify-icon></button>';
        echo '</div>';
    }
    echo '</div>
    </div>';

}
