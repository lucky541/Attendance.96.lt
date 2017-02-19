<html> 
   
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>    <body>
        <div id="container">
            <button id="play">
                Play Music
            </button>
        </div>

<Hr />
<audio id="carteSoudCtrl">
  <source src="mp3/ams.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
<audio id="carteSoudCtrl1">
    <source src="mp3/ams.mp3" type="audio/mpeg">
Your browser does not support the audio element.
</audio>


    </body>
</html>
<script>

$('document').ready(function () {
    $('#play').click(function () {
   alert('click')
        var audio = {};
        audio["walk"] = new Audio();
        audio["walk"].src = "mp3/ams.mp3"
        audio["walk"].addEventListener('load', function () {
            audio["walk"].play();
        });
    });
//if you want to play first file 
$('#carteSoudCtrl')[0].play();
//if you want to play second file
$('#carteSoudCtrl1')[0].play();

}); 
</script>  