<?php
    $target_dir = "uploads/" . $_POST['folder'];
    if(!file_exists($target_dir)){
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . "/" . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Restrict file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        header('location: index.php?error=1');
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header('location: index.php?error=1');
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            header('location: index.php?upload=1');
    } else {
        header('location: index.php?error=1');
    }
    }
?>
