<?php session_start();
$msg = $_SESSION['LID'];
?>
<html>
<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="yep.css">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800italic' rel='stylesheet' type='text/css'>
</head>
    

    <script>
        
        var cls = ""; 
        var lid = <?php session_start(); echo $_SESSION['LID'];?>;
        var date_num = "";
        var json_data = []; 
        $(document).ready(function (){
            
            
                        
            

        }); 
  
    </script>
<body>
    <div class="panel">
        <div id="head">
        
        </div>
        <ul>
            <li><a href="attendance.php"><p id = "attLoad">EDIT ATTENDANCE</p></a></li>
            <li><a href="grades.php?subid=1"><p id = "RscoreLoad">EDIT READING SCORES</p></a></li>
            <li><a href="grades.php?subid=2"><p id = "RscoreLoad">EDIT MATH SCORES</p></a></li>
            <li><a href="studentList.php"><p id = "stuLoad">STUDENT LIST</p></a></li>
            <li><a href="volunteerList.php"><p id = "stuLoad">VOLUNTEER LIST</p></a></li>
            <li><a href="vtime.php"><p id = "attLoad">EDIT VOLUNTEER HOURS</p></a></li>
        </ul>
    </div>
    <div id = "page">
    
    </div>
    
</body>    
    
    
</html>