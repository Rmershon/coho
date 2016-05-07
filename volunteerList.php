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
        var date_num = "";
        var json_data = []; 
        $(document).ready(function (){
            
            read_list();
            
            $('#loadout').click(function(){
                create_stu();
        
            });
            
            
            
            
                     function create_stu(){ 
                         
                          
                         $.ajax({
                                   url: 'http://coho.spurlock.io/create.php',
                                   data: { fName : $('#firstname').val() ,lName : $('#lastname').val(), phone: $('#phone').val() ,email: $('#email').val(), vol: 1},
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        alert("successfully created new volunteer!!");
                                        
                                   },
                                   type: 'GET'
                                });
                        
                     }
                                
                    function read_list(){ 
                         
                          
                         $.ajax({
                                   url: 'http://coho.spurlock.io/student/query.php',
                                   data: { lidonlyv : 1 },
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
                                                                                $("#content").append('<div class="row" id="stuList-even"><div class = "container-even" id ="'+i+'"><a href = "profiler.php?vid='+$json_data[i]["ID"]+'"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div></div></div></a>');
                                                                            }else

                                                                            {
                                                                                 $("#content").append('<div class="row" id="stuList-odd"><div class = "container-odd" id ="'+i+'"><a href = "profiler.php?vid='+$json_data[i]["ID"]+'"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div></div></div></a>');  

                                                                            }
                        }
                    }
                        
            

        }); 
  
    </script>
    
    </head>
    <body id="volunteer">
    <div class="container-fluid">
    <?php include 'navbar.php';?> 
        
    <div id = "content">
		
	</div>
    
    <div class = "container-new">
        <div class="row">
        + ADD A NEW VOLUNTEER<br>
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
        </div>
        
        <button type="button" id = "loadout" >Create Volunteer</button>
    </div>
    <div id = "info">
		
	</div>
    </div>
    
    
    
    
   </body> 
</html>