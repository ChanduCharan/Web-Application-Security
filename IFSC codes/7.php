<!DOCTYPE html>
<html>
<head>
    <title>Bank Information</title>
</head>
<body>
    <form method="POST" action="">
        <label for="IFSC">Enter IFSC</label>
        <input id="ifsc" name="ifsc">
        <button type="submit">Submit</button>
    </form>

    <?php
    $server = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $db = "bank";
    $table = "bankinfo";
    $mysqli_conn = mysqli_connect($server, $username, $password, $db);

    if ($mysqli_conn) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ifsc = $_POST['ifsc'];
            $query = "SELECT * FROM $table WHERE IFSC = '$ifsc'";
            $result = mysqli_query($mysqli_conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h2>Bank Information</h2>";
                    echo "IFSC: " . $row['IFSC'] . "<br>";
                    echo "Bank Name: " . $row['Bank Name'] . "<br>";
                    echo "Branch Name: " . $row['Branch Name'] . "<br>";
                    echo "Address: " . $row['Address'] . "<br>";
                    echo "City: " . $row['City'] . "<br>";
                    echo "State: " . $row['State'] . "<br>";
                }
            } else {
                echo "No data found for the provided IFSC code.";
            }
        }
        mysqli_close($mysqli_conn);
    } else {
        echo "Connection to the database failed.";
    }
    ?>
</body>
</html>
