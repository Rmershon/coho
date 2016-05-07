<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";


$fName = $_GET["fName"];
$lName = $_GET["lName"];
$medinfo = $_GET["medinfo"];
$phone = $_GET["phone"];
$email = $_GET["email"];
$addr = $_GET["addr"];
$p1 = $_GET["p1"];
$p2 = $_GET["p2"];
$emrName = $_GET["emrName"];
$emrNumber = $_GET["emrNumber"];
$lid = $_GET["lid"];
$vol = $_GET["vol"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($fName)&& isset($lName) && isset($medinfo)&& isset($phone)&& isset($email)&& isset($addr)&& isset($p1)&& isset($p2)&& isset($emrName)&& isset($emrNumber)&& isset($lid)){
                            
                    $sql = 'INSERT INTO Students (fName, lName, `Medical Info`, Phone, Email, Address,Parent1,Parent2,EmrName,EmrNumber,LID)VALUES ("' . $fName . '" , "' . $lName . '","' . $medinfo . '", "' . $phone . '","' . $email . '","' . $addr . '","' . $p1 . '","' . $p2 . '","' . $emrName . '","' . $emrNumber . '","' . $lid . '")'; 

                                            if ($conn->query($sql) === TRUE) {
                                                echo "yep";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
    }

if (isset($fName)&& isset($lName) && isset($phone)&& isset($email) && isset($vol)){
                            
                    $sql = 'INSERT INTO Volunteers (fName, lName, Phone, Email)VALUES ("' . $fName . '" , "' . $lName . '", "' . $phone . '","' . $email . '")'; 

                                            if ($conn->query($sql) === TRUE) {
                                                echo "yep";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
    }


                                             



$conn->close();
?>