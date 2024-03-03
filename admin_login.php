<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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

        input[type="email"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #8B4513; /* Brown color */
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #654321; /* Darker brown on hover */
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #8B4513; /* Brown color */
            box-shadow: 0 0 5px #8B4513; /* Brown color */
        }
    </style>
</head>
<body>
    <form action="admin_login_process.php" method="post">
		 <h2>Admin Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
