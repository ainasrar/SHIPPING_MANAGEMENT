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
    <h2 align='center'>Shipping Details</h2>
    <form action="receipt.php" method="post" oninput="calculateTotalPrice()">
        <h3>Sender Details</h3>
        <label for="sender_name">Full Name:</label>
        <input type="text" name="sender_name" required>
        <label for="sender_phone">Phone Number:</label>
        <input type="text" name="sender_phone" required>
        <label for="sender_address">Address:</label>
        <textarea name="sender_address" rows="4" required></textarea>
        <label for="sender_state">Ship from:</label>
        <select name="sender_state" id="sender_state" required>
            <option value="Peninsular">Peninsular</option>
            <option value="Sabah & Sarawak">Sabah & Sarawak</option>
            <!-- Add more states as needed -->
        </select>

        <h3>Receiver Details</h3>
        <label for="receiver_name">Full Name:</label>
        <input type="text" name="receiver_name" required>
        <label for="receiver_phone">Phone Number:</label>
        <input type="text" name="receiver_phone" required>
        <label for="receiver_address">Address:</label>
        <textarea name="receiver_address" rows="4" required></textarea>
        <label for="receiver_state">Ship to:</label>
        <select name="receiver_state" id="receiver_state" required>
            <option value="Peninsular">Peninsular</option>
            <option value="Sabah & Sarawak">Sabah & Sarawak</option>
            <!-- Add more states as needed -->
        </select>

        <h3>Shipment Weight</h3>
        <label for="shipment_weight">Weight (in kg):</label>
        <input type="number" name="shipment_weight" id="shipment_weight" required>

        <!-- Display the total price on the form -->
        <label for="total_price">Total Price:</label>
        <input type="text" id="total_price" readonly>
        
        <!-- Hidden input to store total price for form submission -->
        <input type="hidden" name="total_price" id="total_price_hidden">

        <input type="submit" value="Submit">
    </form>

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
                totalPrice = peninsularToSabahSarawakRate + shipmentWeight * ratePerKilogram;
            } else if (senderState === "Sabah & Sarawak" && receiverState === "Sabah & Sarawak") {
                totalPrice = SabahSarawakToSabahSarawakRate + shipmentWeight * ratePerKilogram;
            } else if (senderState === "Sabah & Sarawak" && receiverState === "Peninsular") {
                totalPrice = SabahSarawakToPeninsularRate + shipmentWeight * ratePerKilogram;
            }

            // Display the total price on the form
            document.getElementById('total_price').value = totalPrice.toFixed(2);
            document.getElementById('total_price_hidden').value = totalPrice.toFixed(2);
        }
    </script>
</body>
</html>
