<?php
session_start();

$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";

$sid = $_GET["sid"];
$temail = $_GET["temail"];
$pass = $_GET["pass"];

$dday = $_GET["dday"];

$gday = $_GET["gday"];

$setday = $_GET["setday"];

$gid = $_GET["gid"];
$subid = $_GET["subid"];

$lid = $_GET["lid"];

$lidonly = $_GET["lidonly"];

$lidonlyv = $_GET["lidonlyv"];

$vid = $_GET["vid"]; 


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($sid)){
                            $sql = 'SELECT * FROM Students WHERE SID = ' . $sid;
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                       echo ' {

                                          "fName":"' . $row["fName"] . '",

                                          "lName":"' . $row["lName"] . '",

                                          "minfo":"' . $row["Medical Info"] . '",

                                          "pnum":"' . $row["Phone"] . '",

                                          "Email":"' . $row["Email"] . '",

                                          "Address":"' . $row["Address"] . '",

                                          "pn1":"' . $row["Parent1"] . '",

                                          "pn2":"' . $row["Parent2"] . '",
                                          
                                          "EmergencyName":"' . $row["EmrName"] . '",
                                          
                                          "EmergencyNumber":"' . $row["EmrNumber"] . '"

                                       }';


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }
    }

if (isset($gday) && isset($subid)&&isset($lid)){ 
                            $sql = 'SELECT Students.SID, GradeBook.Score , Students.fName, Students.lName 
                                    FROM Students
                                    INNER JOIN GradeBook
                                    ON Students.SID = GradeBook.SID
                                    WHERE Students.LID = "' . $lid . '" AND GradeBook.DATE = "'. $gday .'" AND GradeBook.Subject = "' . $subid . '"';
    
                            $result = $conn->query($sql);
    
                            
                            $cnt = 0;
                            if ($result->num_rows > 0) {
                                echo '[';
                                // output data of each row
                                while($row = $result->fetch_assoc()) {


                                    echo '{"fName" : "' . $row["fName"] . '", "lName" : "' . $row["lName"] . '" , "sid" : "' . $row["SID"] . '", "score" : "' . $row["Score"] . '"}'; 
                                    
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


//if location is set and date im looking for is set then return Student info for students at that LID on that day
if (isset($lid) && isset($dday)){
    
                            $sql = 'SELECT Students.SID, Attendance.isPresent , Students.fName, Students.lName 
                                    FROM Students
                                    INNER JOIN Attendance
                                    ON Students.SID = Attendance.SID
                                    WHERE Students.LID = "' . $lid . '" AND Attendance.DATE = "'. $dday .'"';   
                                    
                                    $result = $conn->query($sql); 
    
                                    $cnt = 0;
                                    if ($result->num_rows > 0) {
                                    echo '[';
                                        
                                    // output data of each row
                                        
                                    while($row = $result->fetch_assoc()) {
                                        
                                    echo '{"fName" : "' . $row["fName"] . '", "lName" : "' . $row["lName"] . '" , "sid" : "' . $row["SID"] . '", "class" : "' . get_cls($row["isPresent"]) . '"}'; 
                                        
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






function get_cls($s)
{                            
    
                            if ($s > 0) {
                              return "buttongreen";
                                    
                                }
                            else {
                                return "buttonred";
                            }
}

if (isset($vid)){
                            $sql = 'SELECT * FROM Volunteers WHERE VID = ' . $vid;
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                       echo ' {

                                          "fName":"' . $row["fName"] . '",

                                          "lName":"' . $row["lName"] . '",

                                          "minfo":"' . $row["Medical Info"] . '",

                                          "pnum":"' . $row["Phone"] . '",

                                          "Email":"' . $row["Email"] . '"

                                       }';


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }
    }

if (isset($temail) && isset($pass)){
    
                            $sql = 'SELECT * FROM Teacher WHERE Email = "' . $temail. '"';
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                      if (password_verify($pass, $row["Password"])){
                                          
                                          $_SESSION["LID"] = $row["LID"];
                                          $_SESSION["user"] = $temail;
                                          $_SESSION["Full_Name"] = $row["Name"];
                                          echo "verified";
                                          
                                      }else{
                                          echo "error!";
                                      }


                                    //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
                                }
                            } else {
                                echo "0 results";
                            }
    }

if (isset($lidonly)){
                            $sql = 'SELECT * FROM Students WHERE LID = "' . $lidonly . '"';
                            $result = $conn->query($sql);
    
                            $cnt = 0;
                            if ($result->num_rows > 0) {
                                echo '[';
                                
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                
                                    echo '{"fName" : "' . $row["fName"] . '", "lName" : "' . $row["lName"] . '" , "sid" : "' . $row["SID"] . '" }';
                                        
                                    
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

if (isset($lidonlyv)){
                            $sql = 'SELECT * FROM Volunteers';
                            $result = $conn->query($sql);
    
                            $cnt = 0;
                            if ($result->num_rows > 0) {
                                echo '[';
                                
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                
                                    echo '{"fName" : "' . $row["fName"] . '", "lName" : "' . $row["lName"] . '" , "ID" : "' . $row["VID"] . '" }';
                                        
                                    
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


$conn->close();
?>