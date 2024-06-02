<?php
function my_connectDB () {
    $host = "localhost";
    $user = "root";
    $pwd  = "";
    $db   = "webprog_alp";

    $conn = mysqli_connect($host, $user, $pwd, $db) or die("Error Connect to Database");

    // kembalikan hasil koneksi ke database (mysqli_connect)
    return $conn;
}

// function untuk close connection
function my_closeDB ($conn) {
    mysqli_close($conn);
}


function readMovielist() {
    $allData = array();
    $conn = my_connectDB(); //buka koneksi krn mau connect ke database

    // pengecekan apakah koneksinya berhasil
    if ($conn != NULL) {
        $sql_query = "SELECT * FROM `movielist`";

        // melakukan koneksi ke database, ambil data dari database, ditampung di $result
        $result = mysqli_query($conn, $sql_query) or die (mysqli_error($conn));

        // num_rows itu jumlah row yang ada di dlm $result
        // num_rows itu function yg dipanggil untuk dijalankan atas variable result
        if ($result->num_rows >0) {

            // fetch_assoc akan ambil data dari array yg dikirim di dlm $result satu persatu, disimpan didlm $row, looping
            while ($row = $result -> fetch_assoc()) {
                // simpan data dari database ke dalam array $row yg isinya kolom guestbook_id dari tabel
                $data["id"] = $row["movielist_id"];
                $data["title"] = $row["title"];
                $data["description"] = $row["description"];
                $data["genre"] = $row["genre"];
                $data["duration"] = $row["duration"];
                $data["release_date"] = $row["release_date"];

                // sumpan $data ke dalam $allData
                array_push($allData, $data);
            }
        }
    }
    my_closeDB($conn);
    return $allData;
}


function createMovielist() {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $genre = $_POST["genre"];
    $duration = $_POST["duration"];
    $release_date = $_POST["release_date"];
    $image = $_POST["image"];
    $conn = my_connectDB();

    // kalau variable $conn blm ada isi atau blm balikin sesuatu ya nda isa
    if($conn != NULL) {
        // parameter yg mau dimasukin n-> name email message
        $sql_query = "INSERT INTO `movielist` (title, description, genre, duration, release_date, image) VALUES ('$title', '$description', '$genre', '$duration', '$release_date', '$image')";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        return $result; 
    }
}



function uploadImage($foldername, $photoFile) {

    $target_dir = $foldername."/";
    $target_file = $target_dir . basename($photoFile["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $result = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        $result = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($photoFile["size"] > 500000) {
        $result = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $result .= "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($photoFile["tmp_name"], $target_file)) {
            $result = 1;
        } else {
            $result = "Sorry, there was an error uploading your file.";
        }
    }
    return $result;
}

?>