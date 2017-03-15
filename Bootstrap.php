<?php 
function loadBootstrapCSS(){
   echo '  <meta name="viewport" content="width=device-width,initial-scale=1"/>

  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css"> 

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
 <style>
            #loader{
                 position: fixed;
                 left:0px;
                 right:0px;
                 top:0px;
                 width: 100%;
                 height: 100%;
                 z-index: 100%;
                 background: url("../img/amsLogoLoding2.gif") no-repeat center center;                
            }
           
          
        </style>';
}

function loadBootstrapJs(){
  echo '

 <!-- SCRIPTS Starts -->
   <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>

  <script>
   
               
    $(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on("click", function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "" && this.hash !=="#carousel-example-2") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      /*Assume that the current URL http://www.example.com/test.htm#part2: 
       var x = location.hash;
       
      The result of x will be: #part2
      */
      var hash = this.hash;
      // Using jQuery"s animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $("html, body").animate({
        scrollTop: $(hash).offset().top
      }, 700, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

});

   function w3_open() {
                 document.getElementById("mySidenav").style.display = "block";
                  $("body,html").css("position", "fixed");
               
             }
                function w3_close() {
                    document.getElementById("mySidenav").style.display = "none";  
             $("body,html").css("position", "");
            
                 }


               // loadiner spinner functions
                        var myVar;

                        function myFunction() {
                            myVar = setTimeout(showPage, 1000);
                           
                        }

                        function showPage() {
                          document.getElementById("loader").style.display = "none";
                          document.getElementById("myDiv").style.display = "block";
                        }
               //end loadiner spinner 


  </script>
';

}
 
?>