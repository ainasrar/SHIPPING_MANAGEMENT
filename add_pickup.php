<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cargo Pickup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #333;
			text-align: center; /* Center the heading */
        }
        form {
            background-color: #fff;
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #8B4513; /* Brown color */
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #654321; /* Darker brown on hover */
        }
    </style>
</head>
<body>
    <form action="add_pickup_process.php" method="post">
		 <h2>Add Cargo Pickup</h2>
        <label for="sender_name">Sender Name:</label>
        <input type="text" name="sender_name" required><br>
        <label for="sender_phone">Sender Phone:</label>
        <input type="text" name="sender_phone" required><br>
        <label for="sender_address">Sender Address:</label>
        <textarea name="sender_address" rows="4" required></textarea><br>
        <label for="pickup_date">Pickup Date:</label>
        <input type="date" name="pickup_date" required><br>
        <input type="submit" value="Add Pickup">
    </form>
</body>
</html>


