<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
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

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Ensure padding and border are included in width */
        }

        input[type="submit"] {
            background-color: #8B4513; /* Brown color */
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #654321; /* Darker brown on hover */
        }
    </style>
</head>
<body>
    
    <form action="registration_process.php" method="post">
		<h2>User Registration</h2>
        Full Name: <input type="text" name="full_name" required><br>
        Email: <input type="email" name="email" required><br>
        Phone Number: <input type="text" name="phone_number" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>

</body>
</html>

