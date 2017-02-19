<?php
  session_start();
  if(isset($_SESSION['role']))
  {
     if(!strcmp($_SESSION['role'], 'admin')){
      header("Location: admin/index.php");
     }
     else if(!strcmp($_SESSION['role'], 'teacher')){
      header("Location: faculty/index.php");
     }

    else if(!strcmp($_SESSION['role'], 'student')){
      header("Location: student/index.php");
     }
     
  }
  else
  {
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome To AMS</title>

   <meta name="viewport" content="width=device-width,initial-scale=1"/>

  <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css"> 

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="css/index.css" rel="stylesheet">
    <style>
         body{
          position: relative; 
         }
          #home{
             padding-top:8%; 
         }
         #about{
             padding-top:20px; 
         } #best-features{
             padding-top:20px; 
         } #team{
             padding-top:30px; 
         }#contact{
             padding-top:20px; 
         }
       #Login{
             padding-top:50px; 
         }
        .loginTitle{  
            background-color: #33b5e5;
            position:absolute;
            top:-50px;
            right: 20px;
            left: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;
   }
       
           
.view {
 background: url("img/bg-img.jpg") no-repeat fixed;
  background-repeat: no-repeat;
    background-size: contain;
 /*  background: url("img/bg1.jpg") no-repeat center center fixed;
        background-color: #2684db; */
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
} 
  #tagline{
        color: white;
    }
}
@media (max-width: 768px) {
    .full-bg-img,
    .view {
    background: url("img/bg-img.jpg") no-repeat ;
    background-size:contain;
    background-position:center;
    }

}
/* for backgound img Ends*/

.imgResponsive{
    margin: auto;
     margin-top: 7%;
    height: auto;
     }


.navbar {
    background-color: #0d47a1;
}

.top-nav-collapse {
    background-color: #0d47a1;
}

@media only screen and (max-width: 768px) {
    .navbar {
        background-color: #0d47a1;
    }
    .imgResponsive{
      width: 90%;
    }
}
.font_white{
    color: black;

}
.side{
          background-color:#0d47a1;
          color: cornsilk;
               height: 30px;
            width: 30px;
            margin-top: 90px;
      }
      .hideoverflow{
          max-height: 200px;
      }
     .dottes{
         box-shadow: 0 0 2px #2684db;
     }
    
     .feeback{
           background-color: #2684db;
        width: 110px;
        padding: 3px;
        position: fixed;
        right: 20px;
        bottom: 20px;
         z-index:10000;
        font-size: 25px;
     } .feeback a{
       color:white;
     }
     .shadowbg{
           box-shadow:0 0 5px #6666;
        }
    
.form-inline{
     display: inline;
  }
.team_pic{
 width: 100%;
}
 </style>
 
 </head>  
}

<body  style="margin:0;">
<!--
<div id="loader" class="navbar-fixed-top"></div>
onload="myFunction()"
<div style="display:none;" id="myDiv"></div>
   -->

     
    <!--Navbar-->
<nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar">
    
     <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container">

        <!--Collapse content-->
        <div class="collapse navbar-toggleable-xs" id="collapseEx">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="#home" data-toggle="collapse" data-target="#collapseEx">  <img src="img/ams/ams4sm.jpg"  class="img-reponsive" style="margin: auto; height: 20px;"/> </a>
            <!--Links-->
                              <ul class="nav navbar-nav ">
                                  
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Login" data-toggle="collapse" data-target="#collapseEx">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#Video" data-toggle="collapse" data-target="#collapseEx">Video</a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" href="#best-features" data-toggle="collapse" data-target="#collapseEx" >Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about" data-toggle="collapse" data-target="#collapseEx" >About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#team" data-toggle="collapse" data-target="#collapseEx">Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contact" data-toggle="collapse" data-target="#collapseEx">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="social.php" target="_blank">Social Media</a>
                                    </li>
                                 </ul> 
            <!--Search form
            <form class="form-inline">
                <input class="form-control" type="text" placeholder="Search">
            </form> -->
        </div>
        <!--/.Collapse content-->

    </div>

