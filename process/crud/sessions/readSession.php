<?php
$sessions_info = $_POST['sessions_info'];
$sql = "SELECT title, start, end, classroom, referer FROM `sessions` WHERE `title` LIKE :sessions_info OR `start` LIKE :sessions_info OR `end` LIKE :sessions_info OR `classroom` LIKE :sessions_info OR `referer` LIKE :sessions_info";
$sth = $db->prepare($sql);
$sth->execute([':sessions_info' => $sessions_info]);
$sessions = $sth->fetchAll(PDO::FETCH_ASSOC);

if($sessions != null) {
    echo '<script>
    document.getElementById("search_session").innerHTML = "";
    </script>';
    echo '<div class="w-full flex flex-col justify-center items-center border-2 border-black mb-10" id="search_session">
    <div class=" grid grid-cols-6 w-11/12 rounded-lg overflow-auto text-center">
        <p class="font-semibold">Titre</p>
        <p class="font-semibold">Début</p>
        <p class="font-semibold">Fin</p>
        <p class="font-semibold">Salle</p>
        <p class="font-semibold">Référent</p>
        <p></p>';
    foreach ($sessions as $key => $session ) {
        echo '<p class="text-sm p-1 ">'.$session['title'].' </p>';
        echo '<p class="text-sm p-1 ">'.$session['start'].' </p>';
        echo '<p class="text-sm p-1 ">'.$session['end'].' </p>';
        echo '<p class="text-sm p-1 ">'.$session['classroom'].' </p>';
        echo '<p class="text-sm p-1 ">'.$session['referer'].' </p>';
        echo '<div class="flex gap-x-3">';
        echo '<div class="h-11 flex justify-center items-center"><a href="../process/crud/sessions/deleteSession.php?id=' . $session['id'] . '"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
        echo '<button class="h-11 flex justify-center items-center"  id="' . $session['id'] . '"><iconify-icon icon="akar-icons:pencil" style="color: #bada55;" width="32" height="32"></iconify-icon></button>';
        echo '</div>';
    }
    echo '</div>
    </div>';

}
