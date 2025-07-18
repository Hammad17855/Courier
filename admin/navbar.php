<?php
 session_start();

 if (!isset($_SESSION['email']) || $_SESSION['email'] == "" || $_SESSION['role'] != 'admin') {
	 echo "<script>window.location.href='../login.php'</script>";
	 exit; 
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	
	<link rel="stylesheet" href="style.css">

	<title>AdminHub</title>
</head>

<body>


	
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="index.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="courier_info.php">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Courier Details</span>
				</a>

			</li>

			<li>
				<a href="showagent.php">
					<i class='bx bxs-group'></i>
					<span class="text">Agent</span>
				</a>
			</li>

			<li>
				<a href="showuser.php">
					<i class='bx bxs-group'></i>
					<span class="text">Users</span>
				</a>
			</li>

			<li>
				<a href="show_cancel_courier.php">
					<i class='bx bxs-shopping-bag-alt'></i>
					<span class="text">Cancel Courier</span>
				</a>
			</li>

			<li>
				<a href="contactus.php">
					<i class='bx bxs-message-dots'></i>
					<span class="text">Message</span>
				</a>
			</li>


			<li>
				<a href="../index.php">
				<i class="fa-solid fa-house"style='height:5px; padding:0px; margin-bottom:25px; margin-left:13px;'></i>
					<span class="text" style='height:5px; margin-bottom:25px; margin-left:13px;'>Web Home</span>
				</a>
			</li>

			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>


		</ul>

	</section>
	


	<section id="content">
		<nav>
			<i class='bx bx-menu'></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="images/hammad.jpg">
			</a>
		</nav>