<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";

$date =$_GET["date"];

$dset = $_GET["dset"];

$vid = $_GET["vid"];

$setday = $_GET["setday"];

$val = $_GET["val"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($date)){
                            $sql = 'SELECT DISTINCT VTIME.Hours, VTIME.Date, Volunteers.fName, Volunteers.lName, Volunteers.VID
                                    FROM VTIME
                                    INNER JOIN Volunteers
                                    ON Volunteers.VID = VTIME.VID
                                    WHERE VTIME.Date = "' . $date . '"';
    
    
                            $result = $conn->query($sql);
                            $cnt = 0;
                            
                            if ($result->num_rows > 0) {
                                echo '[';
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                       echo ' { "fName":"' . $row["fName"] . '", "lName":"' . $row["lName"] . '", "hrs":"' . $row["Hours"] . '", "VID": "' . $row["VID"] . '"}'; 

                                        if($cnt < $result->num_rows-1 ){
                                        echo ',';
                                        
                                        }
                                        $cnt++;
                                }
                                echo ']';
                            } else {
                                
                                echo "no data!"; 
                                
                            }
    }

if (isset($vid)&& isset($setday) && isset($val)){
                            
                    $sql = 'UPDATE VTIME 
                            SET Hours="' . $val . '"
                            WHERE VID = "' . $vid . '" AND Date = "' . $setday . '"'; 

                    if ($conn->query($sql) === TRUE) {
                        echo "yep";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    }

if (isset($dset)){
                            $sql = 'SELECT VID FROM Volunteers';
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    
                                    
                                    $sql = 'INSERT INTO VTIME (VID, DATE, Hours)
                                            VALUES ("' . $row["VID"] . '" , "' . $dset . '", "0")'; 

                                            if ($conn->query($sql) === TRUE) {
                                                echo "yep";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                    
                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }
    }


$conn->close();
?>