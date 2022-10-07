<?php
include '../middlewares/isAuth.php';
include '../process/connect.php';

if ($_SESSION['role'] == 'pilot' || $_SESSION['role'] == 'admin') {
} else {
    header('Location: /views/dashboard.php');
}
?>


<?php include("../partials/head.php");  ?>
<title>Admin - Sessions</title>

<body class="flex justify-center items-center flex-col ">
    <?php include
        '../partials/navbar.php';
    echo '<script>
            document.getElementById("sessions").classList.remove("text-white");
            document.getElementById("sessions").classList.add("text-[#BADA55]");
        </script>';
    ?>
    <div class=" p-2 rounded-lg flex flex-col justify-center items-center container ">
        <div class="flex flex-col w-full items-center">
            <div class="flex justify-center items-center my-6">

                <button class=" font-semibold p-2 flex justify-center items-center" id="add_session">
                    <iconify-icon icon="akar-icons:person-add" style="color: #bada55;" width="32" height="32"></iconify-icon>
                </button>
                <form action="sessions.php" method="POST" class="flex  justify-center items-center bg-white  rounded-lg">
                    <input type="search" name="sessions_info" placeholder="Prénom / Nom / ID" class="border-2 border-black rounded-lg p-2">
                    <input type="submit" value="Recherche" class="cursor-pointer text-black font-semibold rounded-lg p-2">
                </form>
            </div>
            <div class="hidden" id="add">
                <form method="post" action="../../process/crud/sessions/addSession.php" class="grid grid-cols-3 mb-6 ">
                    <input type="hidden" name="id" id="id" class="p-2 bg-gray-300 rounded-lg">
                    <input class="m-2 p-2 bg-gray-300 rounded-lg" type="text" name="title" id="title" placeholder="Titre" required>
                    <input class="m-2 p-2 bg-gray-300 rounded-lg" type="text" name="classroom" id="classroom" placeholder="Salle" required>
                    <select class="p-2 bg-gray-300 rounded-lg" name="referer" id="referer">
                        <option value=""> Choisi un référant</option>
                        <?php

                        include '../process/crud/staffs/getStaffs.php';
                        foreach ($staffs as $staff) {
                            echo '<option value="' . $staff['id'] . '">' . $staff['firstname'] .' '. $staff['lastname'] . '</option>';
                        }

                        ?>
                    </select>
                    <label for="enable_to_badge_at">Ouverture<input class="m-2 p-2 bg-gray-300 rounded-lg" type="datetime-local" name="enable_to_badge_at" id="enable_to_badge_at" placeholder="Nom" required></label>
                    <label for="start_at">Début<input class="m-2 p-2 bg-gray-300 rounded-lg" type="datetime-local" name="start_at" id="start_at" placeholder="Numéro étudiant" required></label>
                    <label for="end_at">Fin<input class="m-2 p-2 bg-gray-300 rounded-lg" type="datetime-local" name="end_at" id="end_at" placeholder="Prénom" required></label>
                    <select class="m-2 p-2 bg-gray-300 rounded-lg" name="promotion">
                        <option value="">Choisir une promotion</option>
                        <?php include
                            '../process/crud/promotions/getPromotions.php';
                        foreach ($promos as $key => $promotion) {
                            echo '<option value="' . $promotion['reference'] . '">' . $promotion['name'] . '</option>';
                        }
                        ?>

                    </select>
                    <button class="m-2 p-2 bg-gray-300 rounded-lg" type="submit">Submit</button>
                </form>
            </div>
            <div class="hidden" id="update">
                <form method="post" action="../../process/crud/sessions/editSession.php" class="grid grid-cols-3 mb-6 ">
                    <input type="hidden" name="id" id="idup" class="p-2 bg-gray-300 rounded-lg">
                    <input class="m-2 p-2 bg-gray-300 rounded-lg" type="text" name="title" id="titleup" placeholder="Titre" required>
                    <input class="m-2 p-2 bg-gray-300 rounded-lg" type="text" name="classroom" id="classroomup" placeholder="Salle" required>
                    <select class="p-2 bg-gray-300 rounded-lg" name="referer"  id="refererup">
                        <?php
                        include '../process/crud/staffs/getStaffs.php';
                        foreach ($staffs as $staff) {
                            echo '<option value="' . $staff['id'] . '" ">' . $staff['firstname'] .' '. $staff['lastname'] . '</option>';
                        }

                        ?>
                    </select>
                    <label for="enable_to_badge_at">Ouverture<input class="m-2 p-2 bg-gray-300 rounded-lg" type="datetime-local" name="enable_to_badge_at" id="enable_to_badge_atup" placeholder="Nom" required></label>
                    <label for="start_at">Début<input class="m-2 p-2 bg-gray-300 rounded-lg" type="datetime-local" name="start_at" id="start_atup" placeholder="Numéro étudiant" required></label>
                    <label for="end_at">Fin<input class="m-2 p-2 bg-gray-300 rounded-lg" type="datetime-local" name="end_at" id="end_atup" placeholder="Prénom" required></label>
                    <select class="m-2 p-2 bg-gray-300 rounded-lg" name="promotion"  id="promotionup">
                            <?php include
                            $sql = "SELECT promotions.id, promotions.name FROM `promotions`
                                            JOIN staff ON referer = staff.id";
                            $sth = $db->prepare($sql);
                            $sth->execute();
                            $promos = $sth->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($promos as $key => $promotion) {
                                echo '<option value="' . $promotion['id'] . '">' . $promotion['name'] . '</option>';
                            }
                            ?>

                    </select>
                    <button class="m-2 p-2 bg-gray-300 rounded-lg" type="submit">Submit</button>
                </form>
            </div>
        </div>
        <?php include '../process/crud/sessions/readSession.php'; ?>

        <div class=" grid grid-cols-7 w-11/12 rounded-lg overflow-auto text-center">
            <p class="font-semibold">Session</p>
            <p class="font-semibold">Début</p>
            <p class="font-semibold">Fin</p>
            <p class="font-semibold">Salle</p>
            <p class="font-semibold"> Référent</p>
            <p class="font-semibold"> Promotions </p>
            <p></p>
            <?php

            include '../process/crud/sessions/getSessions.php';
            foreach ($sessions as $key => $session) {
                echo '<p class="text-sm p-1 ">' . $session['title'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $session['start'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $session['end'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $session['classroom'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $session['referer'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $session['name'] . ' </p>';
                echo '<div class="flex gap-x-3">';
                echo '<div class="h-11 flex justify-center items-center"><a href="../process/crud/sessions/deleteSession.php?ref=' . $session['ref'] . '"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
                echo '<button class="h-11 flex justify-center items-center"  id="' . $session['ref'] . '"><iconify-icon icon="akar-icons:pencil" style="color: #bada55;" width="32" height="32"></iconify-icon></button>';
              ?>
                <script>
                    document.getElementById("<?php echo $session['ref'] ?>").addEventListener("click", () => {
                        document.getElementById("update").classList.toggle("hidden");
                        document.getElementById("idup").value = "<?php echo $session['ref']; ?>";
                        document.getElementById("titleup").value = "<?php echo $session['title']; ?>";
                        document.getElementById("enable_to_badge_atup").value = "<?php echo $session['enable_to_badge_at']; ?>";
                        document.getElementById("start_atup").value = "<?php echo $session['start']; ?>";
                        document.getElementById("end_atup").value = "<?php echo $session['end']; ?>";
                        document.getElementById("classroomup").value = "<?php echo $session['classroom']; ?>";
                        document.getElementById("refererup").value = "<?php echo $session['referer']; ?>";
                    })
                </script>


            <?php    echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
<script src="../src/js//sessions.js"></script>
<?php include("../partials/footer.php"); ?>