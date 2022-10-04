<nav class="w-full h-[10%] bg-black items-center">
    <div class="h-full text-3xl flex justify-between flex-row-reverse items-center px-6 py-3">
        <div class="gap-x-6 w-auto flex items-center justify-center">
            <?php    
                echo '<p class="text-white text-lg font-semibold"> Bonjour '.$_SESSION['firstname'].'</p>';
                if ($_SESSION['role'] == 'pilot' || $_SESSION['role'] == 'admin') {
                    if (urldecode($_SERVER['REQUEST_URI']) == '/views/admin.php') {
                        echo '<a href="/views/dashboard.php" class="text-white text-lg font-semibold">Accueil</a>';
                    }
                    else {
                        echo '<a href="/views/admin.php" class="text-white text-lg font-semibold">Admin</a>';
                    }
                }
            ?>
            <button><iconify-icon icon="carbon:notification" style="color: yellow;"></iconify-icon></button>
            <button><iconify-icon icon="carbon:settings" style="color: yellow;"></iconify-icon></button>
            <a href="/process/logout.php"><iconify-icon icon="carbon:logout" style="color: yellow;"></iconify-icon></a>

        </div> 
        <div class="mr-10">
            <button class="text-white text-3xl focus:outline-none flex items-center justify-center hidden">
                <iconify-icon icon="charm:menu-hamburger" style="color: yellow;" width="48" height="48"></iconify-icon>
            </button>
        </div>
    </div>
</nav>