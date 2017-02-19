<?php
  function addSideNav($sideNavArray,$home){
    ?>
<style>
.stopScroll{
    overflow: hidden;
 }
.startScroll{
   overflow: scroll;
 }
.view {
 background: url("../img/bg-img.jpg") no-repeat center center fixed ; /*
background: url("http://smashingyolo.com/wp-content/uploads/2014/05/Best-Website-Background-Images15.jpg") no-repeat center center fixed ;
   background: url("img/bg1.jpg") no-repeat center center fixed;*/
        background-color: #2684db;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
} 
.w3-sidenav a:hover{
  background:transparent;
}
</style>
   <!-- Side navigation starts form here-->
<nav class="w3-sidenav bg  w3-collapse w3-white w3-card-2 w3-animate-left sidenav z-depth-5" style="width:240px;  z-index:10000;" id="mySidenav">
  

  <!-- side nav before logo add some style-->
<div>
      <a href="javascript:void(0)" onclick="w3_close()"  class=" w3-large w3-hide-large" style="margin-left:190px;" > &times;</a>
      <br />
  </div>
  <!--brand logo-->
    <!--<a  style="background: transparent;"><img scr="img/"></a> <hr/>-->
        <!--menu items-->
         <a href="<?php echo $home;?>"><center> <img src="../img/ams/amsgif51.gif"  class="img-reponsive" style="margin: auto;width: 80%; height: auto; "/></center> </a>
          <hr />
        <!--menu items
         <a href="AdminDash.php" class=" waves-effect " onclick="w3_close()">Home</a><hr class="my-2">-->
        <center> 
     <?php
           foreach($sideNavArray as $key => $value) {
                  echo " <a href='{$value}' class='waves-effect' onclick='w3_close()'>{$key}</a><hr class='my-2'>";
                   // echo "key=" . $x . ", Value=" . $value;
                   // echo "<br>";
                }
         ?>

      </center>
       <!-- <a href="Faculties.php" class=" waves-effect" onclick="w3_close()">Faculties</a> <hr class="my-2">
        <a href="#class" class=" waves-effect" onclick="w3_close()">Classes</a><hr /> 
        <a href="#" class=" waves-effect"onclick="w3_close()">Database Settings</a><hr />
        <a href="#" class=" waves-effect" onclick="w3_close()">Settings</a><hr />
         <a href="logMeout.php" class=" waves-effect" onclick="w3_close()">Log Out</a><hr />-->
</nav><!--side nav bar ends here-->


<!-- this dic containe the entire page apart form sidebar -->
<div class="w3-main" id="sidePage" style="margin-left:310px;" >
    
        <!-- hamburger icon starts-->
        <header class="w3-container navbar-fixed-top Add-box-shadow" style=" background-color:  #2684db; width: 50px;" id="ham">
        <span id="Hamburg" class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()"><i class="fa fa-bars" aria-hidden="true" style="color:white;" ></i></span>
        </header>
        <!-- hamburger icon starts-->

        <!-- Purple Header 
        <div class="edge-header" id="note">  
        </div> -->

    
    <?php  
  }
   
  function addFooter(){
      echo '<!--Footer-->
    <footer class="page-footer center-on-small-only col-sm-12">

        
        <!--Call to action-->
        <div class="call-to-action">
            <h4 class="h4-responsive">Attendance Management System</h4>
                <!--/.Call to action-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                &copy 2017 reserverd: <a href="#"> AMS. </a>

            </div>
        </div> </div>
        <!--/.Copyright-->

</footer>
<!--/.Footer-->';
   }

?>