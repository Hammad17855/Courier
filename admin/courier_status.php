<?php
include "navbar.php";
include "../conn.php";


if (isset($_GET['id'])) {
    $courier_id = $_GET['id'];

  
    $query = "SELECT * FROM registration WHERE courier_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $courier_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $courier = $result->fetch_assoc();
}
?>

<style>
  
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f7fc;
    }

   
    main {
        padding: 20px;
    }

  
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

    .additional-buttons {
        margin-top: 10px;
        display: flex;
        gap: 10px;
    }

   
    @media (max-width: 768px) {
     
        .courier-info, .status-update {
            padding: 15px;
            margin: 10px;
        }

        .courier-info h3, .status-update h3 {
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

        .btn-update, .btn-ship , .btn-cancel {
            width: 100%;
            margin: 5px 0;
        }
    }

    @media (max-width: 480px) {
       
        .courier-info, .status-update {
            padding: 10px;
            margin: 5px;
        }

        .courier-info h3, .status-update h3 {
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

        .btn-update, .btn-ship , .btn-cancel {
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
    <br>
    <div>
    <div>
    <a href="bill.php?id=<?php echo $courier['courier_id']; ?>"><button type="button" class="btn btn-update">Generate Bill</button></a>
</div>

    </div>
</div>


    
   

</main>

</body>
</html>
