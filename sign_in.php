<?php
include "header.php";
include "conn.php";
?>

<style>
/* Importing fonts from Google */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background-image: url('img/login2.jpg');
    background-size: cover;
    background-attachment: fixed;
    

}

.wrapper {
    max-width: 450px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.logo {
    width: 80px;
    margin: auto;
}

.logo img {
    width: 100%;
    height: 80px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f,
        0px 0px 0px 5px #ecf0f3,
        8px 8px 15px #a7aaa7,
        -8px -8px 15px #fff;
}

.wrapper .name {
    font-weight: 600;
    font-size: 1.4rem;
    letter-spacing: 1.3px;
    padding-left: 10px;
    color: #555;
}

.wrapper .form-field input {
    width: 100%;
    display: block;
    border: none;
    outline: none;
    background: none;
    font-size: 1.2rem;
    color: #666;
    padding: 10px 15px 10px 10px;
    /* border: 1px solid red; */
}

.wrapper .form-field {
    padding-left: 10px;
    margin-bottom: 20px;
    border-radius: 20px;
    box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
    color: #555;
}

.wrapper .btn {
    box-shadow: none;
    width: 100%;
    height: 40px;
    color: #fff;
    border-radius: 25px;
    box-shadow: 3px 3px 3px #b1b1b1,
        -3px -3px 3px #fff;
    letter-spacing: 1.3px;
}

.wrapper .btn:hover {
    background-color:rgb(201, 20, 20);
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color:rgb(201, 16, 16);
}

.wrapper a:hover {
    color:rgb(212, 21, 37);
}

@media(max-width: 380px) {
    .wrapper {
        margin: 30px 20px;
        padding: 40px 15px 15px 15px;
    }
  
}

</style>




<form method="POST" enctype="multipart/form-data">
<div class="wrapper">
    
        <div class="logo">
            <img src="img/loginlogo.jpg" alt="">
        </div>
        <div class="text-center mt-4 name">
            Sign up
        </div>
        <form class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username" required>
            </div>
            <div class="form-field d-flex align-items-center">
                
                <input type="text" name="email" id="pwd" placeholder="Email" required>
            </div>
            <div class="form-field d-flex align-items-center">
                
                <input type="text" name="phone" id="pwd" placeholder="Phone" required>
            </div>

            <div class="form-field d-flex align-items-center">
                
                <input type="text" name="addres" id="pwd" placeholder="addres" required>
            </div>

            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>

           
            <div class="form-field d-flex align-items-center">
            <select  class="form-field" style="width:100%; border: none; margin:0px; padding: 10px;"  name="role" >
                        <option value="agent">Agent</option>
                        <option value="user">User</option>
            </select>
          </div>
          
            <div class="form-field d-flex align-items-center">
             
                <input type="file" name="image" id="pwd" placeholder="file" required>
            </div>
            <button type="submit" class="btn btn-danger mt-3" value="SING UP" name="btn_singup">Sign up</button>
        </form><br><br>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="login.php">login</a> 
        </div>
    </div>


<?php

if(isset($_POST['btn_singup']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addres = $_POST['addres'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $image = $_FILES['image'];
    $filename = $_FILES['image']['name'];
    $temp_name = $image['tmp_name'];

    move_uploaded_file($temp_name,"users/$filename");
    
    $insert = "INSERT INTO users (username,email,phone,addres,password,image,role) VALUES ('$username','$email','$phone','$addres','$password','$filename','$role')";

    $result = mysqli_query($conn,$insert);
    
    if($result)
    {
        echo "<script>alert('Registration successful');
        window.location.href='login.php'
        </script>";
    }

    else{
        echo "<script>alert('Registration failed')</script>";
    }
 
}









include "footer.php"

?>