<?php
// Include the database connection
include '../conn.php';

// Query to get the count of new orders
$sql = "SELECT COUNT(*) AS new_orders FROM courier_info ";
$result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

// Get the count of new orders
// $new_orders_count = $row['new_orders'];

// $sql = "SELECT COUNT(*) AS total_users FROM users WHERE role = 0";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

// Get the count of users with role 0
// $total_users_count = $row['total_users'];

// $sql = "SELECT COUNT(*) AS total_agents FROM users WHERE role = 1";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

// Get the count of users with role 0
// $total_agents_count = $row['total_agents'];

include 'navbar.php';
?>




<!-- MAIN -->
<main>
	<div class="head-title">
		<div class="left">
			<h1>Dashboard</h1>
			<ul class="breadcrumb">
				<li>
					<a href="#">Dashboard</a>
				</li>
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<a class="active" href="#">Home</a>
				</li>
			</ul>
		</div>

	</div>

	<ul class="box-info">
		<li>
			<i class='bx bxs-calendar-check'></i>
			<span class="text">
				<!-- <h3><?php echo $new_orders_count; ?></h3> -->
				<p>New Order</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-group'></i>
			<span class="text">
				<!-- <h3><?php echo $total_users_count; ?></h3> -->
				<p>Visitors</p>
			</span>
		</li>
		<li>
			<i class='bx bxs-group'></i>
			<span class="text">
				<!-- <h3><?php echo $total_agents_count; ?></h3> -->
				<p>Agents</p>
			</span>
		</li>
	</ul>


	<div class="table-data">
		<div class="order">
			<div class="head">
				<h3>Recent Orders</h3>
				<i class='bx bx-search'></i>
				<i class='bx bx-filter'></i>
			</div>
			<table>
				<thead>
					<tr>
						<th>Sender Name</th>
						<th>Reciver Name</th>
						<th>Package Description</th>
						<th>Date Order</th>
						<th>Status</th>
					</tr>
				</thead>
				<?php
                    
                    $select = "SELECT * FROM registration"; 
                    $result = mysqli_query($conn, $select);
                    
                    while ($row = mysqli_fetch_array($result)) { 
                ?>
				<tbody>
					<tr>
						<td><?php echo $row['sender_name']?></td>
						<td><?php echo $row['r_name']?></td>
						<td><?php echo $row['package_dec']?></td>
						<td><?php echo $row['deilvery_date']?></td>
						<td><span class="status completed">Completed</span></td>
					</tr>
				</tbody>
				<?php
                    }
                ?>
			</table>
		</div>

	</div>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->


<script src="script.js"></script>
</body>

</html>