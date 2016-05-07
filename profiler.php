<?php 
$sid = $_GET["sid"]; 
$vid = $_GET["vid"];
$vors = 3;

if(isset($sid)){
    $vors = 0;
    $vid = 300;
    
}else{
    $vors = 1;
    $sid = 300;
}

?>
<html>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="javascript/script.js"></script>
    
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="default.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    <link href="yep.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script>
        var which = <?php echo $vors; ?> 
        
        $(document).ready( function(){
            google.charts.load("current", {packages:["corechart"]});
            if (which == 0){
                            $.ajax({
                                   url: 'http://coho.spurlock.io/student/query.php',
                                   data: { sid : <?php echo $sid; ?> },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                        
                                    var json = JSON.parse(data);                                              

                                    //document.write(json["fName"]);
                                    //<div class="row row-centered">
                              
                                    $("#nametag").text(json["fName"] + " " + json["lName"]);
                              
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Parent 1 Name</h3><p id = "1" >'+json["pn1"]+'</p></div></div></div>');
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Parent 2 Name</h3><p id = "1" >'+json["pn2"]+'</p></div></div></div>');
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Medical Info</h3><p id = "1" >'+json["minfo"]+'</p></div></div></div>');
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Phone Number</h3><p id = "1" >'+json["pnum"]+'</p></div></div></div>');
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Email</h3><p id = "1" >'+json["Email"]+'</p></div></div></div>');
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Address</h3><p id = "1" >'+json["Address"]+'</p></div></div></div>');
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Emergency Contact Name</h3><p id = "1" >'+json["EmergencyName"]+'</p></div></div></div>');

                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Emergency Contact Number</h3><p id = "1" >'+json["EmergencyNumber"]+'</p></div></div></div><div class="column"></div>');
                                        
                                       studentStats1();
                                       studentStats2();
                                   },
                                   type: 'GET'
                                });
                            }
                                   
                if (which == 1){
                            $.ajax({
                                   url: 'http://coho.spurlock.io/student/query.php',
                                   data: { vid : <?php echo $vid; ?> },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                       
                                    var json = JSON.parse(data);                                              

                                    //document.write(json["fName"]);
                                    //<div class="row row-centered">
                              
                                    $("#nametag").text(json["fName"] + " " + json["lName"]);
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Phone Number</h3><p id = "1" >'+json["pnum"]+'</p></div></div></div>');
                                       
                                    $("#wrapper3").append('<div class="col-md-4"><div  class="column"><div class="box"> <a href="#"></a><h3 id = "fn">Email</h3><p id = "1" >'+json["Email"]+'</p></div></div></div>');
                                       
                                   },
                                   type: 'GET'
                                });
                            }
                                   
                                   
                   
                                   
                                   
                                   
                function studentStats1()
                {
                    $.ajax({ 
                                   url: 'http://coho.spurlock.io/stats.php',
                                   data: {sid : <?php echo $sid; ?> , subid : 1 },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                    var stats  = JSON.parse(data);
                                   
                                       
                                    
                                    for (var i = 0; i < stats.length; i++)
                                    {
                                       
                                        $('#wrapper3 .row').append('<div class="col-md-4" id="scoreChart"><script> google.charts.setOnLoadCallback(drawChart);function drawChart() { var data = google.visualization.arrayToDataTable(' + stats[i]["data"] + '); var options = { title: "Performance Reading' + stats[i]["year"] + '"}; var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values'+ String(i+(1*stats.length)) +'")); chart.draw(data, options); } <\/script><div id="columnchart_values'+ String(i+(1*stats.length)) +'"></div></div>');
                                        //alert(stats[i]["data"]);
                                        //google.charts.setOnLoadCallback(drawChart(stats[i]["data"],i)); 
                                    }
                                      
                                    

                                   },
                                   type: 'GET'
                                });
                }
                    
                    function studentStats2() 
                {
                    $.ajax({ 
                                   url: 'http://coho.spurlock.io/stats.php',
                                   data: {sid : <?php echo $sid; ?> , subid : 2 },
                                   error: function(){ $('#info').html('<p>An error has occurred</p>');},
                                   success: function(data) 
                                   {
                                    var stats  = JSON.parse(data);
                                   
                                       
                                    
                                    for (var i = 0; i < stats.length; i++)
                                    {
                                       
                                        $('#wrapper3 .row').append('<div class="col-md-4" id="scoreChart"><script> google.charts.setOnLoadCallback(drawChart);function drawChart() { var data = google.visualization.arrayToDataTable(' + stats[i]["data"] + '); var options = { title: "Performance Math' + stats[i]["year"] + '"}; var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values'+ String(i+(10*stats.length)) +'")); chart.draw(data, options); } <\/script><div id="columnchart_values'+ String(i+(10*stats.length)) +'"></div></div>');
                                        //alert(stats[i]["data"]);
                                        //google.charts.setOnLoadCallback(drawChart(stats[i]["data"],i)); 
                                    }
                                      
                                    

                                   },
                                   type: 'GET'
                                });
                    
                    
                    
                    
                                
                                
                }
                          
                          });

            
            
            







    </script>
    
        <body id="profiler">
        
    <div class="container-fluid">    
    <?php include 'navbar.php';?>
        
    <div id="header-wrapper">
        <div id="header" class="container">
            <div id="logo">
                <h1><a id = "nametag" href="#">NAME</a></h1>
                <span> </span> 


            </div>
        </div>
    </div>
    <div id="wrapper3">
     
       <div class="row">
        
        
        </div>
        
        <div class="row row-centered">
            <div id="info">
                <h1>INFO</h1><br/>
            </div>
            
        </div>
    </div>
    </div>
       
</body> 
    
    

</html>