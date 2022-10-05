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
        echo '<a href="#" class="text-sm p-1 underline text-blue-900"> Détail</a>';
    }
    echo '</div>
    </div>';

}

?>