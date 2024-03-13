<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MariaDB Example</title>
</head>
<body>
    <h1>PHP MariaDB Example</h1>

    <?php
        include 'db.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = $_POST['name'];
                insertData($name);
            } else {
                echo "Please enter a name.";
            }
        }
    ?>

    <form method="POST">
        <label for="name">Enter Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Save Data</button>
    </form>

    <?php
        getAllData(); // Display all data
    ?>

</body>
</html>
