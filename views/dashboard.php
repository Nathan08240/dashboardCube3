<?php

include '../middlewares/isAuth.php';
include '../process/connect.php';


if ($_SESSION['role'] == 'speaker') {
    include '../process/crud/promotions/getPromotions.php';
    include '../process/crud/students/getStudent.php';
}

?>

<?php include("../partials/head.php");  ?>
<title>Tableau de Bord - Cesi</title>

<body class="h-screen w-screen bg-[#F5F5F5]">
    <!-- DASHBOARD -->
    <?php include '../partials/navbar.php'; ?>

    <?php
    if ($_SESSION['role'] == 'speaker') {
    ?>
        <div class="grid lg:grid-cols-2 lg:grid-rows-1 h-[90%] gap-y-6 gap-x-6 p-6 " id="display">

            <div class="h-full flex flex-col p-8 bg-gray-200 rounded-3xl gap-y-3" id="promo">

                <p class="text-3xl font-semibold">PROMOTIONS</p>
                <div class="h-full w-full bg-[#f2d893] rounded-lg p-2 overflow-auto">
                    <?php
                    foreach ($promo as $key => $value) {
                        echo '<p class="text-3xl font-semibold text-center">' . $value['name'] . '</p>';
                    }
                    ?>
                    <div class="w-full grid grid-cols-3 gap-y-3 p-2" id="grid_promo">
                        <p class="text-2xl p-1 text-center font-semibold">Prénom</p>
                        <p class="text-2xl p-1 text-center font-semibold">Nom</p>
                        <p class="text-2xl p-1 text-center font-semibold hidden span_promo"> Email</p>
                        <p class="text-2xl p-1 text-center font-semibold hidden span_promo">ID</p>
                        <p class="text-2xl p-1 text-center font-semibold">Présence</p>

                        <?php
                        foreach ($students as $key => $student) {
                            echo '<p class="text-xl p-1 text-center">' . $student['firstname'] . ' </p>';
                            echo '<p class="text-xl p-1 text-center">' . $student['lastname'] . ' </p>';
                            echo '<p class="text-xl p-1 text-center hidden span_promo">' . $student['email'] . ' </p>';
                            echo '<p class="text-xl p-1 text-center hidden span_promo">' . $student['school_id'] . ' </p>';
                            if ($student['badge_at'] >= $student['enable_to_badge_at'] && $student['start_at'] <= $student['badge_at']) {
                                $color = 'bg-green-500';
                            } else {
                                $color = 'bg-red-500';
                            }
                            echo '<div class="h-11 w-full flex justify-center text-center items-center"><p class="rounded-lg w-11 py-2 text-center ' . $color . '">' . $student['badge_at'] . '</p></div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="flex  underline text-green">
                    <button id="btn_promo">Voir plus</button>
                </div>
            </div>
        <?php } else {
        echo  '<div class="grid lg:grid-cols-1 lg:grid-rows-1 h-[90%] gap-y-6 gap-x-6 p-6" id="display">';
    } ?>
        <div class="h-full flex flex-col sm:p-8 md:p-0  gap-y-3" id="planning">
            <p class="text-3xl font-semibold">PLANNING</p>
            <div class="h-full w-full  border-solid  overflow-auto">
                <div id='calendar' class=""></div>
            </div>
        </div>
        </div>
        <!-- END DASHBOARD -->
</body>
<script src='/node_modules/fullcalendar/main.js'></script>
<script src="/src/js/calendar.js"></script>
<script src="/src/js/button.js"></script>
<?php include("../partials/footer.php"); ?>