<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Form</title>
</head>
<body>
    <h2>Upload a File</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php
        //Check if the form is sumitted
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])){
            $targetDir = "./"; // Direction where uploaded files will be stored 
            $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);//Path to the uploaded file 
            if(file_exists($targetFile)){
                echo "Sorry,file already exists.";
            }else{
                //Try to upload file 
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFile)){
                    echo "The file" . basename($_FILES["fileToUpload"]["name"]) . "has been uploaded";
                }else{
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

    ?>
</body>
</html>