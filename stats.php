<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_coho";


$sid = $_GET["sid"];

$subid = $_GET["subid"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


if (isset($sid) && isset($subid)){
    
                            $sql = 'SELECT DISTINCT YEAR(GradeBook.Date) AS ynums 
                                    FROM GradeBook
                                    WHERE GradeBook.SID = ' . $sid . ' AND GradeBook.Subject = ' . $subid ;
    
    
                            $result = $conn->query($sql);
                            $cnt2 = 0;
                            if ($result->num_rows > 0) {
                                echo '[';
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                       //echo $row["ynums"]; 
                                        echo '{"year" : "' . $row["ynums"] .'" , "data" : "';
                                        echo '[';
                                        echo '[\'' . $row["ynums"] . '\', \'Month\'],';
                                        
                                    
                                    
                                                                                        $sql2 = 'SELECT GradeBook.Date, MONTH(GradeBook.Date) AS Mnth, GradeBook.Score FROM GradeBook WHERE GradeBook.SID = ' . $sid . ' AND GradeBook.Subject = ' . $subid . ' AND YEAR(GradeBook.Date) = "' . $row["ynums"] . '"';


                                                                                        $result2 = $conn->query($sql2);
                                                                                        $cnt1 = 0;
                                                                                        if ($result2->num_rows > 0) {

                                                                                            // output data of each row
                                                                                            while($row2 = $result2->fetch_assoc()) {
                                                                                                   //echo $row["ynums"]; 
                                                                                                    echo '[\'' . $row2["Mnth"] . '\', ' . $row2["Score"] . ']';
                                                                                                
                                                                                                    if($cnt1 < $result2->num_rows-1 )
                                                                                                    {
                                                                                                        echo ',';

                                                                                                    }
                                                                                                    $cnt1++;

                                                                                            }

                                                                                        } else {

                                                                                            echo "no data!"; 

                                                                                        }
                                    
                                   echo ']';
                                    echo ' "}';
                                    if($cnt2 < $result->num_rows-1 )
                                    {
                                        echo ',';

                                    }
                                    $cnt2++;
                                }
                                 echo ']';
                            } else {
                                
                                echo "no data!"; 
                                
                            }
    }


$conn->close();
?>