<!-- include once hanya akan manggil 1x, ngecek apakah sblmnya sdh dipanggil -->
<?php include_once("controllermovielist.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>MovieList</title>
</head>
<body>

<?php include_once ("navigation.php"); ?>

<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }
    .grid-item {
        border: 2px solid black;
        padding: 1rem;
    }
    .grid-item ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
</style>

    
    <?php
    $result = readMovielist();
    foreach ($result as $barisdata) {
    ?>
    
    <div class="grid grid-cols-4 gap-4">
        <ul>
            <div class="mx-4 my-4 border-2 border-black p-4">
                <li><?=$barisdata["title"]?></li>
                <li><?=$barisdata["description"]?></li>
                <li><?=$barisdata["genre"]?></li>
                <li><?=$barisdata["duration"]?></li>
                <li><?=$barisdata["release_date"]?></li>
            </div>
        </ul>
    </div>

    <?php
    }
    ?>
</body>
</html>