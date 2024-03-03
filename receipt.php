<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light gray background */
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #8B4513; /* Brown color */
        }

        form {
            background-color: #fff; /* White background */
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            color: #8B4513; /* Brown color */
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #8B4513; /* Brown color */
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #654321; /* Darker brown on hover */
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }

        footer a.button {
            background-color: #8B4513; /* Brown color */
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        footer a.button:hover {
            background-color: #654321; /* Darker brown on hover */
        }
    </style>
</head>
<body>
    <?php
    include 'shippingcon.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $sender_name = $_POST['sender_name'];
        $sender_phone = $_POST['sender_phone'];
        $sender_address = $_POST['sender_address'];
        $sender_state = $_POST['sender_state'];
        $receiver_name = $_POST['receiver_name'];
        $receiver_phone = $_POST['receiver_phone'];
        $receiver_address = $_POST['receiver_address'];
        $receiver_state = $_POST['receiver_state'];
        $shipment_weight = $_POST['shipment_weight'];
        $total_price = $_POST['total_price'];

        // Insert data into SHIPMENTS table
        $sql = "INSERT INTO shipments (SENDER_NAME, SENDER_PHONE, SENDER_ADDRESS, SHIP_FROM, RECEIVER_NAME, RECEIVER_PHONE, RECEIVER_ADDRESS, SHIP_TO, SHIPMENT_WEIGHT, TOTAL_PRICE, USER_ID) 
                VALUES ('$sender_name', '$sender_phone', '$sender_address', '$sender_state', '$receiver_name', '$receiver_phone', '$receiver_address', '$receiver_state', '$shipment_weight', '$total_price', '{$_SESSION['user_id']}')";

        if ($conn->query($sql) === TRUE) {
            // Retrieve inserted data
            $shipment_id = $conn->insert_id;
            $sql_select = "SELECT * FROM shipments WHERE SHIPMENT_ID = $shipment_id";
            $result = $conn->query($sql_select);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Display the data
                echo "<h2>Shipment Details</h2>";
                echo "<p><strong>Sender Name:</strong> " . $row["SENDER_NAME"] . "</p>";
                echo "<p><strong>Sender Phone:</strong> " . $row["SENDER_PHONE"] . "</p>";
                echo "<p><strong>Sender Address:</strong> " . $row["SENDER_ADDRESS"] . "</p>";
                echo "<p><strong>Ship From:</strong> " . $row["SHIP_FROM"] . "</p>";
                echo "<p><strong>Receiver Name:</strong> " . $row["RECEIVER_NAME"] . "</p>";
                echo "<p><strong>Receiver Phone:</strong> " . $row["RECEIVER_PHONE"] . "</p>";
                echo "<p><strong>Receiver Address:</strong> " . $row["RECEIVER_ADDRESS"] . "</p>";
                echo "<p><strong>Ship To:</strong> " . $row["SHIP_TO"] . "</p>";
                echo "<p><strong>Shipment Weight:</strong> " . $row["SHIPMENT_WEIGHT"] . " kg</p>";
                echo "<p><strong>Total Price:</strong> RM " . $row["TOTAL_PRICE"] . "</p>";

                // Add button for payment
                echo '<form action="paymentt.php" method="post">';
                echo '<input type="hidden" name="shipment_id" value="' . $shipment_id . '">';
                echo '<input type="submit" value="Proceed to Payment">';
                echo '</form>';
            } else {
                echo "Error: Unable to fetch shipment details.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }

    $conn->close();
    ?>

    <footer>    
        <a href="loginn.php" class="button">back</a>
    </footer>

    <script>
        // Function to calculate and display total price
        function calculateTotalPrice() {
            // Get values from the form
            var senderState = document.getElementById('sender_state').value;
            var receiverState = document.getElementById('receiver_state').value;
            var shipmentWeight = parseFloat(document.getElementById('shipment_weight').value);

            // Define shipping rates
            var peninsularToPeninsularRate = 7;
            var peninsularToSabahSarawakRate = 10;
            var SabahSarawakToSabahSarawakRate = 7;
            var SabahSarawakToPeninsularRate = 10;
            
            // Rate per kilogram
            var ratePerKilogram = 2.5;

            // Calculate total price based on conditions
            var totalPrice = 0;

            if (senderState === "Peninsular" && receiverState === "Peninsular") {
                totalPrice = peninsularToPeninsularRate + shipmentWeight * ratePerKilogram;
            } else if (senderState === "Peninsular" && receiverState === "Sabah & Sarawak") {
                totalPrice = peninsularToSabahSarawakRate + shipmentWeight
