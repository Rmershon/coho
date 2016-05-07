<?php session_start(); $msg = $_SESSION['LID']; $subid = $_GET["subid"]; 
$headerMSG = "";
    
if($subid == 1)
{
    $headerMSG = "READING";
}
if($subid == 2)
{
    $headerMSG = "MATH";
}
?>

<html>
    
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="javascript/script.js"></script>
    <link rel="stylesheet" type="text/css" href="yep.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                                    
                                    id_num = $json_data[id_num]["sid"];
            

                                    $.ajax({
                                    url: 'http://coho.spurlock.io/update.php',
                                    data: { sid : id_num, setday: date_num , val : score},
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
                                   data: { lid :  <?php echo $msg; ?>, gday: date_num , subid: <?php echo $subid; ?> },
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
                                   data: { lid : <?php echo $msg; ?>, setday: date_num , subid : <?php echo $subid; ?>},
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
                                                                                $("#content").append('<div class="row" id="stuList-even"><div class = "container-even"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><input id="' + i + '" class = "texter" type="text" value = "' + $json_data[i] ["score"]+ '"></div></div>'); 
                                                                            }else

                                                                            {
                                                                                 $("#content").append('<div class="row" id="stuList-odd"><div class = "container-odd"><div class = "words">' + $json_data[i]["fName"]  + " " + $json_data[i]["lName"]+ '</div><input id="' + i + '" class = "texter" type="text" value = "' + $json_data[i] ["score"]+ '"></div></div>'); 

                                                                            }
                        }
                    }
                        
            

        }); 
  
    </script>
    
    </head>
    <body id="grades">
    <div class="container-fluid">
    <?php include 'navbar.php';?>
    <div class="jumbotron">
    <h1 id="gradeType"><?php echo $headerMSG; ?> GRADES</h1>
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