<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Color Change Example</title>
</head>
<body>
    <!-- First Button -->
    <button onclick="window.location.href='try.php?color=green'">Click me to change color of second button</button>
</body>
</html>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Second Button Page</title>
    <style>
        .button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
        }
    </style>
</head>
<body>
    <?php
        // Check if the 'color' parameter is set in the URL
        if (isset($_GET['color'])) {
            $color = $_GET['color'];
        } else {
            $color = 'lightgray';  // Default color
        }
    ?>
    
    <!-- Second Button with dynamic color -->
    <button class="button" style="background-color: <?php echo htmlspecialchars($color); ?>;">
        Second Button
    </button>

</body>
</html>
