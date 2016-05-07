<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";

$sid = $_GET["sid"];

$vid = $_GET["vid"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if (isset($sid)){
                            
                    $sql = 'DELETE FROM Students
                            WHERE Students.SID = ' . $sid; 

                    if ($conn->query($sql) === TRUE) {
                        echo "yep";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    }

if (isset($vid)){
                            
                    $sql = 'DELETE FROM Volunteers
                            WHERE Volunteers.VID = ' . $vid;  

                    if ($conn->query($sql) === TRUE) {
                        echo "yep";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    }




                                             



$conn->close();
?>