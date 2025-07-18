<?php
include "navbar.php";
include "../conn.php";

// Fetch the courier info based on the courier_id from the URL
if (isset($_GET['id'])) {
    $courier_id = $_GET['id'];

    // Fetch the courier data from the database
    $query = "SELECT * FROM registration WHERE courier_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $courier_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $courier = $result->fetch_assoc();
}
?>

<style>
    /* General styling */
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7fc;
    }

    /* Main container */
    main {
        padding: 20px;
    }

    /* Courier info box styling */
    .courier-info {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        width: 100%;
        max-width: 100%;
        margin-bottom: 10px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .courier-info h3 {
        font-size: 24px;
        color: #333;
        grid-column: span 2;
    }

    .courier-info p {
        font-size: 16px;
        margin: 10px 0;
    }

    .courier-info strong {
        color: #2c3e50;
    }

    .courier-info .field-label {
        font-weight: bold;
        color: #333;
        font-size: 16px;
    }

    .courier-info .field-value {
        font-size: 16px;
        color: #555;
    }


    /* Status update section */
    .status-update {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 100%;
        margin: auto;
    }

    .status-update h3 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }



    /* Additional button styles */
    .btn-update {
        width: 150px;
        margin-top: 20px;
        background-color: hsl(202, 75%, 47%);
        height: 40px;
        color: white;
        border-radius: 10px;
        border: none;
    }


    .btn-ship {
        width: 150px;
        margin-top: 20px;
        background-color: hsl(32, 100%, 50%);
        height: 40px;
        color: white;
        border-radius: 10px;
        margin-left: 5px;
        border: none;
    }


    .btn-cancel {
        width: 150px;
        margin-top: 20px;
        background-color: hsl(0, 100.00%, 50.00%);
        height: 40px;
        color: white;
        border-radius: 10px;
        margin-left: 5px;
        border: none;
    }

    /* Additional button container styling */
    .additional-buttons {
        margin-top: 10px;
        display: flex;
        gap: 10px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {

        /* Make the layout more compact on smaller screens */
        .courier-info,
        .status-update {
            padding: 15px;
            margin: 10px;
        }

        .courier-info h3,
        .status-update h3 {
            font-size: 20px;
        }

        .courier-info p {
            font-size: 14px;
        }

        .btn {
            font-size: 14px;
            padding: 8px 16px;
        }

        .additional-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-update,
        .btn-ship,
        .btn-cancel {
            width: 100%;
            margin: 5px 0;
        }
    }

    @media (max-width: 480px) {

        /* Adjustments for very small screens */
        .courier-info,
        .status-update {
            padding: 10px;
            margin: 5px;
        }

        .courier-info h3,
        .status-update h3 {
            font-size: 18px;
        }

        .courier-info p {
            font-size: 12px;
        }

        .btn {
            font-size: 12px;
            padding: 6px 12px;
        }

        .additional-buttons {
            flex-direction: column;
            align-items: center;
        }

        .btn-update,
        .btn-ship,
        .btn-cancel {
            width: 100%;
            margin: 5px 0;
        }
    }
</style>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Courier Status</h1>
            <ul class="breadcrumb">
                <li><a href="#">Courier Status</a></li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li><a class="active" href="index.php">Home</a></li>
            </ul>
        </div>
    </div>

    <!-- Courier Details -->
    <div class="courier-info">
        <h3>Courier Information</h3>
        <div>
            <p class="field-label">Sender Name :</p>
            <p class="field-value"><?php echo $courier['sender_name']; ?></p>
        </div>
        <div>
            <p class="field-label">Recipient Name :</p>
            <p class="field-value"><?php echo $courier['r_name']; ?></p>
        </div>
        <div>
            <p class="field-label">Package Weight :</p>
            <p class="field-value"><?php echo $courier['package_weight']; ?> kg</p>
        </div>
        <div>
            <p class="field-label">Description :</p>
            <p class="field-value"><?php echo $courier['package_dec']; ?></p>
        </div>
        <div>
            <p class="field-label">Preferred Delivery Date :</p>
            <p class="field-value"><?php echo $courier['deilvery_date']; ?></p>
        </div>
        <div>
            <p class="field-label">Order Status :</p>
            <p class="field-value"><?php echo $courier['status']; ?></p>
        </div>
        <br>
        <div>


        </div>
    </div>


    <!-- Status Update -->
    <div class="status-update">
        <h3>Update Courier Status</h3>
        <table>
            <tbody>
                <tr>
                    <td><strong>Order Status Update</strong></td>
                    <td><button type="button" class="btn btn-update" onclick="updateStatus(this)">Update</button></td>
                </tr>

            </tbody>
        </table>
    </div>

</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function showAdditionalButtons(button) {
        // Check if the buttons already exist to prevent duplicates
        if (!button.nextElementSibling || button.nextElementSibling.className !== 'additional-buttons') {
            // Create the additional buttons container
            var additionalButtonsDiv = document.createElement('div');
            additionalButtonsDiv.className = 'additional-buttons';

            // Create the 'Reached' button
            var reachedButton = document.createElement('button');
            reachedButton.type = 'button';
            reachedButton.className = 'btn btn-ship ';
            reachedButton.innerText = 'Reached';

            // Add an event listener to the Reached button to replace the Update button
            reachedButton.addEventListener('click', function() {
                // Hide the Update button and replace it with the Reached button
                button.style.display = 'none';
                reachedButton.style.display = 'inline-block'; // Ensure Reached button is visible

                // Change the color of the <strong> tag text to green
                var strongTag = button.closest('tr').querySelector('strong');
                if (strongTag) {
                    strongTag.style.color = 'green';
                }

                // Send the updated status to the server via AJAX
                var courier_id = <?php echo $courier['courier_id']; ?>; // Use the courier ID from the PHP variable
                var new_status = "Completed"; // This could be dynamic based on the row clicked

                // Make the AJAX request to update the status
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "update_status.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Handle the response if needed (e.g., display a success message)
                        console.log(xhr.responseText); // Or update the UI accordingly
                    }
                };
                xhr.send("courier_id=" + courier_id + "&new_status=" + new_status);

                // Increment the counter for completed statuses
                completedStatus++;

                // If all steps are completed, show the "Completed" label
                if (completedStatus === 4) { // Change '4' if you add more steps
                    showCompletedLabel();
                }

                // Remove the "Cancel" button if it exists
                var cancelButton = additionalButtonsDiv.querySelector('.btn-cancel');
                if (cancelButton) {
                    cancelButton.style.display = 'none';
                }
            });

            additionalButtonsDiv.appendChild(reachedButton);

            // Create the 'Cancel' button but don't append it to the DOM yet
            var cancelButton = document.createElement('button');
            cancelButton.type = 'button';
            cancelButton.className = 'btn btn-cancel';
            cancelButton.innerText = 'Cancel';

            // Add an event listener to the Cancel button to remove the additional buttons
            cancelButton.addEventListener('click', function() {
                additionalButtonsDiv.remove(); // Remove the additional buttons when Cancel is clicked
            });

            // Only add Cancel button after Reached button is clicked
            additionalButtonsDiv.appendChild(cancelButton);

            // Append the additional buttons under the "Update" button (in the same cell, but as new div)
            button.parentElement.appendChild(additionalButtonsDiv);
        }
    }

    // Function to update the status when "Update" is clicked
    function updateStatus(button) {
        // Get the courier id and update the status to "Completed"
        var courier_id = <?php echo $courier['courier_id']; ?>;
        var new_status = "Completed";

        // Make AJAX request to update the status in the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Handle the response (success or failure)
                console.log(xhr.responseText);

                // Change the status on the front-end after successful update
                var statusText = button.closest('tr').querySelector('strong');
                if (statusText) {
                    statusText.innerText = "Order Completed";
                    statusText.style.color = 'green';
                }

                // Optionally disable the button after update
                button.disabled = true;
                button.innerText = "Completed";
            }
        };
        xhr.send("courier_id=" + courier_id + "&new_status=" + new_status);
    }
</script>



</body>

</html>