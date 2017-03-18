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
             padding-top:5px;
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
          /* background-color: #2684db;
        width: 110px;*/
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
            <a class="navbar-brand" href="#home" data-toggle="collapse" data-target="#collapseEx">  <img src="img/ams/ams4sm.jpg"  class="img-reponsive" style="margin: auto; height: 20px; z-index:100000;"/> </a>
            <!--Links-->
                              <ul class="nav navbar-nav ">

                                    <li class="nav-item">
                                        <a class="nav-link" href="#Login" data-toggle="collapse" data-target="#collapseEx">Login</a>
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
<div id="landingPage" class="view animated fadeIn content ">
    <div class="flex-center">
        <div class="container">
            <div class="row" id="home">

              <br>
                        <!--First column-->

                        <div class=" font_white" style="margin-top:0px;">
                              <!--First column-->
                           <div class=" animated swing">
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
                            <div id="Login" class="">
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
<div class="feeback animated fadeIn">
<a style="color:white"  class="feedback" data-toggle="modal" data-target="#modal-feedback">
    <i class="fa fa-comments fa-2x  blue-text"></i>
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
                <h4 class="h4-reponsive"> Feedback</h4>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form">
                    <i class="fa fa-user prefix" style=" color:#33b5e5 "></i>
                    <input type="text" id="form2" class="form-control forLogin" name="name" required>
                    <label for="form2">Your Name</label>
                </div>

                <div class="md-form">
                <i class="fa fa-pencil prefix" aria-hidden="true" style=" color:#33b5e5 " style=" color:#33b5e5 "></i>
                <textarea type="text" id="form8" class="md-textarea forLogin" name="feedback" required></textarea>
                <label for="form8">Write to us</label>
                </div>

                <div class="text-xs-center">
                    <button type="submit" class="btn btn-primary ">send</button>
                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>
</form>


<!-- container for youtube Starts-->
<div class="container content" id="Video">
 <br />

<!-- Large modal -->


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
<div class="container animated fadeIn content" id="best-features">

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeInDown">Best Features of AMS</h2>
    </div>

   <div class="col-sm-6 animated" id="amsMobile">
     <img style="max-width: 100%; height: auto; max-height: 550px; " src="img/amsMobile.jpg" alt="amsMobile" />
   </div>

   <div class="col-sm-6 purple z-depth-2 animated best-feature" >
     <br />
       <h3 class="h3-responsive white-text col-sm-2"><img src="img/icons/smartphone.png"></h4>
       <p class="white-text col-sm-10">
         <strong class="mark blue-text">Resposive</strong> come up here to make this more cool then the previous version in which
       I used the slider to show the usp's of the app.</p>
   </div>

   <div class="col-sm-6 "><br /></div>
  <div class="col-sm-6 pink  z-depth-2 animated  best-feature" >  <br />
       <h3 class="h3-responsive white-text col-sm-2"><img src="img/icons/realtime.png"></h3>
       <p class="white-text col-sm-10">
         <strong class="mark blue-text">Real Time System</strong>some text will come up here to make this more cool then the previous version in which
       I used the slider to show the usp's of the app.</p>
   </div>


   <div class="col-sm-6"><br /></div>
   <div class="col-sm-6 blue z-depth-2 animated best-feature" >  <br />
        <h3 class="h3-responsive white-text col-sm-2 "><img  src="img/icons/quick.png"></h3>
       <p class="white-text col-sm-10">
         <strong class="mark blue-text">Quick</strong>some text will come up here to make this more cool then the previous version in which
       I used the slider to show the usp's of the app.</p>
   </div>


   <div class="col-sm-6"><br /></div>
   <div class="col-sm-6 red  z-depth-2 animated best-feature " >  <br />
        <h3 class="h3-responsive white-text col-sm-2"><img src="img/icons/paper.png"></h3>
       <p class="white-text col-sm-10">
         <strong class="mark blue-text">Paperless</strong>some text will come up here to make this more cool then the previous version in which
       I used the slider to show the usp's of the app.</p>
   </div>

</div><!-- container for Best Features Ends-->



<!-- container for About us Starts-->
<div class="container animated fadeIn content" id="about">

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeInDown">About Us</h2>
    </div>

                      <!--First column-->
                        <div class="col-md-12 wow aboutContent"  >
                            <h2 class="h2-responsive">Why is it so great?</h2>
                            <hr>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus modi sint accusantium earum, quisquam dolore odit cumque magnam temporibus blanditiis, nostrum voluptas perferendis, iusto repellendus error corporis ex totam voluptatem.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus modi sint accusantium earum, quisquam dolore odit cumque magnam temporibus blanditiis, nostrum voluptas perferendis, iusto repellendus error corporis ex totam voluptatem.</p>
                        </div>
                        <!--/First column-->

        <!--Watch us div -->
        <div>
          <center>
          <h2 class="h2-responsive aboutContent">Watch Us</h2>
          <br /><br />
          <a  data-toggle="modal" data-target=".bd-example-modal-lg">
          <img src="img/newYoutube.jpg" style="width: 100px; height: auto;" />
          </a>
          <br />
          </center>
        </div><!--/Watch us div -->

</div><!-- About us container ends here-->


<div class="divider-new animated fadeIn content" id="team">
        <h2 class="h2-responsive wow fadeInDown">AMS Team</h2>
 </div>
<div class="view animated fadeIn teamContent"  >
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
                        <p class="text-muted lead flex-center">Web Developer</p>

                        <a class="nav-link" href="https://www.facebook.com/lucky.barkane"><i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i></a>
                          &nbsp;   &nbsp;
                          <a class="nav-link" href="https://github.com/lucky541/"> <i class="fa fa-github fa-2x black-text" aria-hidden="true"></i></a>
                            &nbsp;   &nbsp;
                        <a class="nav-link" href="https://in.linkedin.com/in/lucky-barkane-793820129"> <i class="fa fa-linkedin-square fa-2x"></i></a>


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
<div class="container-fluid animated fadeIn content" id="contact">

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
                      <a href="https://www.facebook.com/amsiet" target="_blank" class="btn btn-primary btn-fb" ><i class="fa fa-facebook left"></i> </a>
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


//in this the id of the  till scroll section will be load
var content = $(".content");
var sectionId='undefined';
$(window).on("scroll", function(e) {
 var el = content.filter(function(i, el) {
   return el.getBoundingClientRect().bottom >= parseInt($(el).css("height"))
 })
 , sectionId = el.prev(".content").is(content)
               ? el.prev(".content").attr("id")
               : content.eq(-1).attr("id");


sectionIdOfSection(sectionId)
}).scroll();
function sectionIdOfSection(sectionId2){
   console.log(sectionId);
  if(sectionId!=sectionId2){
    if(sectionId2=='best-features'){
      $('#amsMobile').addClass('slideInLeft');
      $('.best-feature').addClass('slideInRight');
    }
    if(sectionId2=='about'){
       $('.aboutContent').addClass('slideInUp');
    }
    if(sectionId2=='team'){
      $('.teamContent').addClass('slideInUp');
    }

  //  alert(sectionId2)
    sectionId=sectionId2;
  }
}
  </script>
</body>
</html>
  <?php
  }
?>
