<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";

$sid = $_GET["sid"];

$date = $_GET["date"];

$dday = $_GET["dday"];

$setday = $_GET["setday"];

$subid = $_GET["subid"];

$lid = $_GET["lid"];

$val = $_GET["val"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if (isset($sid)&& isset($dday) && isset($val)){
                            
                    $sql = 'UPDATE Attendance 
                            SET isPresent="' . $val . '"
                            WHERE SID = "' . $sid . '" AND DATE = "' . $dday . '"'; 

                    if ($conn->query($sql) === TRUE) {
                        echo "yep";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    }

if (isset($sid)&& isset($setday) && isset($val)){
                            
                    $sql = 'UPDATE GradeBook 
                            SET Score= "' . $val . '"
                            WHERE SID = "' . $sid . '" AND DATE = "' . $setday . '"'; 

                    if ($conn->query($sql) === TRUE) {
                        echo "yep";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
    }



if (isset($lid) && isset($dday)){
                            $sql = 'SELECT * FROM Students WHERE LID = "' . $lid . '"';
                            $result = $conn->query($sql);
    
                            $cnt = 0;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    
                                    
                                    
                                    //echo '{"fName" : "' . $row["fName"] . '", "lName" : "' . $row["lName"] . '" , "sid" : "' . $row["SID"] . '"}';
                                        
                            
                                            $sql = 'INSERT INTO Attendance (SID, DATE, isPresent)
                                            VALUES ("' . $row["SID"] . '" , "' . $dday . '", "0")'; 

                                            if ($conn->query($sql) === TRUE) {
                                                echo "yep";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        
                                        
                                        
                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                    }
                                
                                    } else {
                                        echo "no data!";
                                    }
                            
}



if (isset($lid) && isset($setday) && isset($subid)){
                            $sql = 'SELECT * FROM Students WHERE LID = "' . $lid . '"'; 
                            $result = $conn->query($sql);
    
                            $cnt = 0;
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    
                                    
                                    
                                    //echo '{"fName" : "' . $row["fName"] . '", "lName" : "' . $row["lName"] . '" , "sid" : "' . $row["SID"] . '"}';
                                        
                            
                                            $sql = 'INSERT INTO GradeBook (SID, Date, Score, Subject)
                                            VALUES ("' . $row["SID"] . '" , "' . $setday . '", "0","' . $subid . '")'; 

                                            if ($conn->query($sql) === TRUE) {
                                                echo "yep";
                                            } else {
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                            }
                                        
                                        
                                        
                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                    }
                                
                                    } else {
                                        echo "no data!";
                                    }
                            
}
                                             



$conn->close();
?>