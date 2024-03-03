<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <style>
        body {
            background-color: #f4ede6; /* Light brown background */
            color: #333; /* Dark text color */
            font-family: Arial, sans-serif; /* Font style */
            margin: 0;
            padding: 0;
        }
        h2 {
            color: #66462f; /* Dark brown heading color */
        }
        a {
            display: block;
            margin-bottom: 10px;
            color: #66462f; /* Dark brown link color */
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #66462f; /* Dark brown border */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #efe8e0; /* Light brown background for table header */
        }
        input[type="submit"] {
            background-color: #66462f; /* Dark brown button background */
            color: #fff; /* White button text color */
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #543d2b; /* Darken button color on hover */
        }
    </style>
</head>
<body>
    <h2>Admin Orders</h2>
    <a href="add_pickup.php">Add New Pickup</a>
    <a href="view_pickup.php">View All Pickups</a>
    <form action="admin_orders_action.php" method="post">
        <table>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Shipment ID</th>
                    <th>Sender Name</th>
                    <th>Receiver Name</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Fetch and display shipment details from the SHIPMENTS table -->
                <?php
                include 'shippingcon.php'; // Include your database connection file
                
                $sql = "SELECT SHIPMENTS.*, PAYMENT.PAYMENT_STATUS
                        FROM SHIPMENTS
                        LEFT JOIN PAYMENT ON SHIPMENTS.SHIPMENT_ID = PAYMENT.SHIPMENT_ID";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='selected_shipments[]' value='" . $row['SHIPMENT_ID'] . "'></td>";
                        echo "<td>" . $row['SHIPMENT_ID'] . "</td>";
                        echo "<td>" . $row['SENDER_NAME'] . "</td>";
                        echo "<td>" . $row['RECEIVER_NAME'] . "</td>";
                        echo "<td>" . $row['PAYMENT_STATUS'] . "</td>";
                        echo "<td><a href='edit_shipment.php?shipment_id=" . $row['SHIPMENT_ID'] . "'>Edit</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No shipments found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <input type="submit" name="delete_shipments" value="Delete Selected Shipments">
        <input type="submit" name="update_payment_status" value="Update Payment Status">
    </form>
</body>
</html>
