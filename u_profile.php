<?php
include "header.php";
include "conn.php";


$id = $_SESSION['id'];
$select = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);

?>
<style>

body {
    background-color: #f9f9fa;
 
}

.padding {
    padding: 3rem !important
}

.user-card-full {
    overflow: hidden;
   

  
}

.card {
    border-radius: 10px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    box-shadow: 0 1px 20px 0 rgba(69,90,100,0.08);
    border: none;
    margin-bottom: 30px;
    width: 800px;
    margin-left: -75px;

}

.m-r-0 {
    margin-left: 250px;
}

.m-l-0 {
    margin-left: 0px;
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px;
}

.bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
    background: linear-gradient(to right, #ee5a6f, #f29263);
}

.user-profile {
    padding: 20px 0;
}

.card-block {
    padding: 1.25rem;
}

.m-b-25 {
    margin-bottom: 25px;
}

.img-radius {
    border-radius: 5px;
    
}


 
h6 {
    font-size: 14px;
    padding: -5px;
}

.card .card-block p {
    line-height: 25px;
}

@media only screen and (min-width: 1400px){
p {
    font-size: 14px;
}
}

.card-block {
    padding: 1.25rem;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.m-b-20 {
    margin-bottom: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.card .card-block p {
    line-height: 25px;
}

.m-b-10 {
    margin-bottom: 10px;
}

.text-muted {
    color: #919aa3 !important;
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-20 {
    margin-bottom: 20px;
}

.m-t-40 {
    margin-top: 20px;
}

.p-b-5 {
    padding-bottom: 5px !important;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-40 {
    margin-top: 20px;
}

.user-card-full .social-link li {
    display: inline-block;
}

.user-card-full .social-link li a {
    font-size: 20px;
    margin: 0 10px 0 0;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
#btn {
  
            width: 150px;
            margin-top: 20px;
            background-color: hsl(0, 100.00%, 50.00%);
            height: 40px;
            color: white;
            border-radius: 10px;
            margin-left: 5px;
            border: none;
            text-decoration: none;

            
       
   
}




</style>



<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-6 col-md-12">
          <div class="card user-card-full">
               <div class="row m-l-0 m-r-0">
                      <div class="col-sm-4 bg-c-lite-greenuser-profile">
                <div class="card-block text-centertext-white">
               <div class="m-b-25">
                  <img src="users/<?php echo $row['image']?>"class="img-radius"alt="User-Profile-Image" width="200px"  height="220px">
                 </div >
                 <h6 class="text-center">Name</h6>
                 <h3 class="f-w-600 text-center"><?php echo $row['username']?></h3>
                 <i class=" mdi mdi-square-edit-outlinefeather icon-edit m-t-10 f-16"></i>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="card-block">
                        <h4 class="m-b-20 p-b-5 b-b-defaultf-w-600 "style="margin-left:130px;">Information</h4>
                 <div class="row">
                     <div class="col-sm-6">
                         <p class="m-b-10 f-w-600">Email<p>
                         <h6 class="text-mutedf-w-400"><?php echo $row['email']?></h6>
              </div><br><br><br><br>
              <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Phone<p>
                  <h6 class="text-mutedf-w-400"><?php echo $row['phone']?></h6>
                     </div>

                     <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">addres<p>
                  <h6 class="text-mutedf-w-400"><?php echo $row['addres']?></h6>
                     </div>
                 </div>
              
              </div>
              <ul class="social-link list-unstyledm-t-40 m-b-10">
       <li><a href="#!"data-toggle="tooltip"data-placement="bottom" title=""data-original-title="facebook"data-abc="true"><i class="mdimdi-facebook feather icon-facebookfacebook" aria-hidden="true"></i><a></li>

         <li><a href="#!"data-toggle="tooltip"data-placement="bottom" title=""data-original-title="twitter"data-abc="true"><i class="mdimdi-twitter feather icon-twittertwitter" aria-hidden="true"></i><a></li>
                                                               
         <li><a href="#!"data-toggle="tooltip"data-placement="bottom" title=""data-original-title="instagram"data-abc="true"><i class="mdimdi-instagram feather icon-instagraminstagram" aria-hidden="true"></i><a></li>
                                                                
         <form method="POST">
         
         <button id="btn" name="btn_logout" class="btn-ship"><a href="shipping.php" class="text-light">Shipping Details</a></button>                                                  
         <button  id="btn" name="btn_logout" class="m-5 btn-ship" >logout</button>
            
                                      </form>
                                 </ul>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
              </div>
               </div>
           </div>
                                        <?php

    if(isset($_POST['btn_logout']))
    {
        session_destroy();
        echo "<script>window.location.href='login.php';</script>";
    }
    ?>













<?php
include "footer.php";
?>