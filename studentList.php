<?php session_start(); $msg = $_SESSION['LID']; ?>

<html>
    
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="javascript/script.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="yep.css">
    <script>
        
        var cls = ""; 
        var lid = <?php session_start(); echo $_SESSION['LID'];?>;
        var date_num = "";
        var json_data = []; 
        $(document).ready(function (){
            
            read_list();
            
            $('#loadout').click(function(){
                
                create_vol();
        
            });
            
            $(document).on('click', ".button", function(){
            
            var idFin = $json_data[this.id]["sid"];
                
                         $.ajax({
                                   url: 'http://coho.spurlock.io/delete.php',
                                   data: {sid : idFin },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                       alert("Student Deleted");
                                        
                                   },
                                   type: 'GET'
                                });
            });
            
                   
                    
            
                    
                     function create_vol(){ 
                         alert($('#firstname').val());
                          
                         $.ajax({
                                   url: 'http://coho.spurlock.io/create.php',
                                   data: { fName : $('#firstname').val() ,lName : $('#lastname').val() , medinfo: $('#medinfo').val() ,phone: $('#phone').val() ,email: $('#email').val() ,addr: $('#addr').val() ,p1: $('#p1').val() ,p2: $('#p2').val() ,emrName: $('#emrName').val() ,emrNumber: $('#emrNumber').val() ,lid : <?php echo $msg; ?>},
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        alert("successfully created new student!!");
                                        
                                   },
                                   type: 'GET'
                                });
                        
                     }
                                
                    function read_list(){ 
                         
                          
                         $.ajax({
                                   url: 'http://coho.spurlock.io/student/query.php',
                                   data: { lidonly :  <?php echo $msg; ?>},
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        
                                            $json_data = JSON.parse(data);
                                            fill_list();
                                        
                                   },
                                   type: 'GET'
                                });
                        
                     }
                      
                      
                    function fill_list(){
                        
                        
                    
                        
                        
                        
                        $("#content").html(" ");
                        for(var i = 0; i<$json_data.length;i++){
                        

                                                    if (i%2==0)
                                                                            {
                                                                                $("#content").append('<div class="row" id="stuList-even"><div class = "container-even" id ="'+i+'"><a href = "profiler.php?sid='+$json_data[i]["sid"]+'"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div></a><button class="button" id="' + i + '" >DELETE</button></div></div>');
                                                                            }else

                                                                            {
                                                                                 $("#content").append('<div class="row" id="stuList-odd"><div class = "container-odd" id ="'+i+'"><a href = "profiler.php?sid='+$json_data[i]["sid"]+'"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div></a><button class="button" id="' + i + '" >DELETE</button></div></div>');  

                                                                            }
                        }
                    }
                        
            

        }); 
  
    </script>
    
    </head>
    <body id="student">
    <div class="container-fluid">  
    <?php include 'navbar.php';?>
    
    <div id = "content">
		
	</div>
    <div class = "container-new">
        <div class="row">
        + ADD A NEW STUDENT<br>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                First name:<br>
                <input type="text" id="firstname"><br>
            </div>
            <div class="col-md-4">
                Last name:<br>
                <input type="text" id="lastname"><br>  
            </div>
            <div class="col-md-4">
                Medical info:<br>
                <input type="text" id="medinfo"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                Phone:<br>
                <input type="text" id="phone"><br>
            </div>
            <div class="col-md-4">
                Email:<br>
                <input type="text" id="email"><br>
            </div>
            <div class="col-md-4">
                Address:<br>
                <input type="text" id="addr"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                Parent 1:<br>
                <input type="text" id="p1"><br>
            </div>
            <div class="col-md-4">
                Parent 2:<br>
                <input type="text" id="p2"><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                Emergency Contact Name:<br>
                <input type="text" id="emrName"><br>
            </div>
            <div class="col-md-4">
                Emergency Contact Phone Number:<br>
                <input type="text" id="emrNumber"><br>
            </div>
        </div>
        <button type="button" id = "loadout" >Create Student</button>
    </div>
    <div id = "info">
		
	</div>
        
    </div>  
    
    
    
    
    
   </body> 
</html>