</nav>
<!--/.Navbar-->
  

<!--Mask for landing page heading and login form-->
<div id="landingPage" class="view animated fadeIn  ">
    <div class="flex-center">
        <div class="container">
            <div class="row" id="home">

              <br>
                        <!--First column-->

                        <div class=" font_white" style="margin-top:0px;">
                              <!--First column-->
                           <div class="">
                              <img src="img/ams/amsgif51.gif"  class="imgResponsive z-depth-2 " /> 
                            </div>
                             
                              
                                 <div class=" ">
                               <center>
                                 <hr>
                                 <div id ="tagline" class="lead white-text fadeInLeft " data-wow-delay="0.4s" >
                                    The Better Towards The Attendance System.
                                </div> 
                               </center> </div>
                                 
                           
                                <br/>   <br/>
                        </div>
                        <!--/.First column-->

                <!--/.First column-->
                     
                               <br/>
                  
                            <!--Second column-->
                            <div id="Login" class=" animated bounce ">
                                        <!--Form-->
                                         <form class="z-depth-2 " role="form " action="validateUser.php"  method="post">
                                        <div class="card wow fadeInRight">
                                            <div class="card-block row">
                                               
                                                   <h4 class="h4-responsive blue-text  fadeInDown" style="margin-left:15px; ">Login<hr/></h4>
                                           
                                            <div class="md-form col-sm-1"></div>
                                           
                                            <div class="md-form col-sm-4">
                                                    <i class="fa fa-user prefix" aria-hidden="true" style=" color:#33b5e5 " ></i>
                                                
                                                       <!--TAKING USER PASSWORD IN THIS FIELD-->
                                                      <input type="text" id="form1" class="form-control forLogin" name="input_username" required>
                                                    <label for="form1">Your username</label>
                                                </div>
                                                
                                                
                                                <div class="md-form col-sm-4">
                                                    <i class="fa fa-lock prefix" aria-hidden="true" style=" color:#33b5e5 " ></i>
                                                
                                                       <!--TAKING USER PASSWORD IN THIS FIELD-->
                                                      <input type="text" id="form2" class="form-control forLogin" name="input_password" required>
                                                    <label for="form2">Your password</label>
                                                </div>
                                                       
                                              
                                                <div class="text-xs-center">
                                                    <button type="submit" class="btn btn-info waves-effect">Login</button>
                                                </div>
                                                  
                                                <!--invalid username or password message will be load in this div -->                                          
                                                
                                                    <?php
                                                         if(isset($_GET['message'])){
                                                              echo ' 
                                                                 <div class="text-xs-left red-text col-sm-4" id="LoginResponseText">username or password is not valid.</div>
                                                             ';
                                                          }
                                                    ?>
                                            </div>
                                        </div>
                                        </form>
                                        <!--/.Form-->
                                    </div>
                            
                            <!--/Second column-->
            </div>
        </div>
    </div>
</div>
<!--/.Mask for landing page ends-->


  <!---feed back button-->
<div style="position:relative" id="feedbackContainer">
<div class="feeback z-depth-2 animated fadeIn">
<a style="color:white"  class="feedback" data-toggle="modal" data-target="#modal-feedback">
    feedback
</a>
  </div>
</div>


                      
<!-- Modal Login -->
<form action="Feedback.php" method="post">
<div class="modal fade modal-ext" id="modal-feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
           
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="h3-reponsive"> Feedback</h3>
            </div>
            
            <!--Body-->
            <div class="modal-body">
                <div class="md-form">
                    <i class="fa fa-user prefix" style=" color:#33b5e5 "></i>
                    <input type="text" id="form2" class="form-control" name="name">
                    <label for="form2">Your Name</label>
                </div>

                <div class="md-form">
                <i class="fa fa-pencil prefix" aria-hidden="true" style=" color:#33b5e5 " style=" color:#33b5e5 "></i>
                <textarea type="text" id="form8" class="md-textarea" name="feedback"></textarea>
                <label for="form8">Write to us</label>
                </div>

                <div class="text-xs-center">
                    <button type="submit" class="btn btn-outline-primary ">send</button>
                </div>
            </div>
            
        </div>
        <!--/.Content-->
    </div>
