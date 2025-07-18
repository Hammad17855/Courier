<?php 
include "navbar.php"; 
include "../conn.php";

if (isset($_GET['id'])) {
    $courier_id = $_GET['id'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_begin_transaction($conn);

    $record = getCourierRecord($conn, $courier_id);

    if ($record) {
        if (insertCancelCourier($conn, $record)) {
            if (deleteCourierRecord($conn, $courier_id)) {
                mysqli_commit($conn);
                header("Location: show_cancel_courier.php");
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

    mysqli_rollback($conn);
    mysqli_close($conn);
}

function getCourierRecord($conn, $courier_id) {
    $sql = "SELECT * FROM registration WHERE courier_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $courier_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function insertCancelCourier($conn, $record) {
    $insert_sql = "INSERT INTO cancel_courier 
                    (courier_id, sender_name, sender_email, company_name, sender_number, addres, r_name, r_number, r_addres, package_weight, package_dec, deilvery_date, cencel_date)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $insert_stmt = mysqli_prepare($conn, $insert_sql);

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

        return mysqli_stmt_execute($insert_stmt);
    }
    
    return false;
}

function deleteCourierRecord($conn, $courier_id) {
    $delete_sql = "DELETE FROM registration WHERE courier_id = ?";
    $delete_stmt = mysqli_prepare($conn, $delete_sql);
    mysqli_stmt_bind_param($delete_stmt, "i", $courier_id);
    
    if (mysqli_stmt_execute($delete_stmt)) {
        return true;
    } else {
        echo "MySQL Error: " . mysqli_error($conn);
        return false;
    }
}

?>
