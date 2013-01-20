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
              
    TYPE:   <select class="type">
                <option class="opt" name="image">image</option>
                <option class="opt" name="audio">audio</option>
                <option class="opt" name="video">video</option>
            </select>
        TO: <select class ="to">
                <option class="opt2" name="png">png</option>
                <option class="opt2" name="jpg">jpg</option>
                <option class="opt2" name="gif">gif</option>
                <option class="opt2" name="mp3">mp3</option>
            </select>
            <input type="file" name="upload_file" id="upload_file" />
            <button type="submit" id="btn">Convert File!</button>  
        </form>  
        <div id="response">
        </div>  
    </div>  
    <script src="jquery.min.js"></script>  
    <script src="upload.js"></script>  
</body>  
</html> 