</div>
</form>


<!-- container for youtube Starts-->
<div class="container" id="Video">
 <br />
    <div class="divider-new ">
        <h2 class="h2-s wow fadeInDown">Watch Us</h2>
    </div>
<!-- Large modal -->
<center>
  <br /><br />
<a  data-toggle="modal" data-target=".bd-example-modal-lg">
 <img src="img/newYoutube.jpg" style="width: 100px; height: auto;" />
</a>  
  <br /><br /><br />
</center>

<!-- IN THE BELOW DIV THE YOUTUBE VIDEO IS EMBADED-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="">
  <div class="modal-dialog modal-lg">
        <button type="button" style="border-radius:145px; " onclick="closeit()" class="btn btn-danger btn-sm float-xs-right" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
        <br />  <br />
<div class="embed-responsive embed-responsive-16by9">
    <iframe id="video" class="embed-responsive-item" src="https://www.youtube.com/embed/QNvVNwV7Lsc?rel=0" frameborder="0" allowfullscreens>
      
    </iframe>
</div>
    
  </div>
</div><!-- IN THE ABOVE DIV THE YOUTUBE VIDEO IS EMBADED-->
</div>

<!-- container for Best Features Starts-->
<div class="container animated fadeIn" id="best-features">

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeInDown">Best Features of AMS</h2>
    </div>



        <div class="hoverable">
            <!--First column-->
                        <center>
                            <!--Second column-->
                            <div class=" animated slideInRight hideoverflow">
                            <!--Carousel Wrapper-->
                            <div id="carousel-example-2"  class="carousel slide  "  data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators" >
                            <li data-target="#carousel-example-2" data-slide-to="0" class="active dottes"></li>
                            <li data-target="#carousel-example-2" data-slide-to="1" class="dottes"></li>
                            <li data-target="#carousel-example-2" data-slide-to="2" class="dottes"></li>
                            <li data-target="#carousel-example-2" data-slide-to="3" class="dottes"></li>
                            </ol>
                            <!--/.Indicators-->

                               
<!--Slides-->
<div class="carousel-inner" role="listbox">
  
  <div class="carousel-item active ">
                <!--Card-->
            <div class="card  "  >
            <center>  <!--Card image--> 
            <div class=" overlay hm-white-slight ">
            <img src="img/ams/ams4sm.jpg" class="img-fluid" alt=""> 
            <a href="#">
            <div class="mask"></div>
            </a>
            </div> 
            <!--/.Card image-->
            <!--Card content-->
            <div class="card-block">
            <!--Title-->
            <h4 class="card-title"><b>Fast</b></h4>
            <!--Text--><hr />
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           </div>
            <!--/.Card content-->
            </center>
            <br /> <br />
            </div>
            <!--/.Card-->
  </div>
            
  <div class="carousel-item">
             <!--Card-->
            <div class="card  "  >
           <center>  <!--Card image--> 
            <div class=" overlay hm-white-slight">
            <img src="img/ams/ams4sm.jpg" class="img-fluid" alt=""> 
            <a href="#">
            <div class="mask"></div>
            </a>
            </div> 
            <!--/.Card image-->
            <!--Card content-->
            <div class="card-block">
            <!--Title-->
            <h4 class="card-title"><b>Mobile Accessible</b></h4>
            <!--Text--><hr />
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           </div>
            <!--/.Card content-->
            </center>
            <br /> <br />
            </div>
            <!--/.Card-->
 </div>
      
                
  <div class="carousel-item">
         <!--Card-->
            <div class="card "  >
             <center>  <!--Card image--> 
            <div class=" overlay hm-white-slight">
            <img src="img/ams/ams4sm.jpg" class="img-fluid" alt=""> 
            <a href="#">
            <div class="mask"></div>
            </a>
            </div> 
            <!--/.Card image-->
            <!--Card content-->
            <div class="card-block">
            <!--Title-->
            <h4 class="card-title"><b>Rich UI</b></h4>
            <!--Text--><hr />
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           </div>
            <!--/.Card content-->
            </center>
            <br /> <br />
            </div>
            <!--/.Card-->
   
 </div>

            
  <div class="carousel-item">
         <!--Card-->
            <div class="card "  >
            <center>  <!--Card image-->
            <div class=" overlay hm-white-slight">
            <img src="img/ams/ams4sm.jpg" class="img-fluid" alt=""> 
            <a href="#">
            <div class="mask"></div>
            </a>
            </div> 
            <!--/.Card image-->
            <!--Card content-->
            <div class="card-block">
            <!--Title-->
            <h4 class="card-title"><b>Secure</b></h4>
            <!--Text--><hr />
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
           </div>
            <!--/.Card content-->
            </center>
            <br /> <br />
            </div>
            <!--/.Card-->
       </div>
    </div>

                                
