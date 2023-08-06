<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <style>
        html body{
            padding:0;
            margin:0;
            overflow:hidden;
        }
        #page1{
            height:100vh;
            width:100vw;
            margin:0;
            padding:0;
        }
        #divvid{
            height:100vh;
            width:28%;
            background-color:black;
            overflow:hidden
        }
        #vid{
            top:10%;
            height:100%;
            width:auto; 
        }


    </style>
</head>
<body>
    <div id="page1">
        <div id="divvid">
                <video autoplay loop muted plays-inline id="vid">
                    <source src="img/logvid.mp4" type="video/mp4">
                </video>
        </div>
    </div>
    
</body>
</html>