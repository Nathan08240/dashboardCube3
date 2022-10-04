<?php

echo '<div class="hidden" id="modal_read2">
        <div class="flex flex-col justify-center items-center bg-black/50 w-screen h-screen  inset-0 fixed">
            <div class="flex flex-col justify-center items-center bg-white p-8 rounded-lg"> 
                <form action="admin.php" method="POST" class="flex flex-col justify-center items-center gap-y-3 bg-white p-8 rounded-lg">
                    <p class="text-3xl text-black font-semibold">VOIR UNE SESSION</p>
                    <input type="search" name="sessions_info" placeholder="Titre / classe / date / référant_id " class="border-2 border-black rounded-lg p-2">
                    <input type="submit" value="VOIR" class="cursor-pointer text-black font-semibold rounded-lg p-2">
                </form>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>
        </div>
    </div>';

$sessions_info = $_POST['sessions_info'];
$sql = "SELECT title, start, end, classroom, referer FROM `sessions` WHERE `title` LIKE :sessions_info OR `start` LIKE :sessions_info OR `end` LIKE :sessions_info OR `classroom` LIKE :sessions_info OR `referer` LIKE :sessions_info";
$sth = $db->prepare($sql);
$sth->execute([':sessions_info' => $sessions_info]);
$sessions = $sth->fetchAll(PDO::FETCH_ASSOC);

if($sessions != null) {
    echo '<div class="flex">
                <div class="flex flex-col justify-around items-center bg-black/50 w-screen h-screen fixed inset-0">
                    <div class="grid h-full justify-center items-center p-8 rounded-lg"> ';
    foreach ($sessions as $key => $session ) {
        echo '
            <div class="flex flex-col justify-center items-center border-solid border-2 border-black  bg-white p-8 rounded-lg">
                <p class="text-xl text-black font-semibold">Titre : '.$session['title'].'</p>
                <p class="text-xl text-black font-semibold">Début : '.$session['start'].'</p>
                <p class="text-xl text-black font-semibold">Fin : '.$session['end'].'</p>
                <p class="text-xl text-black font-semibold">Salle : '.$session['classroom'].'</p>
                <p class="text-xl text-black font-semibold">référant : '.$session['referer'].'</p>
                <button class="cursor-pointer text-black font-semibold rounded-lg p-2 cancel">FERMER</button>
            </div>';

    }
    echo '          </div>
                </div>
            </div>';
}

?>