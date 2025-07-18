<?php 
include "navbar.php";
include "../conn.php";
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Contact Us Submissions</h1>
            <ul class="breadcrumb">
                <li><a href="#">Contact us</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="index.php">Home</a></li>
            </ul>
        </div>
    
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Recent Contact Us Messages</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>subject</th>
                        <th>Message</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>

                <?php
                    $select = "SELECT * FROM contact_us ORDER BY submitted_at DESC"; 
                    $result = mysqli_query($conn, $select);
                    
                    while ($row = mysqli_fetch_array($result)) { 
                ?>

                <tbody>
                    <tr>
                        <td><?php echo $row['id']; ?> </td>
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['email']; ?> </td>
                        <td><?php echo $row['subject']; ?> </td>
                        <td><?php echo nl2br($row['message']); ?> </td>
                        <td><?php echo $row['submitted_at']; ?> </td>
                    </tr>
                </tbody>

                <?php
                    }
                ?>

            </table>
        </div>
    </div>
</main>

<script src="script.js"></script>
</body>
</html>
