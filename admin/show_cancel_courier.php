<?php 
include "navbar.php";
include "../conn.php";

?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
        box-shadow: 0 2px 5px rgba(166, 184, 32, 0.1);
        
       
        overflow-x: auto;
          tr:hover {
                background-color:rgb(216, 203, 130);
            }
            th{
                background-color: #f2f2f2;
                font-weight: bold;
                cursor: pointer;
                padding: 50px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                
                transition: background-color 0.3s ease;
                
                &:hover {
                    background-color:rgb(216, 203, 130);
                }

            }
            td {
                padding: 100px;
                
                border-bottom: 1px solid #ddd;
                cursor: pointer;
                margin:  7px;
                align:center;
                text-align: center;
                transition: background-color 0.3s ease;
                &:hover {
                    background-color:rgb(202, 199, 181);
                }

                
            }

    }
</style>


<main>
    <div class="head-title">
        <div class="left">
            <h1>Courier Info</h1>
            <ul class="breadcrumb">
                <li><a href="#">Courier Info</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="index.php">Home</a></li>
            </ul>
        </div>
 
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Delete Courier</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
             <th>ID</th>
            <th>Sender Name</th>
            <th>Sender Email</th>
            <th>Company</th>
            <th>Sender Contact</th>
            <th>Sender Addres</th>
            <th>Recipient Nanme</th>
            <th>Recipient Number</th>
            <th>Recipient Addres</th>
            <th>Package weight</th>
            <th>Package Dec</th>
            <th>Delivery Date</th>
            <th>Delete Date</th>
          
                    </tr>
                </thead>

                <?php

$select = "SELECT * FROM cancel_courier"; 
$result = mysqli_query($conn, $select);
while ($row = mysqli_fetch_array($result)) { ?>

    <tbody>
        <tr>
            <td><?php echo $row['cencel_id'] ?> </td>
            <td><?php echo $row['sender_name'] ?> </td>
            <td><?php echo $row['sender_email'] ?> </td>
            <td><?php echo $row['company_name'] ?> </td>
            <td><?php echo $row['sender_number'] ?> </td>
            <td><?php echo $row['addres'] ?> </td>
            <td><?php echo $row['r_name'] ?> </td>
            <td><?php echo $row['r_number'] ?> </td>
            <td><?php echo $row['r_addres'] ?> </td>
            <td><?php echo $row['package_weight'] ?>kg </td>
            <td><?php echo $row['package_dec'] ?> </td>
            <td><?php echo $row['deilvery_date'] ?> </td>
            <td><?php echo $row['cencel_date'] ?> </td>
        </tr>
    </tbody>
<?php } ?>


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
