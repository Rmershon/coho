<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";


$tid = $_GET["tid"];
$sid = $_GET["sid"];
    
    
    
$name = $_GET["name"];
$email = $_GET["email"];
$pass = $_GET["pass"];


                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    $hash = password_hash($pass, PASSWORD_DEFAULT);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }





if (isset($tid)){
                    $sql = 'INSERT INTO Teacher (Name, Email, Password)
                    VALUES ("' . $name . '", "' . $email . '", "' . $hash . '")';

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
}

if (isset($sid)){




}




$conn->close();
?>