<?php include "header.php"; ?>

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
    background-color: rgb(201, 20, 20);
}

.wrapper a {
    text-decoration: none;
    font-size: 0.8rem;
    color: rgb(201, 16, 16);
}

.wrapper a:hover {
    color: rgb(212, 21, 37);
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
            Courier Express
        </div>
        <form class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="userName" placeholder="Username" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-danger mt-3" value="login" name="btn_login">Login</button>
        </form><br><br>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="sign_in.php">Sign up</a>
        </div>
    </div>
</form>

<?php include "footer.php"; ?>

<?php
// Check if the login form was submitted
if (isset($_POST['btn_login'])) {
    // Capture email and password from the form
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $select = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        // Fetch the user's details
        $user = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect based on the role
        if ($_SESSION['role'] == 'admin') {
            echo "<script>window.location.href='admin/index.php';</script>";
            exit;
        } elseif ($_SESSION['role'] == 'agent') {
            echo "<script>window.location.href='agentpannel/index.php';</script>";
            exit;
        } elseif ($_SESSION['role'] == 'user') {
            echo "<script>window.location.href='index.php';</script>";
            exit;
        } else {
            echo "<script>alert('Unknown role.');</script>";
        }
    } else {
        echo "<script>alert('Email or password is wrong');</script>";
    }
}
?>
