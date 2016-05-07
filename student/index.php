<?php
$servername = "localhost";
$username = "racer161_test";
$password = "Test2048";
$dbname = "racer161_Test";

$sid = $_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Students WHERE SID = " + sid;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
           echo ' "Student": {

              "Name":' . $row["Name"] . ',

              "Medical Info":' . $row["Medical Info"] . ',

              "Phone":' . $row["Phone"] . ',

              "Email":' . $row["Email"] . ',

              "Address":' . $row["Adddress"] . ',
              
              "Parent1":' . $row["Parent1"] . ',
              
              "Parent2":' . $row["Parent2"] . ',

           }'
        
        
        //echo $row["Name"]. "/" . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>