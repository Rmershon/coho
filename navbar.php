<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
echo '<nav navbar-default class="navbar-static-top">
        <div class="container-fluid">
        <div id = "navbar">
            <ul class="nav navbar-nav">
                <div class="navbar-header">
                    <button type="button" data-target="#navCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">COHO</a>
                </div>
                <div id="navCollapse" class="collapse navbar-collapse">
                    <li style="float:left"><a href="work.php">Home</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Volunteers <span class="caret"></span></a>
                      <ul class="dropdown-menu" id="drop">
                        <li><a href="volunteerList.php">Volunteer List</a></li>
                        <li><a href="vtime.php">Hours</a></li>
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Grade Book <span class="caret"></span></a>
                      <ul class="dropdown-menu" id="drop">
                        <li><a href="grades.php?subid=2">Math</a></li>
                        <li><a href="grades.php?subid=1">Reading</a></li>
                      </ul>
                    </li>
                    <li><a href="attendance.php">Attendance</a></li>
                    <li><a href="studentList.php">Students</a></li>
                </div>
            </ul>
    </div>
    </div>
    </nav>';
?>