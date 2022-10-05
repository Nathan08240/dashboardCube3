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
    <div class="flex flex-col justify-evenly w-full">
        <form action="promotions.php" method="POST" class="flex  justify-center items-center gap-y-3 bg-white p-8 rounded-lg">
            <input type="search" name="promos_info" placeholder="Nom / Code / Référant" class="border-2 border-black rounded-lg p-2">
            <input type="submit"  value="Recherche" class="cursor-pointer text-black font-semibold rounded-lg p-2">
        </form>
        <?php include '../process/crud/promotions/readPromotion.php'; ?>
    </div>
    <div class=" grid grid-cols-4 w-11/12 rounded-lg overflow-auto text-center">
        <p class="font-semibold">Nom</p>
        <p class="font-semibold"> Code analytique</p>
        <p class="font-semibold">Referant</p>
        <p ></p>
        <?php
        include '../process/crud/promotions/getPromotions.php';
        foreach ($promos as $key => $promo ) {
            echo '<p class="text-sm p-1 ">'.$promo['name'].' </p>';
            echo '<p class="text-sm p-1 ">'.$promo['reference'].' </p>';
            echo '<p class="text-sm p-1 ">'.$promo['referer'].' </p>';

            echo '<a href="#" class="text-sm p-1 underline text-blue-900"> Détail</a>';
        }
        ?>
    </div>
</div>
</body>
<?php include("../partials/footer.php"); ?>
