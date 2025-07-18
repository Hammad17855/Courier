<?php
include "header.php";
include "conn.php";
$id =  $_SESSION['id'];
 $select = "SELECT * FROM users WHERE id = $id";
 if (!isset($_SESSION['id'])) {
   
   header("Location: login.php");
   exit(); 
}



 $selectt = "SELECT * FROM `users` WHERE role='agent'";
 $result = mysqli_query($conn, $select);
 $resultt = mysqli_query($conn, $selectt);
 $row = mysqli_fetch_assoc($result);
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
   
    exit(); 
    
}
?>
<style>

.get-in-touch {
  max-width: 800px;
  margin: 50px auto;
  position: relative;

}
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 3.2em;
  line-height: 48px;
  /* padding-bottom: 48px; */
     color: #5543ca;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: #5543ca;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label,
.contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 11px;
  font-size: 18px;
  line-height: 66px;
  font-weight: 400;
  color: #5543ca;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out, 
  -webkit-transform .2s ease-in-out;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: #000;
   background-image: linear-gradient(125deg,#a72879,#064497);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
  cursor: pointer;
  margin-left: 300px;
}
.dec{
    /* margin-top: 20px; */
    text-align: center;
    font-size: 16px;
    color: #5543ca;
    padding-bottom: 70px;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}


</style>


<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<section class="get-in-touch">
   <h1 class="title">Courier Delivery Form</h1>
   <h5 class="dec">Please provide the details for your delivery</h5>
   <h3>Sender's Information</h3>
  
   <form class="contact-form row" method="POST" enctype="multipart/form-data">
      
      <div class="form-field col-lg-6">
         <input id="username" class="input-text js-input" type="text"  value="<?php echo $row['username']?>" name="username" required>
         <label class="label">User Name</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="useremail" class="input-text js-input" type="email" value="<?php echo $_SESSION['email']?>" name="useremail" required>
         <label class="label">E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="company" class="input-text js-input" type="text" name="company" required>
         <label class="label">Company Name</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="userphone" class="input-text js-input" type="text" name="userphone"  value="<?php echo $row['phone']?>" required>
         <label class="label">Contact Number</label>
      </div>
      <div class="form-field col-lg-12">
         <input id="useraddres" class="input-text js-input" type="text" name="useraddres" required>
         <label class="label">Address</label>
      </div>
     
<label class="label">Agent Names</label>

         <label class="label">Agent Names</label>
    
<h3>Receiver's Information</h3>

      <div class="form-field col-lg-6">
         <input id="rname" class="input-text js-input" type="text" name="rname" required>
         <label class="label">Name</label>
      </div>
   
     
       <div class="form-field col-lg-6 ">
         <input id="rphone" class="input-text js-input" type="text" name="rphone" required>
         <label class="label">Contact Number</label>
      </div>
      <div class="form-field col-lg-12">
         <input id="raddres" class="input-text js-input" type="text" name="raddres" required>
         <label class="label">Address</label>
      </div>
     
  




<h3>Package Information</h3>
      <div class="form-field col-lg-12">
         <input id="pweight" class="input-text js-input" type="text" name="pweight" required>
         <label class="label">Package Weight (kg)</label>
      </div>
   
     
      <div class="form-field col-lg-12">
         <input id="pdec" class="input-text js-input" type="text" name="pdec" required>
         <label class="label">Package Description</label>
      </div>
      
      
      <div class="form-field col-lg-12">
         <input type="date" class="input-text js-input" name="deliveryDate" required>
         <label class="label">Preferred Delivery Date</label>
      </div>

      <div class="form-field col-lg-12">
         <input type="file" class="input-text js-input p-2" name="image" required>
         <label class="label">courier pic</label>
      </div>






      <select class="form-field d-flex align-items-center   dropdown-toggle "  name="agent_name" style="background-color:rgb(189, 34, 29);">
    <?php

    while($row1 = mysqli_fetch_assoc($resultt)) { ?>
        <option value="<?php echo $row1['username']; ?>"><?php echo $row1['username']; ?></option>
        
    <?php } ?>
</select>
      
   





      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit" name="btn_submit">
      </div>
   </form>
</section>

<?php
if(isset($_POST['btn_submit']))
{
    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $company = $_POST['company'];
    $uphone = $_POST['userphone'];
    $uaddres = $_POST['useraddres'];
    $rname = $_POST['rname'];
    $rphone = $_POST['rphone'];
    $raddres = $_POST['raddres'];
    $pweight = $_POST['pweight'];
    $pdec = $_POST['pdec'];
    $ddate = $_POST['deliveryDate'];
    $agent_name = $_POST['agent_name'];
    $image = $_FILES['image'];
    $filename = $_FILES['image']['name'];
    $temp_name = $image['tmp_name'];
    $user_id =  $_SESSION['id'];

    move_uploaded_file($temp_name,"product_image/$filename");


   

   $insert = "INSERT INTO registration (sender_name, sender_email, company_name, sender_number, addres, r_name, r_number, r_addres, package_weight, package_dec, deilvery_date,image,user_id,agent_name)
    VALUES ('$username', '$email', '$company', '$uphone', '$uaddres', '$rname', '$rphone', '$raddres', '$pweight', '$pdec', '$ddate','$filename','$user_id' ,'$agent_name')";


$result = mysqli_query($conn,$insert);
     if($result)
     {
        echo "<script>alert('Registration successful')    
        </script>";
    }

    else{
        echo "<script>alert('Registration failed')</script>";
    }
 
}






include "footer.php";

?>