<?php 

include "navbar.php";
include "../conn.php";


if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "<p class='success-message'>User deleted successfully.</p>";
}
?>

<style>
    .success-message {
        color: green;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
    }
    button{
       
        margin-right: 10px;
        padding: 5px 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        &:hover {
            background-color:rgb(216, 67, 67);
        }

    }
</style>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Users</h1>
            <ul class="breadcrumb">
                <li><a href="#">User</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="index.php">Home</a></li>
            </ul>
        </div>

    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Users</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USER NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>PHONE</th>
                        <th>address</th>
                        <th>Delete</th>
                        
                    </tr>
                </thead>

                <?php
              
                $select = "SELECT * FROM users WHERE role = 'user'"; 
                $result = mysqli_query($conn, $select);
                while ($row = mysqli_fetch_array($result)) { ?>

                    <tbody>
                        <tr>
                            <td><?php echo $row['id'] ?> </td>
                            <td><?php echo $row['username'] ?> </td>
                            <td><?php echo $row['email'] ?> </td>
                            <td><?php echo $row['password'] ?> </td>
                            <td><?php echo $row['phone'] ?> </td>
                            <td><?php echo $row['addres'] ?></td>
                            <td id="data-list">
                                  <a href="delete.php?id=<?php echo $row['id']; ?>">
                             <button class="btn btn-danger ">Delete</button> </a></td>

                    
                            
                          
                        </tr>
                    </tbody>
                <?php } ?>

            </table>
        </div>
    </div>
</main>

</section>


<script src="script.js"></script>
</body>
</html>

