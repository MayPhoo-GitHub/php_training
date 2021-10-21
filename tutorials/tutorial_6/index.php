<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Tutorial-6</title>
</head>
<body>
    <div class="container">
        <h1 class="mb-3">Upload Image</h1>
        <?php if (isset($_GET['upload'])): ?>
            <div class="alert alert-success">
                Uploaded Successfully.
            </div>
        <?php endif?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-warning">
                Fail to Upload.
            </div>
        <?php endif?>

        <form action="upload.php" method = "post"
            enctype="multipart/form-data">
            <input type="text" name="folder" placeholder="Enter Folder Name"><br><br>
            <input type="file" name="fileToUpload" class="form-control"><br>
            <button class="btn btn-primary"> Upload </button>
        </form>
    </div>

</body>
</html>