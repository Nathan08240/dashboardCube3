<?php
include("./partials/head.php");

?>
<title>Connexion</title>

<body>
    <!-- login modal with tailwindcss -->
    <div class="flex flex-col items-center justify-center h-screen  bg-no-repeat bg-bottom ">
        <img src="./assets/img/logo-CESI.png" alt="" class="absolute top-[15%] >
        <div class="w-full max-w-xs">
            <!-- create form to connect with session -->
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="process/login.php" method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Email" name="email" required="required">
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Mot de passe
                    </label>
                    <input class="shadow appearance-none  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="password" required="required">

                </div>
                <div class="flex items-center justify-center">
                    <button class="bg-blue-500 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Se connecter
                    </button>

                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2022 Cesi. Tous droits réservés.
            </p>
        </div>
</body>
<?php include("./partials/footer.php");  ?>