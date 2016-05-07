<?php session_start(); $msg = $_SESSION['LID']; ?>

<html>
    
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="javascript/script.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="yep.css">
        
    <script>
        
        var cls = ""; 
        var lid = <?php session_start(); echo $_SESSION['LID'];?>;
        var date_num = "";
        var json_data = []; 
        $(document).ready(function (){
            
        
        
         
        
        $('#loadout').click(function(){
        //alert("made it");
        read_list();
        
        });
            
        $(document).on('click', ".buttonred", function(){
        red_attend(this.id); 
        //$(this).removeClass("buttonred");
        //$(this).addClass("buttongreen");
        });
            
        $(document).on('click', ".buttongreen", function(){
        green_attend(this.id);
        //$(this).removeClass("buttongreen");
        //$(this).addClass("buttonred");
        });
            
        
        function red_attend(id_num){

                                    id_num = $json_data[id_num]["sid"];
            
            
                                    

                                    window.date_num = document.getElementById("dater").value; 
                                    
                                    

                                    $.ajax({
                                    url: 'http://coho.spurlock.io/update.php',
                                    data: { sid : id_num, dday: date_num , val : 1},
                                    error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                    success: function(data) 
                                    {
                                        read_list();
                                        
                                    },
                                    type: 'GET'
                                });
                              
                              
                        };
            
                        function green_attend(id_num){

                                    id_num = $json_data[id_num]["sid"];
            
                                    window.date_num = document.getElementById("dater").value; 
                                    
                                    

                                    $.ajax({
                                    url: 'http://coho.spurlock.io/update.php',
                                    data: { sid : id_num, dday: date_num , val : 0},
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
                                   url: 'http://coho.spurlock.io/student/query.php',
                                   data: { lid :  <?php echo $msg; ?>, dday: date_num },
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
                        //alert("made it 2");
                        $.ajax({ 
                                   url: 'http://coho.spurlock.io/update.php',
                                   data: { lid : <?php echo $msg; ?>, dday: date_num },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                       
                                        if(data!="no data!"){
                                            //alert("nope");
                                        }
                                   },
                                   type: 'GET'
                                });
                        read_list();
                    }
                      
                    function fill_list(){
                        
                        
                    
                        date_num = document.getElementById("dater").value;
                        
                        
                        $("#content").html(" ");
                        for(var i = 0; i<$json_data.length;i++){
                        

                                                    if (i%2==0)
                                                                            {
                                                                                $("#content").append('<div class="row" id="stuList-even"><div class = "container-even"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><button class="' + $json_data[i]["class"] + '" id="' + i + '" ></button></div></div>');
                                                                            }else

                                                                            {
                                                                                 $("#content").append('<div class="row" id="stuList-odd"><div class = "container-odd"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><button class="' + $json_data[i]["class"] + '" id ="' + i + '" ></button></div></div>');  

                                                                            }
                        }
                    }
                        
            

        }); 
  
    </script>
    
    </head>
    <body id="attendance">
    <div class="container-fluid">
        <?php include 'navbar.php';?>
        <div class="jumbotron">
        <h1>DATE</h1>
        </div>
        <div class="row" id="datePicker">
            <div class="col-md-6">
                <input type="date" id="dater" name="dater">
            </div>
            <div class="col-md-4" id="loader">
                <button type="button" id = "loadout" class="button">Load List</button>   
            </div>
        </div>  
        
    
    
    
    
    
    
    
    
        <div id = "content">
		
	   </div>
        <div id = "info">
		
	   </div>
    </div>
    
    
    
    
    
   </body> 
</html>