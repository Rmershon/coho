<?php 
 
session_start(); $msg = $_SESSION['LID']; $subid = $_GET["subid"];
?>
<html>
    
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="javascript/script.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="yep.css">
    <script>
        
        var cls = ""; 
        var date_num = "";
        var json_data = []; 
        $(document).ready(function (){
            
        
        
         
        
        $('#loadout').click(function(){
        //alert("made it");
        read_list();
        
        });
            
        $(document).on('change', ".texter", function(){
        update_score(this.id,$(this).val()); 
        //$(this).removeClass("buttonred");
        //$(this).addClass("buttongreen");
        });
            
            
        
        function update_score(id_num,score){

                                    window.date_num = document.getElementById("dater").value; 
                                    
                                    id_num = $json_data[id_num]["VID"];
                                    

                                    $.ajax({
                                    url: 'http://coho.spurlock.io/vlog.php',
                                    data: { vid : id_num, setday: date_num , val : score},
                                    error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                    success: function(data) 
                                    {
                                        read_list();
                                        
                                    },
                                    type: 'GET'
                                });
                              
                              
                        };
        
                     function read_list(){ 
                         window.date_num = document.getElementById("dater").value; 
                          
                         $.ajax({
                                   url: 'http://coho.spurlock.io/vlog.php',
                                   data: {date: date_num},
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        
                                        if(data=="no data!"){
                                            populateDay();
                                        }else{
                                            $json_data = JSON.parse(data);
                                            fill_list();
                                        }
                                        
                                   },
                                   type: 'GET'
                                });
                        
                     }
            
                    function populateDay(){
                        
                        window.date_num = document.getElementById("dater").value; 
                        //alert(" 2");
                        $.ajax({ 
                                   url: 'http://coho.spurlock.io/vlog.php',
                                   data: {dset: date_num },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                       
                                       read_list();  
                                   },
                                   type: 'GET'
                                });
                        
                    }
                      
                    function fill_list(){
                        
                        
                    
                        date_num = document.getElementById("dater").value;
                        
                        
                        $("#content").html(" ");
                        for(var i = 0; i<$json_data.length;i++){
                        

                                                    if (i%2==0)
                                                                            {
                                                                                $("#content").append('<div class="row" id="stuList-even"><div class = "container-even"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><input id="' + i + '" class = "texter" type="text" value = "' + $json_data[i] ["hrs"]+ '"></div></div>');  
                                                                            }else

                                                                            {
                                                                                 $("#content").append('<div class="row" id="stuList-odd"><div class = "container-odd"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><input id="' + i + '" class = "texter" type="text" value = "' + $json_data[i] ["hrs"]+ '"></div></div>'); 

                                                                            }
                        }
                    }
                        
            

        }); 
  
    </script>
    
    </head>
    <body id="volunteer">
    <div class="container-fluid">
    <?php include 'navbar.php';?>
    <div class="jumbotron">   
    <h1>Volunteer Time</h1>
    <h1>DATE</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input type="date" id="dater" name="dater">
        </div>
        <div class="col-md-4">
            <button type="button" id = "loadout" class="button" >Load List</button>
        </div>
    </div>
    
    <div id = "content">
		
	</div>
    <div id = "info">
		
	</div>
    </div>
    
    
    
    
   </body> 
</html>