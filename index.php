<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8" />  
    <title>HTML5 File API</title>  
    <link rel="stylesheet" href="style.css" /> 
    <SCRIPT>

        var image = new Array("jpg","png","gif","bmp","ico","svg");
        var audio = new Array("mp3", "aac", "wav","ogg","m4a","wma");
        var video = new Array("3gp", "avi", "flv","mp4","mp3","mkv","wmv");

        function swapOptions(ArrayName){
            var ExSelect = document.theForm.examples;
            var theArray = eval(ArrayName);
            setOptionText(ExSelect, theArray);
        }

        function setOptionText(theSelect, theArray){
            for (loop = 0; loop < theSelect.options.length; loop++){
                theSelect.options[loop].text = theArray[loop];
            }
        }
    </SCRIPT>
 
</head>  
<body>  
    <div id="main">  
        <h1>Upload Your File</h1>  
        <form method="post" enctype="multipart/form-data" name="theForm" action="#">  
              
    TYPE:   <select name="chooseCat" class="type" ONCHANGE="swapOptions(this.options[selectedIndex].text);" size="1">
                <option selected="selected" class="opt" name="image">image</option>
                <option class="opt" name="audio">audio</option>
                <option class="opt" name="video">video</option>
            </select>
        TO: <select class ="to" size="1" name="examples">
                <option class="opt2" name="jpg">jpg</option>
                <option class="opt2" name="png">png</option>
                <option class="opt2" name="gif">gif</option>
                <option class="opt2" name="bmp">bmp</option>
                <option class="opt2" name="ico">ico</option>
                <option class="opt2" name="svg">svg</option>
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