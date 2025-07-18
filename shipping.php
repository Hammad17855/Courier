<?php
// Include the database connection
include 'conn.php';
include 'header.php';

$_SESSION['username'];
$_SESSION['id'];


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
    padding-bottom:20px ;
    padding-top:20px ;
    width: 760px;
    margin-left: -75px;
    

}


table,  td {
  border: 1px solid;
  border-collapse: collapse;
  padding: 10px;
  text-align: left;
  transition: background-color 0.3s ease;
  margin:  20px;
  &:hover {
    background-color:rgb(202, 199, 181);
  }


}


</style>

<?php
        // Check if the 'color' parameter is set in the URL
        if (isset($_GET['color'])) {
            $color = $_GET['color'];
        } else {
            $color = 'lightgray';  // Default color
        }
    ?>





<div class="page-content page-container" style="text-align: center; " id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-6 col-md-12">
          <div class="card user-card-full">
              
                    
      


  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:rgb(255, 255, 255);
    }

    .table-container {
      margin-top: 50px;
      margin-bottom: 50px;
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    table {
      margin: 0 auto;
      width: 90%;
    }

    th {
      background-color:red;
      color: white;
      text-align: center;
    }

    td {
      text-align: center;
    }

    .btn-view {
      background-color: #28a745;
      color: white;
      border: none;
      cursor: pointer;
    }

    .btn-view:hover {
      background-color: #218838;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
      border: none;
      cursor: pointer;
    }

    .btn-delete:hover {
      background-color: #c82333;
    }
  </style>


<div class="container table-container">
  <h2>COURIER HISTORY</h2>
  
 
  <table style="padding: 10px; padding-left:100px; ">
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
                $select = "SELECT * FROM registration WHERE user_id = '$_SESSION[id]'"; 

                $result = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_array($result)) { ?>
				<tbody>
					<tr>
						<td><?php echo $row['sender_name']?></td>
						<td><?php echo $row['r_name']?></td>
						<td><?php echo $row['package_dec']?></td>
						<td><?php echo $row['deilvery_date']?></td>
						<td style="color: <?php echo $row['status'] == 'Completed' ? 'green' : 'orange'; ?>;">
                        <?php echo $row['status']; ?>
                    </td>
					</tr>
				</tbody>
				<?php
                    }
                ?>
			</table>
</div>

<!-- Bootstrap JS and jQuery -->


</body>
</html>

<!-- MAIN -->

<!-- CONTENT -->







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
