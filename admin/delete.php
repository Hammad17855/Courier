<?php
include "../conn.php";


if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    $deleteQuery = "DELETE FROM users WHERE id = ?";
    
   
    if ($stmt = mysqli_prepare($conn, $deleteQuery)) {
       
        mysqli_stmt_bind_param($stmt, "i", $id);

        
        if (mysqli_stmt_execute($stmt)) {
          
            header("Location: showuser.php?status=success");
            exit();
        } else {
           
            echo "Error deleting record: " . mysqli_error($conn);
        }
        
      
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing query: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
