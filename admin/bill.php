<?php 
include "navbar.php";
include "../conn.php";

if (isset($_GET['id'])) {
    $courier_id = $_GET['id']; 
} else {
   
    echo "<p>Courier ID is missing.</p>";
    exit();
}

// Prepare and execute the SQL query
$sql = "SELECT * FROM registration WHERE courier_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $courier_id);
$stmt->execute();
$result = $stmt->get_result();
$bill = $result->fetch_assoc();

if (!$bill) {
    echo "<p>No courier data found.</p>";
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Bill</title>
    <style>
        /* Main container */
        .bill-container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 25px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Header style */
        .bill-header {
            text-align: center;
            margin-bottom: 25px;
        }

        .bill-header h3 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .bill-header p {
            font-size: 16px;
            color: #777;
        }

        /* Table for bill details */
        .bill-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .bill-details th, .bill-details td {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .bill-details th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .bill-details tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Footer section */
        .bill-footer {
            text-align: center;
            margin-top: 40px;
            font-size: 18px;
            color: #333;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .bill-container {
                padding: 20px;
            }

            .bill-header h3 {
                font-size: 24px;
            }

            .bill-details th, .bill-details td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<div class="bill-container">
    <div class="bill-header">
        <h3>Courier Bill</h3>
        <p>Date: <span id="current-date"></span></p>
    </div>

    <table class="bill-details">
        <tr>
            <th>Sender</th>
            <td><?php echo htmlspecialchars($bill['sender_name']); ?></td>
        </tr>
        <tr>
            <th>Sender Address</th>
            <td><?php echo htmlspecialchars($bill['addres']); ?></td>
        </tr>
        <tr>
            <th>Receiver</th>
            <td><?php echo htmlspecialchars($bill['r_name']); ?></td>
        </tr>
        <tr>
            <th>Receiver Address</th>
            <td><?php echo htmlspecialchars($bill['r_addres']); ?></td>
        </tr>
        <tr>
            <th>Delivery Date</th>
            <td><?php echo htmlspecialchars($bill['deilvery_date']); ?></td>
        </tr>
       
    </table>
</div>

<script>
    // Display the current date in the format: Month Day, Year (e.g., January 1, 2025)
    document.getElementById("current-date").innerText = new Date().toLocaleDateString("en-US", {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
</script>

</body>
</html>
