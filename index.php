<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8" />  
    <title>HTML5 File API</title>  
    <link rel="stylesheet" href="style.css" />  
</head>  
<body>  
    <div id="main">  
        <h1>Upload Your File</h1>  
        <form method="post" enctype="multipart/form-data"  action="#">  
            <input type="file" name="upload_file" id="upload_file" />  
            <button type="submit" id="btn">Convert File!</button>  
        </form>  
        <div id="response">
        </div>  
    </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
    <script src="upload.js"></script>  
</body>  
</html> 