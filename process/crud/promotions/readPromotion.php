<?php 
echo '<div class="hidden" id="modal_read1">
        <div class="flex flex-col justify-center items-center bg-black/50 w-screen h-screen fixed inset-0">
            <div class="flex flex-col justify-center items-center bg-white p-8 rounded-lg"> 
                <form action="admin.php" method="POST" class="flex flex-col justify-center items-center gap-y-3 bg-white p-8 rounded-lg">
                    <p class="text-3xl text-black font-semibold">VOIR UNE PROMO</p>
                    <input type="search" name="promos_info" placeholder="Prénom / Nom / ID" class="border-2 border-black rounded-lg p-2">
                    <input type="submit" value="VOIR" class="cursor-pointer text-black font-semibold rounded-lg p-2">
                </form>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>
        </div>
    </div>';


$promos_info = $_POST['promos_info'];
$sql = "SELECT name, reference, referer FROM `promotions` WHERE `name` LIKE :promos_info OR `reference` LIKE :promos_info OR `referer` LIKE :promos_info";
$sth = $db->prepare($sql);
$sth->execute([':promos_info' => $promos_info]);
$promos = $sth->fetchAll(PDO::FETCH_ASSOC);


if($promos != null) {
    echo '<div class="flex">
                <div class="flex flex-col justify-around items-center bg-black/50 w-screen h-screen fixed inset-0">
                    <div class="grid h-full justify-center items-center p-8 rounded-lg"> ';
    foreach ($promos as $key => $promo ) {
        echo '
            <div class="flex flex-col justify-center items-center border-solid border-2 border-black  bg-white p-8 rounded-lg">
                <p class="text-xl text-black font-semibold">Nom : '.$promo['name'].'</p>
                <p class="text-xl text-black font-semibold">Code analytique : '.$promo['reference'].'</p>
                <p class="text-xl text-black font-semibold">Référant : '.$promo['referer'].'</p>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>';

    }
    echo '          </div>
                </div>
            </div>';
}

?>