<?php
include '../middlewares/isAuth.php';
include '../process/connect.php';

if ($_SESSION['role'] == 'pilot' || $_SESSION['role'] == 'admin') {
} else {
    header('Location: /views/dashboard.php');
}
?>


<?php include("../partials/head.php");  ?>
<title>Admin - Etudiants</title>

<body class="flex justify-center items-center flex-col min-w-['375px'] ">
    <?php include
        '../partials/navbar.php';
    echo '<script>
                        document.getElementById("students").classList.remove("text-white");
                        document.getElementById("students").classList.add("text-[#AFA5DA]");
                   </script>';
    ?>
    <div class=" flex flex-col justify-center items-center  w-full">
        <div class="flex flex-col w-full items-center bg-[#afa5DA] mb-10">
            <div class="flex justify-center items-center  my-6 ">
                <button class=" font-semibold p-2  flex justify-center items-center" id="add_student">
                    <iconify-icon icon="akar-icons:person-add" style="color: black;" width="32" height="32"></iconify-icon>
                </button>
                <form action="students.php" method="POST" class=" bg-[#afa5DA] flex  justify-center items-center bg-white  rounded-lg gap-x-3">
                    <input type="search" name="students_info" placeholder="Prénom / Nom / ID" class=" rounded-lg p-2">
                    <input type="submit" value="Recherche" class=" cursor-pointer text-black font-semibold rounded-lg p-2">
                </form>
            </div>
            <div class="hidden" id="add">
                <form method="post" action="../../process/crud/students/addStudent.php" class="  flex gap-x-3 mb-6">
                    <input type="hidden" name="id" id="id" class="p-2 bg-white rounded-lg">
                    <input class="p-2 bg-white rounded-lg" type="text" name="firstname" id="firstname" placeholder="Prénom" required>
                    <input class="p-2 bg-white rounded-lg" type="text" name="lastname" id="lastname" placeholder="Nom" required>
                    <input class="p-2 bg-white rounded-lg" type="text" name="school_id" id="school_id" placeholder="Numéro étudiant" required>
                    <select name="promotion" id="promotion" class="p-2 bg-white rounded-lg">
                        <option value=""> Choisir une promotion </option>
                        <?php include
                            '../process/crud/promotions/getPromotions.php';
                        foreach ($promos as $key => $promotion) {
                            echo '<option value="' . $promotion['id'] . '">' . $promotion['name'] . '</option>';
                        }
                        ?>

                    </select>
                    <button class="p-2 bg-[#6dc6da] rounded-lg" type="submit">Confirmer</button>
                </form>
            </div>
            <div class="hidden" id="update">
                <form method="post" action="../../process/crud/students/editStudent.php" class="flex gap-x-3 mb-6 ">
                    <input type="hidden" name="id" id="idup" class="p-2 bg-white rounded-lg">
                    <input class="p-2 bg-white rounded-lg" type="text" name="firstname" id="firstnameup" placeholder="Prénom" required>
                    <input class="p-2 bg-white rounded-lg" type="text" name="lastname" id="lastnameup" placeholder="Nom" required>
                    <input class="p-2 bg-white rounded-lg" type="text" name="school_id" id="school_idup" placeholder="Numéro étudiant" required>
                    <select name="promotion" class="p-2 bg-white rounded-lg">
                        <option value="">Choisir une promotion</option>
                        <?php

                        $d = "SELECT * FROM promotions";
                        $sth = $db->prepare($d);
                        $sth->execute();
                        $promos = $sth->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($promos as $key => $promotion) {
                            echo '<option value="' . $promotion['id'] . '">' . $promotion['name'] . '</option>';
                        }
                        ?>
                    </select>
                    <button class="p-2 bg-[#6dc6da] rounded-lg" type="submit">Confirmer</button>
                </form>
            </div>
            <?php include '../process/crud/students/readStudent.php'; ?>
        </div>
        <div class="w-full flex flex-col justify-center items-center" id="search_student">
            <div class=" grid md:grid-cols-6 grid-cols-4 w-11/12 rounded-lg overflow-auto ">
                <p class="font-semibold">Prénom</p>
                <p class="font-semibold ">Nom</p>
                <p class="font-semibold hidden md:block">Mail</p>
                <p class="font-semibold hidden md:block">Numéro étudiant</p>
                <p class="font-semibold">Promotion</p>
                <p class="font-semibold">Action</p>

                <?php

                include '../process/crud/students/getStudent.php';

                foreach ($students as $key => $student) {
                    echo '<p class="text-sm p-1 ">' . $student['firstname'] . ' </p>';
                    echo '<p class="text-sm p-1 ">' . $student['lastname'] . ' </p>';
                    echo '<p class="text-sm p-1 hidden md:block ">' . $student['email'] . ' </p>';
                    echo '<p class="text-sm p-1 hidden md:block">' . $student['school_id'] . ' </p>';
                    echo '<p class="text-sm p-1 ">' . $student['name'] . ' </p>';
                    echo '<div class="flex gap-x-3">';
                    echo '<div class="h-11 flex justify-center items-center"><a href="../process/crud/students/deleteStudent.php?id=' . $student['student_id'] . '"><iconify-icon icon="akar-icons:cross" style="color: red;" width="32" height="32"></iconify-icon></a></div>';
                    echo '<button class="h-11 flex justify-center items-center"  id="' . $student['student_id'] . '"><iconify-icon icon="akar-icons:pencil" style="color: #afa5DA;" width="32" height="32"></iconify-icon></button>';

                ?>
                    <script>
                        document.getElementById("<?php echo $student['student_id']; ?>").addEventListener("click", function() {
                            document.getElementById("update").classList.toggle("hidden");
                            document.getElementById("idup").value = "<?php echo $student['student_id']; ?>";
                            document.getElementById("firstnameup").value = "<?php echo $student['firstname']; ?>";
                            document.getElementById("lastnameup").value = "<?php echo $student['lastname']; ?>";
                            document.getElementById("school_idup").value = "<?php echo $student['school_id']; ?>";

                        });
                    </script>
                <?php
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="../src/js/student.js"></script>
<?php include("../partials/footer.php"); ?>