<!--Controls-->
<a class="left carousel-control side" href="#carousel-example-2" role="button" data-slide="prev" >
<span class="icon-prev " aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control side" href="#carousel-example-2" role="button" data-slide="next">
<span class="icon-next" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
<!--/.Controls-->
                            </div>
                            <!--/.Carousel Wrapper-->
                        </div>
                        <!--/Second column-->
                        </center>
     </div> <!-- row div ends here-->
      <br />
       <br />
  
</div><!-- container for Best Features Ends-->



<!-- container for About us Starts-->
<div class="container animated fadeIn" id="about">

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeInDown">About Us</h2>
    </div>

                      <!--First column-->
                        <div class="col-md-12 wow fadeIn">
                            <h2 class="h2-responsive">Why is it so great?</h2>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus modi sint accusantium earum, quisquam dolore odit cumque magnam temporibus blanditiis, nostrum voluptas perferendis, iusto repellendus error corporis ex totam voluptatem.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus modi sint accusantium earum, quisquam dolore odit cumque magnam temporibus blanditiis, nostrum voluptas perferendis, iusto repellendus error corporis ex totam voluptatem.</p>
                        </div>
                        <!--/First column-->
       
</div><!-- About us container ends here-->


<div class="divider-new animated fadeIn" id="team">
        <h2 class="h2-responsive wow fadeInDown">AMS Team</h2>
 </div>
<div class="view animated fadeIn"  >
<!--      <!-- container for Team-->

          <div class="team container">
                     
                     
                       <center>
                      <div class="float-xs-center card" style="max-width: 300px;">
                      
                      <div class="">
                      <img class="team_pic z-depth-2"  src="img/lucky.jpg" alt="Lucky Barkane" >
                      <br >
                      </div>

                       <div class="white">
                       <h3 class="h3-responsive "><br/><b>Lucky Barkane</b><br /> </h3>
                        <p class="text-muted lead">Web Developer</p>
                       
                        <a href="https://www.facebook.com/lucky.barkane" target="_blank" class="btn btn-primary">
                       <i class="fa fa-facebook " ></i> </a>
                       <br/>
             <br/>
                      <!--
                      <p>You can write here details about one of your team members. You can give more details about what they do. Feel free to add some <a href="#">links</a> for people to be able to follow them outside the site.</p>
                      --> 
                      
                      </div>
                      </div>
                   </center>

          </div>
</div> <!-- Team container ends here--> 


