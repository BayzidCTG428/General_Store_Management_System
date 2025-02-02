<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gsms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database (replace 'your_table' with your actual table name)
$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

// Check if there are rows in the result set
if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $rows = [];
}

$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        <h2>Dashboard</h2>

        <!-- Display database table -->
        <h3>Data from Database</h3>
        <table border="1">
            <tr>
                <!-- Adjust column names based on your table structure -->
                <?php foreach ($rows[0] as $columnName => $value): ?>
                    <th><?php echo $columnName; ?></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <?php foreach ($row as $value): ?>
                        <td><?php echo $value; ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>

    <!-- Insert form -->
    <h3>Insert Data</h3>
    <form action="insert.php" method="post">
    <label for="pro_id">Product ID:</label>
            <input type="text" id="pro_id" name="pro_id" required>

            <label for="pro_cat">Product Category:</label>
            <input type="text" id="pro_cat" name="pro_cat" required>

            <label for="doe">Date of Entry:</label>
            <input type="date" id="doe" name="doe" required>

            <label for="selling_price">Selling Price:</label>
            <input type="number" id="selling_price" name="selling_price" step="0.01" required>

        <button type="submit">Insert</button>
    </form>

    <!-- Update form -->
    <h3>Update Data</h3>
    <form action="update.php" method="post">
        <label for="update-id">ID:</label>
        <input type="number" id="update-id" name="id" required>

        <label for="update-name">Name:</label>
        <input type="text" id="update-name" name="name" required>

        <label for="update-email">Email:</label>
        <input type="email" id="update-email" name="email" required>

        <button type="submit">Update</button>
    </form>

    <!-- Delete form -->
    <h3>Delete Data</h3>
    <form action="delete.php" method="post">
        <label for="delete-id">ID:</label>
        <input type="number" id="delete-id" name="id" required>

        <button type="submit">Delete</button>
    </form>

    <!-- Button to switch between two pages -->
    <form action="page1.php" method="get">
            <button type="submit">Go to Page 1</button>
        </form>

        <form action="page2.php" method="get">
            <button type="submit">Go to Page 2</button>
        </form>
</div>

</body>
</html>







