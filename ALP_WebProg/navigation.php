<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<header class="bg-[#2D3250]">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img class="h-16 cursor-pointer" src="assets/images/logo.jpg" alt="...">
        </div>
        <div class="nav-links duration-500 md:static absolute md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                <li>
                    <a class="text-white hover:text-[#F8B179] focus:text-[#F8B179]" href="showmovielist.php">Movie List</a>
                </li>
                <li>
                    <a class="text-white hover:text-[#F8B179] focus:text-[#F8B179]" href="createmovielist.php">Add Movie List</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-6">
            <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
        </div>
    </nav>
</header>
</body>
</html>