<!-- container for Contact us-->
<div class="container-fluid animated fadeIn" id="contact">

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeInDown ">Contact Us</h2>
    </div>
          <!-- contact form stats -->
          <div class="col-md-8 animated fadeIn ">
                                <!--Form-->
                                <form action="sendMessage.php" method="post">
                                <div class="card wow fadeInRight ">
                                    <div class="card-block">
                                        <!--Header-->
                                        <div class="text-xs-left">
                                          <br/>  <h3 class="h3-responsive blue-text">Sends Comment </h3><hr/></div>
                                        

                                        <!--Body-->
                                        <div class="md-form ">
                                        <i class="fa fa-envelope prefix" aria-hidden="true" style=" color:#33b5e5 "></i>
                                            <input type="email" id="form6" class="form-control forLogin" name="emailId" required>
                                              <label for="form7">Your Email ID</label>
                                        </div>

                                        <div class="md-form">
                                         <i class="fa fa-user prefix" aria-hidden="true" style=" color:#33b5e5 "></i>
                                          
                                            <input type="text" id="form7" class="form-control forLogin" name="subject" required>
                                            <label for="form7">Subject</label>
                                        </div>
                                       
                                      <!--Textarea with icon prefix-->
                                            <div class="md-form">
                                             <i class="fa fa-pencil prefix" aria-hidden="true" style=" color:#33b5e5 "></i>
                                               
                                                <textarea type="text" id="form8" class="md-textarea forLogin" name="message" required></textarea>
                                                <label for="form8">Write to us</label>
                                            </div>
                                        <div class="text-xs-left">
                                            <button type="submit" class="btn btn-info waves-effect">Send</button>
                                           </div>
                                   </div>
                                </div>
                                </form>
                                <!--/.Form-->
                           </div><!-- contact form ends -->


                            <!--Second column-->
                        <div class="col-md-4 wow fadeIn card">  
                          <div class="card-block">
                          <!--Header-->
                          <div class="text-xs-left">
                            <br/>  <h3 class="h3-responsive blue-text">IET-DAVV, Indore(452001)</h3><hr/></div>
                         

                            <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus modi sint accusantium earum, quisquam dolore odit cumque magnam temporibus blanditiis, nostrum voluptas perferendis, iusto repellendus error corporis ex totam voluptatem.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus modi sint accusantium earum, quisquam dolore odit cumque magnam temporibus blanditiis, nostrum voluptas perferendis, iusto repellendus error corporis ex totam voluptatem.</p>
                        </div>
                        </div>
                        <!--/Second column-->  
  
</div><!-- Contact us container ends here-->
 
  <!--Footer-->
    <footer class="page-footer center-on-small-only">

        
        <!--Call to action-->
        <div class="call-to-action ">
            <h4 class="h4-responsive">Attendance Management System</h4>
                <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
               &copy 2017 reserverd: <a href="#home" class="white-text"> AMS. </a>       

               
             </div>
           
           
        </div>
        <!--/.Copyright-->
         <div class="white-text"> Follow Us :
                      <a href="https://www.facebook.com/lucky.barkane" target="_blank" class="btn btn-primary btn-fb" style="border-radius: 60px; "><i class="fa fa-facebook left"></i> </a>
                </div>
        </div>
</footer>
<!--/.Footer-->

 <!-- SCRIPTS Starts -->
   <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    

    
  <script>
   // loadiner spinner functions
                        var myVar;

                        function myFunction() {
                            myVar = setTimeout(showPage, 500);
                        }

                        function showPage() {
                          document.getElementById("loader").style.display = "none";
                          document.getElementById("myDiv3").style.display = "block";
                        }
               //end loadiner spinner
               
    $(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "" && this.hash !=='#carousel-example-2') {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      /*Assume that the current URL http://www.example.com/test.htm#part2: 
       var x = location.hash;
       
      The result of x will be: #part2
      */
      var hash = this.hash;
      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 700, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

});

$('.forLogin').focus(function(){
  $('#feedbackContainer').hide();
});

$('.forLogin').blur(function(){
 $('#feedbackContainer').show();
});

function closeit(){
            $('iframe').attr('src', $('iframe').attr('src'));
}
  </script>
</body>
</html>
  <?php 
  }
?>
