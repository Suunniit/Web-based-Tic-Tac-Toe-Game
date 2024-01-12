<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uemail = $_POST['uemail'];
    $passwd = $_POST['passwd1'];

    $conn = new mysqli("localhost", "root", "", "game-zone", 3306);

    $stmt = $conn->prepare("INSERT INTO user_data (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $uemail, $passwd);
    $status = $stmt->execute();

    if ($status) {
        echo "<div class='success-message'>
                <p>User Registered Successfully !!</p>
            </div>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: white;
        }

        .success-message {
            font-family: Cairo Play;
            color: black;
            font-size: 30px;
            padding-left: 10px;
        }
    </style>
</head>
<body>

</body>
</html>
