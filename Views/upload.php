<?php
if(isset($_POST['submit_image']))
{
    $uploadfile = $_FILES["upload_file"]["tmp_name"];
    $folder = "images/";
    move_uploaded_file($_FILES["upload_file"]["tmp_name"], "$folder".$_FILES["upload_file"]["name"]);
    exit();
}
?>

<html>
<head>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.form.js"></script>
    <script>
        $(document).ready(function() { 
            $('form').ajaxForm(function() { 
            }); 
        });
    </script>
</head>
<body>
    <div id="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" id="upload_file" name="upload_file" />
            <input type="submit" name='submit_image' value="Upload Image"/>
        </form>
    </div>
</body>
</html>