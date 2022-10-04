<?php
include '../middlewares/isAuth.php';
include '../process/connect.php';

?>

<?php include("../partials/head.php");  ?>
<title>Admin - Cesi</title>
<body class="h-screen w-screen overflow-x-hidden ">
    <?php include '../partials/navbar.php'; ?>
    
    <div class="grid lg:grid-cols-2 lg:grid-rows-1 h-full w-full gap-y-6 gap-x-6 p-6" id="display_admin1">
        <div class=" p-2 rounded-lg flex flex-col">
            <div class="flex justify-evenly ">
                <p class="text-3xl font-semibold pb-4 ">ETUDIANTS</p>
                <div class="">
                    <button id="read0">
                        <iconify-icon icon="bx:search" style="color: black;" width="36" height="36"></iconify-icon>
                    </button>
                    <button>
                        <iconify-icon icon="akar-icons:plus" width="36" height="36"></iconify-icon>
                    </button>    
                    <button id="delete0">
                        <iconify-icon icon="akar-icons:trash" width="36" height="36"></iconify-icon>
                    </button>
                </div>
                <?php include '../process/crud/students/readStudent.php'; ?>  
            </div>
            <div class=" grid grid-cols-3  w-full rounded-lg overflow-auto ">
                <p>Prénom</p>
                <p>Nom</p>
                <p class="text-center">Badge</p>
                <?php
                    
                include '../process/crud/students/getStudent.php';

                foreach ($students as $key => $student ) {
                    echo '<p class="text-xl p-1 ">'.$student['firstname'].' </p>';
                    echo '<p class="text-xl p-1 ">'.$student['lastname'].' </p>';
                    if ($student['badge_at'] >= $student['enable_to_badge_at'] && $student['start_at'] <= $student['badge_at']) {
                        $color = 'bg-green-500';
                    }
                    else {
                        $color = 'bg-red-500';
                    }
                    echo '<div class="h-11 w-full flex justify-center text-center items-center"><p class="rounded-lg w-11 py-2 text-center '.$color .'">'.$student['badge_at'].'</p></div>';
                }  
                ?>

            </div>
        </div>

        <div class=" p-2 rounded-lg flex flex-col">
            <div class="flex justify-evenly">
                <p class="text-3xl font-semibold pb-4">PROMOTIONS</p>
                <div>
                    <button id="read1">
                        <iconify-icon icon="bx:search" style="color: black;" width="36" height="36"></iconify-icon>
                    </button>
                    <button>
                        <iconify-icon icon="akar-icons:plus" width="36" height="36"></iconify-icon>
                    </button>   
                    <button id="delete1">
                        <iconify-icon icon="akar-icons:trash" width="36" height="36"></iconify-icon>
                    </button>
                </div>           
                <?php include '../process/crud/promotions/readPromotion.php'; ?>
            </div>
            <div class="grid grid-cols-2 w-full rounded-lg overflow-auto ">
                <p>Nom</p>
                <p>Code analytique</p>
                <?php
                    include '../process/crud/promotions/getPromotions.php';
                    foreach ($promos as $key => $promo ) {
                        echo '<p class="text-xl p-1 ">'.$promo['name'].' </p>';
                        echo '<p class="text-xl p-1 ">'.$promo['reference'].' </p>';
                    }  
                ?>
            </div>
        </div>
        
        <div class=" p-2 rounded-lg flex flex-col">
            <div class="flex justify-evenly">
                <p class="text-3xl font-semibold pb-4">SESSIONS</p>
                <div>
                    <button id="read2">
                        <iconify-icon icon="bx:search" style="color: black;" width="36" height="36"></iconify-icon>
                    </button>
                    <button>
                        <iconify-icon icon="akar-icons:plus" width="36" height="36"></iconify-icon>
                    </button>
                    <button id="delete2">
                        <iconify-icon icon="akar-icons:trash" width="36" height="36"></iconify-icon>
                    </button>
                </div>
                <?php include '../process/crud/sessions/readSession.php'; ?>
            </div>
            <div class="grid grid-cols-3 w-full rounded-lg overflow-auto ">
                <p>Session</p>
                <p>Début</p>
                <p>Fin</p>
                <?php
                    include '../process/crud/sessions/getSessions.php';
                    foreach ($sessions as $key => $session ) {
                        echo '<p class="text-xl p-1 ">'.$session['title'].' </p>';
                        echo '<p class="text-xl p-1 ">'.$session['start'].' </p>';
                        echo '<p class="text-xl p-1 ">'.$session['end'].' </p>';
                    }  
                ?>
            </div>
        </div>

        <!-- create for staffs -->
        <div class=" p-2 rounded-lg flex flex-col">
            <div class="flex justify-evenly">
                <p class="text-3xl font-semibold pb-4">STAFFS</p>
                <div>
                    <button id="read3">
                        <iconify-icon icon="bx:search" style="color: black;" width="36" height="36"></iconify-icon>
                    </button>
                    <button>
                        <iconify-icon icon="akar-icons:plus" width="36" height="36"></iconify-icon>
                    </button>
                    <button id="delete3">
                        <iconify-icon icon="akar-icons:trash" width="36" height="36"></iconify-icon>
                    </button>
                </div>
                <?php include '../process/crud/staffs/readStaff.php'; ?>
            </div>
            <div class="grid grid-cols-3 w-full rounded-lg overflow-auto ">
                <p>Prénom</p>
                <p>Nom</p>
                <p>Role</p>
                <?php
                    include '../process/crud/staffs/getStaffs.php';
                    foreach ($staffs as $key => $staff ) {
                        echo '<p class="text-xl p-1 ">'.$staff['firstname'].' </p>';
                        echo '<p class="text-xl p-1 ">'.$staff['lastname'].' </p>';
                        echo '<p class="text-xl p-1 ">'.$staff['role'].' </p>';
                    }  
                ?>
            </div>
            </div>

    </div>
<script src="/src/js/button_crud.js"></script>
</body>
<?php include("../partials/footer.php"); ?>