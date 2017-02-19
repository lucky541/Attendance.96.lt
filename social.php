<?php
 include 'Bootstrap.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to AMS</title>
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
   

        .loginTitle{  
            background-color: #33b5e5;
            position:absolute;
            top:-50px;
            right: 20px;
            left: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;
   }
       

           

@media (max-width: 768px) {
    .full-bg-img,
    .view {
        height: auto;
        position: relative;
    }
}
/* for backgound img Ends*/




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
}

 </style>
    </head>  

<body  style="margin:0;">


     
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
            <a class="navbar-brand" href="index.php">  <img src="img/ams/ams4sm.jpg"  class="img-reponsive" style="margin: auto; height: 20px;"/> </a>
            <!--Links-->
                              <ul class="nav navbar-nav ">
                                    <li class="nav-item">
                                        <a class="nav-link " href="index.php" >Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php" >Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php" >About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php" >Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php" >Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" >Social Media</a>
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

<body class="">
<div class="container" id="fb-root"></div>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id))
        return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="container">
<br /><br />
<div class="divider-new">
        <h2 class="h2-responsive wow fadeInDown">AMS Social Media</h2>
    </div>

<div class="fb-post col-sm-4 animated fadeIn " data-href="https://www.facebook.com/amsiet/photos/a.1199187610164672.1073741827.1194521077297992/1199186873498079/?type=3&theater"></div>

<div class="fb-post col-sm-4 animated fadeIn " data-href="https://www.facebook.com/amsiet/photos/a.1199187610164672.1073741827.1194521077297992/1199190883497678/?type=3&theater"></div>

<div class="fb-post col-sm-4 animated fadeIn " data-href="https://www.facebook.com/amsiet/photos/a.1199187610164672.1073741827.1194521077297992/1199189953497771/?type=3&theater"></div>

<div class="fb-post col-sm-4 animated fadeIn " data-href="https://www.facebook.com/amsiet/photos/a.1199187610164672.1073741827.1194521077297992/1199190883497678/?type=3&theater"></div>

<div class="fb-post col-sm-4 animated fadeIn " data-href="https://www.facebook.com/amsiet/photos/a.1199187610164672.1073741827.1194521077297992/1199191776830922/?type=3&theater"></div>


</div>

 <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
  <script>
</body>
</html>
<!--
<iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Famsiet%2Fposts%2F1199191776830922%3A0&width=500"
 width="500" height="393" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
-->