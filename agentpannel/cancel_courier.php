<?php 
include "navbar.php"; 
include "../conn.php";

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $courier_id = $_GET['id'];

    // Check if the connection is established
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Start a transaction to ensure atomic operations
    mysqli_begin_transaction($conn);

    // Fetch the courier record to be deleted
    $record = getCourierRecord($conn, $courier_id);

    if ($record) {
        // Insert the record into cancel_courier table
        if (insertCancelCourier($conn, $record)) {
            // Delete the record from registration table
            if (deleteCourierRecord($conn, $courier_id)) {
                // Commit the transaction
                mysqli_commit($conn);
                // Redirect to the cancellation page
                header("Location: courier_info.php");
                exit;
            } else {
                echo "Error deleting record from registration table.";
            }
        } else {
            echo "Error inserting record into cancel_courier table.";
        }
    } else {
        echo "No record found with the given courier_id.";
    }

    // Rollback the transaction in case of an error
    mysqli_rollback($conn);
    // Close the connection
    mysqli_close($conn);
}

// Function to fetch the courier record
function getCourierRecord($conn, $courier_id) {
    $sql = "SELECT * FROM registration WHERE courier_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $courier_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

// Function to insert the record into cancel_courier table
function insertCancelCourier($conn, $record) {
    $insert_sql = "INSERT INTO cancel_courier 
                    (courier_id, sender_name, sender_email, company_name, sender_number, addres, r_name, r_number, r_addres, package_weight, package_dec, deilvery_date, cencel_date)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $insert_stmt = mysqli_prepare($conn, $insert_sql);

    // Bind parameters: 1 integer and 12 string values
    if (mysqli_stmt_bind_param($insert_stmt, "issssssssssss", 
        $record['courier_id'],  
        $record['sender_name'], 
        $record['sender_email'], 
        $record['company_name'], 
        $record['sender_number'], 
        $record['addres'],  
        $record['r_name'], 
        $record['r_number'], 
        $record['r_addres'], 
        $record['package_weight'],  
        $record['package_dec'], 
        $record['deilvery_date'],
        $record['cencel_date'],
        )) {

        // Execute the statement
        return mysqli_stmt_execute($insert_stmt);
    }
    
    return false;
}

// Function to delete the courier record
function deleteCourierRecord($conn, $courier_id) {
    $delete_sql = "DELETE FROM registration WHERE courier_id = ?";
    $delete_stmt = mysqli_prepare($conn, $delete_sql);
    mysqli_stmt_bind_param($delete_stmt, "i", $courier_id);
    
    // Execute and check for errors
    if (mysqli_stmt_execute($delete_stmt)) {
        return true; // Successful deletion
    } else {
        // If execution fails, print the error
        echo "MySQL Error: " . mysqli_error($conn);
        return false; // Deletion failed
    }
}

?>
