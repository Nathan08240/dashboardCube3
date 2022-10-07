<?php
$promos_info = $_POST['promos_info'];
$sql = "SELECT *  FROM `promotions` 
JOIN staff ON referer = staff.id                                
WHERE `name` LIKE :promos_info OR `reference` LIKE :promos_info OR `referer` LIKE :promos_info OR `lastname` LIKE :promos_info OR `firstname` LIKE :promos_info";
$sth = $db->prepare($sql);
$sth->execute([':promos_info' => $promos_info]);
$promos = $sth->fetchAll(PDO::FETCH_ASSOC);


if($promos != null) {
    echo '<script>
    document.getElementById("search_student").innerHTML = "";
    </script>';
    echo '<div class="w-full flex flex-col justify-center items-center border-2 border-black mb-10" id="search_promo">
    <div class=" grid grid-cols-6 w-11/12 rounded-lg overflow-auto text-center">
            <p class="font-semibold">Nom</p>
            <p class="font-semibold"> Code analytique</p>
            <p class="font-semibold">Referant</p>
            <p class="font-semibold">Début</p>
            <p class="font-semibold">Fin</p>
        <p></p>';
    foreach ($promos as $key => $promo) {
        echo '<p class="text-sm p-1 ">' . $promo['name'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $promo['reference'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $promo['firstname'] . ' ' . $promo['lastname'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $promo['start_at'] . ' </p>';
        echo '<p class="text-sm p-1 ">' . $promo['finished_at'] . ' </p>';

        echo '<div class="flex gap-x-3">';
        echo '<div class="h-11 flex justify-center items-center"><a href="../process/crud/promotions/deletePromotion.php?id=' . $promo['id'] . '"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
        echo '<button class="h-11 flex justify-center items-center"  id="' . $promo['reference'] . '"><iconify-icon icon="akar-icons:pencil" style="color: #bada55;" width="32" height="32"></iconify-icon></button>';
        echo '</div>';

    }
        echo '</div>
</div>';

}
