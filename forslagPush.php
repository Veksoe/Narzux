<?php
include 'dba.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["user_name"];
$msg  = $_POST["user_message"];
$date = date('j/n-H:i');
echo $date;

$sql = "INSERT INTO Forslagsbog (Time,Username, Msg) VALUES ('$date','$name', '$msg')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: forslag.php");
?>
