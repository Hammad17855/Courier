<?php
include "../conn.php";

// Check if the necessary values are passed via POST
if (isset($_POST['courier_id']) && isset($_POST['new_status'])) {
    $courier_id = $_POST['courier_id'];
    $new_status = $_POST['new_status'];

    // Update the status of the courier in the database
    $query = "UPDATE registration SET status = ? WHERE courier_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $new_status, $courier_id);

    if ($stmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status";
    }

    $stmt->close();
}
?>
