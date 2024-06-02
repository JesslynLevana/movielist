<?php include_once ("controllermovielist.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Create MovieList</title>
</head>
<body>

<?php include_once ("navigation.php"); ?>

<?php
    if (isset($_POST["createNow"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $genre = $_POST["genre"];
        $duration = $_POST["duration"];
        $release_date = $_POST["release_date"];
        $image = $_POST["image"];

        
        $uploadImage = 1;
        $image_location = "";
        if (isset($_FILES["image"])){
            $photo = $_FILES["image"];
            $foldername = "image";
            $uploadImage = uploadImage($foldername, $photo);
            $image_location = $foldername."/".htmlspecialchars(basename($photo));
        }

        if ($uploadImage == 1){
            // save to database
            $inserted_id = createMovielist();
        } else {
            echo $uploadImage;
        }
    }
?>
    <form action="createmovielist.php" method="POST" enctype="multipart/form-data" class="p-6">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="lg:text-3xl text-2xl font-semibold leading-7 text-gray-900">Create Movie List</h2>
            <p class="mt-1 text-base leading-6 text-gray-600">Fill out the details below to add a new movie to the list.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <input type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="col-span-full">
                <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                <div class="mt-2">
                    <textarea name="description" id="description" rows="3" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="genre" class="block text-sm font-medium leading-6 text-gray-900">Genre</label>
                <div class="mt-2">
                    <input type="text" name="genre" id="genre" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Duration</label>
                <div class="mt-2">
                    <input type="text" name="duration" id="duration" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-2">
                <label for="release_date" class="block text-sm font-medium leading-6 text-gray-900">Release Date</label>
                <div class="mt-2">
                    <input  type="date" name="release_date" id="release_date" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>


             

            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" name="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
    </div>
</form>

    <br>
    <?php
        //cek datanya udah ada blm, udah kesubmit belum
        if(isset($_POST['submit'])) {
            $result = createMovielist();
            echo $result;
            echo '<script>window.location.href = "showmovielist.php";</script>';
        }
    ?>
</body>
</html>