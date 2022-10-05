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
        <div class="flex flex-col justify-evenly w-full">
            <form action="sessions.php" method="POST" class="flex  justify-center items-center gap-y-3 bg-white p-8 rounded-lg">
                <input type="search" name="sessions_info" placeholder="Prénom / Nom / ID" class="border-2 border-black rounded-lg p-2">
                <input type="submit"  value="Recherche" class="cursor-pointer text-black font-semibold rounded-lg p-2">
            </form>
            <?php include '../process/crud/sessions/readSession.php'; ?>
        </div>
        <div class=" grid grid-cols-6 w-11/12 rounded-lg overflow-auto text-center">
            <p class="font-semibold">Session</p>
            <p  class="font-semibold">Début</p>
            <p  class="font-semibold">Fin</p>
            <p  class="font-semibold">Salle</p>
            <p class="font-semibold"> Référent</p>
            <p></p>
            <?php
            include '../process/crud/sessions/getSessions.php';
            foreach ($sessions as $key => $session ) {
                echo '<p class="text-sm p-1 ">'.$session['title'].' </p>';
                echo '<p class="text-sm p-1 ">'.$session['start'].' </p>';
                echo '<p class="text-sm p-1 ">'.$session['end'].' </p>';
                echo '<p class="text-sm p-1 ">'.$session['classroom'].' </p>';
                echo '<p class="text-sm p-1 ">'.$session['referer'].' </p>';
                echo '<a href="#" class="text-sm p-1 underline text-blue-900"> Détail</a>';
            }
            ?>
        </div>
    </div>
    </body>
<?php include("../partials/footer.php"); ?>