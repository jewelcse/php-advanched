<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row bg-info p-5 m-5">
            <form action="upload_file_action.php" method="post" enctype="multipart/form-data">
                <h2>Upload File</h2>
                <label for="fileSelect">Filename:</label>
                <input type="file" name="photo" id="fileSelect">
                <input type="submit" name="submit" value="Upload">
                <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
            </form> 
        </div>

    </div>
</body>
</html>
