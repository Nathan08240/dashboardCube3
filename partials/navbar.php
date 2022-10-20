<nav class="w-screen bg-black items-center  z-20">
    <div class="h-full w-full text-3xl flex justify-between flex-row-reverse items-center px-6 py-3">
        <div class="gap-x-6 w-full flex items-center justify-between ">
            <?php
            echo '<div class="hidden items-center md:flex">';
            if ($_SESSION['role'] == 'pilot' || $_SESSION['role'] == 'admin') {
                echo '<a href="/views/dashboard.php" class="text-white hover:text-gray-300"><iconify-icon icon="akar-icons:home" style="color: yellow;" width="36" height="36"></iconify-icon></a>';
                echo '<a href="/views/students.php" class="text-white text-lg px-4 py-2 hover:text-[#AFA5DA]" id="students">Etudiants</a>';
                echo '<a href="/views/promotions.php" class="text-white text-lg px-4 py-2 hover:text-[#AFA5DA]" id="promos">Promotions</a>';
                echo '<a href="/views/sessions.php" class="text-white text-lg px-4 py-2 hover:text-[#AFA5DA]" id="sessions">Sessions</a>';
                echo '<a href="/views/staffs.php" class="text-white text-lg px-4 py-2 hover:text-[#AFA5DA]" id="staffs">Staffs</a>';
            }
            echo '</div>';

            ?>
            <div class="flex gap-x-6 h-full justify-center items-center">
                <?= '<p class="text-white text-lg "> ' . $_SESSION['firstname'] . '  ' . $_SESSION['lastname'] . '</p>'; ?>
                <a class="flex items-center" href="#">
                    <iconify-icon icon="carbon:user-avatar" style="color: yellow;"></iconify-icon>
                </a>
                <a class="flex items-center" href="#">
                    <iconify-icon icon="carbon:notification" style="color: yellow;"></iconify-icon>
                </a>
                <a class="flex items-center" href="/process/logout.php">
                    <iconify-icon icon="carbon:logout" style="color: yellow;"></iconify-icon>
                </a>
            </div>


        </div>
        <div class="mr-10 flex md:hidden">
            <button class="text-white text-3xl  flex items-center justify-center md:hidden" id="btn__nav">
                <iconify-icon icon="charm:menu-hamburger" style="color: white;" width="48" height="48"></iconify-icon>
            </button>
        </div>

    </div>
</nav>
<div class="flex hidden fixed inset-0 h-screen w-screen flex-col items-center justify-center bg-transparent backdrop-blur-sm  z-10  overflow-hidden" id="nav__hide">
    <?php
    if ($_SESSION['role'] == 'pilot' || $_SESSION['role'] == 'admin') {
        echo '<a href="/views/dashboard.php" class="text-black hover:text-gray-300"><iconify-icon icon="akar-icons:home" style="color: black;" width="36" height="36"></iconify-icon></a>';
        echo '<a href="/views/students.php" class="text-black text-lg px-4 py-2 hover:text-[#AFA5DA]" id="students">Etudiants</a>';
        echo '<a href="/views/promotions.php" class="text-black text-lg px-4 py-2 hover:text-[#AFA5DA]" id="promos">Promotions</a>';
        echo '<a href="/views/sessions.php" class="text-black text-lg px-4 py-2 hover:text-[#AFA5DA]" id="sessions">Sessions</a>';
        echo '<a href="/views/staffs.php" class="text-black text-lg px-4 py-2 hover:text-[#AFA5DA]" id="staffs">Staffs</a>';
    }
    echo '</div>';
    ?>
</div>

<script>
    const btn__nav = document.getElementById('btn__nav');
    const nav = document.getElementById('nav__hide');
    btn__nav.addEventListener('click', () => {
        nav.classList.toggle('hidden');
    })

</script>