<?php
include '../middlewares/isAuth.php';
include '../process/connect.php';

if ($_SESSION['role'] == 'pilot' || $_SESSION['role'] == 'admin') {
} else {
    header('Location: /views/dashboard.php');
}

?>

<?php include("../partials/head.php");  ?>
<title>Admin - Promotions</title>

<body class="flex justify-center items-center flex-col ">
    <?php include
        '../partials/navbar.php';
    echo '<script>
            document.getElementById("promos").classList.remove("text-white");
            document.getElementById("promos").classList.add("text-[#BADA55]");
         </script>';
    ?>
    <div class=" p-2 rounded-lg flex flex-col justify-center items-center container ">
        <div class="flex flex-col w-full items-center">
            <div class="flex justify-center items-center my-6">
                <button class=" font-semibold p-2 flex justify-center items-center" id="add_promo">
                    <iconify-icon icon="akar-icons:person-add" style="color: #bada55;" width="32" height="32"></iconify-icon>
                </button>
                <form action="promotions.php" method="POST" class="flex  justify-center items-center bg-white  rounded-lg">
                    <input type="search" name="promos_info" placeholder="Nom / Code / Référant" class="border-2 border-black rounded-lg p-2">
                    <input type="submit" value="Recherche" class="cursor-pointer text-black font-semibold rounded-lg p-2">
                </form>
            </div>
            <div class="hidden" id="add">
                <form method="post" action="../../process/crud/promotions/addPromotion.php" class="flex gap-x-3 mb-6">
                    <input type="hidden" name="id" id="id" class="p-2 bg-gray-300 rounded-lg">
                    <input class="p-2 bg-gray-300 rounded-lg" type="text" name="name" id="name" placeholder="Nom" required>
                    <input class="p-2 bg-gray-300 rounded-lg" type="text" name="reference" id="reference" placeholder="Code analytique" required>
                    <input class="p-2 bg-gray-300 rounded-lg" type="text" name="referer" id="referer" placeholder="Référent" required>

                    <label for="start">Début : </label>
                    <input class="p-2 bg-gray-300 rounded-lg" type="datetime-local" name="start_at" id="start_at" required>


                    <label for="end">Fin : </label>

                    <input class="p-2 bg-gray-300 rounded-lg" type="datetime-local" name="finished_at" id="finished_at" required>

                    <button class="p-2 bg-gray-300 rounded-lg" type="submit">Submit</button>
                </form>
            </div>
            <div class="hidden" id="update">
                <form method="post" action="../../process/crud/promotions/editPromotion.php" class="flex gap-x-3 mb-6 ">
                    <input type="text" name="id" id="idup" class="p-2 bg-gray-300 rounded-lg">
                    <input class="p-2 bg-gray-300 rounded-lg" type="text" name="name" id="nameup" placeholder="Nom" required>
                    <input class="p-2 bg-gray-300 rounded-lg" type="text" name="reference" id="referenceup" placeholder="Code analytique" required>
                    <input class="p-2 bg-gray-300 rounded-lg" type="text" name="referer" id="refererup" placeholder="Référent" required>

                    <label for="start">Début</label>
                    <input class="p-2 bg-gray-300 rounded-lg" type="datetime-local" name="start_at" id="start_atup">


                    <label for="end">Fin</label>

                    <input class="p-2 bg-gray-300 rounded-lg" type="datetime-local" name="finished_at" id="finished_atup">

                    <button class="p-2 bg-gray-300 rounded-lg" type="submit">Submit</button>
                </form>
            </div>
            <?php include '../process/crud/promotions/readPromotion.php'; ?>
        </div>
        <div class=" grid grid-cols-6 w-11/12 rounded-lg overflow-auto text-center">
            <p class="font-semibold">Nom</p>
            <p class="font-semibold"> Code analytique</p>
            <p class="font-semibold">Referant</p>
            <p class="font-semibold">Début</p>
            <p class="font-semibold">Fin</p>
            <p></p>
            <?php
            include '../process/crud/promotions/getPromotions.php';
            foreach ($promos as $key => $promo) {
                echo '<p class="text-sm p-1 ">' . $promo['name'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $promo['reference'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $promo['referer'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $promo['start_at'] . ' </p>';
                echo '<p class="text-sm p-1 ">' . $promo['finished_at'] . ' </p>';

                echo '<div class="flex gap-x-3">';
                echo '<div class="h-11 flex justify-center items-center"><a href="../process/crud/promotions/deletePromotion.php?id=' . $promo['id'] . '"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
                echo '<button class="h-11 flex justify-center items-center"  id="' . $promo['id'] . '"><iconify-icon icon="akar-icons:pencil" style="color: #bada55;" width="32" height="32"></iconify-icon></button>';

            ?>
                <script>
                    document.getElementById("<?php echo $promo['id'] ?>").addEventListener("click", () => {
                        document.getElementById("update").classList.toggle("hidden");
                        document.getElementById("idup").value = "<?php echo $promo['id']; ?>";
                        document.getElementById("nameup").value = "<?php echo $promo['name']; ?>";
                        document.getElementById("referenceup").value = "<?php echo $promo['reference']; ?>";
                        document.getElementById("refererup").value = "<?php echo $promo['referer']; ?>";
                        document.getElementById("start_atup").value = "<?php echo $promo['start_at']; ?>";
                        document.getElementById("finished_atup").value = "<?php echo $promo['finished_at']; ?>";
                    })
                </script>
            <?php echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
<script src="../src/js/promotions.js"></script>
<?php include("../partials/footer.php"); ?>