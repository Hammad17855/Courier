<?php
 session_start();

 if (!isset($_SESSION['email']) || $_SESSION['email'] == "" || $_SESSION['role'] != 'agent') {
	 echo "<script>window.location.href='../login.php'</script>";
	 exit; 
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Agent Pannel</title>
</head>

<body>


		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand">
				<i class='bx bxs-smile'></i>
				<span class="text">Agent Pannel</span>
			</a>
			<ul class="side-menu top">
				<li >
					<a href="index.php">
						<i class='bx bxs-dashboard'></i>
						<span class="text">Agent <?php echo $_SESSION['username']?></span>
					</a>
				</li>
				<li>
					<a href="courier_info.php">
						<i class='bx bxs-shopping-bag-alt'></i>
						<span class="text">Courier Details</span>
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
		<!-- SIDEBAR -->


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
				<img src="images/people.png">
			</a>
		</nav>