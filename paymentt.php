<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff3e0; /* Light brown background */
            color: #4e342e; /* Brown text color */
        }

        h2 {
            color: #4e342e; /* Brown text color */
			text-align: center; /* Center the heading */
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #efebe9; /* Light brown form background */
            border-radius: 10px;
        }

        label {
            color: #4e342e; /* Brown text color */
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #4e342e; /* Brown border */
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #6d4c41; /* Dark brown submit button */
            color: #ffffff; /* White text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #5d4037; /* Darker brown on hover */
        }
    </style>
</head>
<body>
    
    <form action="paymentt_process.php" method="post">
		<h2>Payment Form</h2>
        <input type="hidden" name="shipment_id" value="<?php echo $_POST['shipment_id']; ?>">
        <label for="payment_method">Payment Method:</label>
        <select name="payment_method" id="payment_method" required>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="PayPal">PayPal</option>
            <!-- Add more payment methods as needed -->
        </select><br>
        <label for="payment_date">Payment Date:</label>
        <input type="date" name="payment_date" id="payment_date" required><br>
        <label for="payment_status">Payment Status:</label>
        <input type="text" name="payment_status" id="payment_status" value="Pending" readonly><br>
        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
