<?php 
    session_start();
    $role = $_SESSION['sess_userrole'];
    if(!isset($_SESSION['sess_username']) && $role!="admin"){
      header('Location: index.php?err=2');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
	  <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	
	
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body>
    
    
     

	
	
	<head>
    <meta charset="UTF-8">
	  <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
			
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/index.php?id=<?php echo $_SESSION['sess_username'];?>"> <img src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/logo1.png" alt="Mountain View" style="width:;height:;"><p></p>
</a>

            </div>
            <!-- /.navbar-header -->
			
           
		   
		   
		   
		   
		   
		   <!------------------------- Display comments--------------------------->
			
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
					
					<?php
							
							// Database Variables (edit with your own server information)
							 $server = 'localhost';
							 $user = 'root';
							 $pass = '';
							 $db = 'phpro_auth';
							 
							 // Connect to Database
							 $connection = mysql_connect($server, $user, $pass) 
							 or die ("Could not connect to server ... \n" . mysql_error ());
							 mysql_select_db($db) 
							 or die ("Could not connect to database ... \n" . mysql_error ());
							
							$title = array();
							$comments = array();
							$date = array();
							$myUser = $_SESSION['sess_username'];
							$sql ="SELECT taskTitle,comments,checkedDate FROM task WHERE members LIKE '%$myUser%' OR manager = '$myUser'    ORDER BY checkedDate DESC ";
							$resultadao = mysql_query ($sql);
							$i=0;
							while ($row = mysql_fetch_object ($resultadao) AND $i!=6)

							{
								$titles = $row -> taskTitle;
								$commentss = $row -> comments;
								$dates = $row -> checkedDate;
								$title[$i] = $titles;
								$comments[$i] = $commentss;
								$date[$i] = $dates;
								
								$i =$i+1;
							
							}
							
							
							echo "<ul class='dropdown-menu dropdown-messages'>";
							
							
							
							
							for ($i=0; $i<6; $i++)	{
									echo "<li>";
									echo "<a href='#'>";
									echo "<div>";
									echo " <strong>$title[$i]</strong>";
									echo "<span class='pull-right text-muted'>";
									echo" <em>$date[$i]</em>";
									echo "</span>";
									echo "</div>";
									
									echo "<div>$comments[$i]</div>";
									
									
									echo"</a>";
									echo"</li>";
									
													}				
									echo "<li class='divider'></li>"		;					 
									echo "  </li>";
									echo "  </ul>";
								   
									echo " </li>";
		 
								  ?>
		   
		   
		   
		   
		   
		   
		   
		   
		   
               <!------------------------- Display Tasks--------------------------->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                   
							
							<?php
							
							// Database Variables (edit with your own server information)
							 $server = 'localhost';
							 $user = 'root';
							 $pass = '';
							 $db = 'phpro_auth';
							 
							 // Connect to Database
							 $connection = mysql_connect($server, $user, $pass) 
							 or die ("Could not connect to server ... \n" . mysql_error ());
							 mysql_select_db($db) 
							 or die ("Could not connect to database ... \n" . mysql_error ());
							
							$lista = array();
							$dens = array();

							echo "<ul class='dropdown-menu dropdown-tasks'>";
							$myUser = $_SESSION['sess_username'];
							$sql ="SELECT taskTitle,Progress  FROM task WHERE members LIKE '%$myUser%' OR manager = '$myUser'    ORDER BY checkedDate DESC ";
							$resultadao = mysql_query ($sql);
							$i=0;
							while ($row = mysql_fetch_object ($resultadao))

							{
								$title = $row -> taskTitle;
								$progress = $row -> Progress;
								$lista[$i] = $title;
								$dens[$i] = $progress;
								$i =$i+1;
							
							}
							
							
							
							 for ($i=0; $i<5; $i++)	{
									echo "<li>";
									echo "<a href='#'>";
									echo "<div>";
									echo "<p>";
									echo"  <strong>$lista[$i]</strong>";
									echo  "<span class='pull-right text-muted'>$dens[$i] Complete</span>";
									echo "</p>";
									echo" <div class='progress progress-striped active'>";
									echo" <div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='$dens[$i]' aria-valuemin='0' aria-valuemax='100' style='width: $dens[$i]%'>";
									echo"    <span class='sr-only'>40% Complete (success)</span>";
									echo"   </div>";
									echo"  </div>";
									echo"</div>";
									echo"</a>";
									echo"</li>";
									
							 }					
			  
		  
								  ?>
								
												
							
                       
                        
                      
                        <li>
                            <a class="text-center" href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/viewtasks.php">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
				
				
				
				<!------------------------------------------------------------------------------------------------------------------------------------>
                    
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
					
					
					
					
					
					
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                       
                        
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                
				
				
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <img src="<?php echo $_SESSION['sess_userpic'] ;?>" alt="" height="30" width="30">
                    </a>
                    <ul class="dropdown-menu dropdown-user">
					
						<li><a href="#"><i class="fa fa-user fa-fw"></i>Welcome  "<?php echo $_SESSION['sess_username'];?>"</a></li>
                        
                        
                        <li class="divider"></li>
						
						
						
					
                        <li><a href="http://localhost/CompanyCalendar\Login/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li  <a="" href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel"><img src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/managerpanel.png" Adminalt="Mountain View" style="width:;height:;"><p></p>
</a>
                            <!--<div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div> -->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/index.php?id=<?php echo $_SESSION['sess_username'];?>"><i class="fa fa-calendar fa-fw"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Tasks<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/viewtasks/viewtasks.php?id=<?php echo $_SESSION['sess_username'];?>">View Tasks</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addtasks/addtasks.php?id=<?php echo $_SESSION['sess_username'];?>">Add Tasks</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/edittasks/edittasks.php?id=<?php echo $_SESSION['sess_username'];?>">Edit Tasks </a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-rocket fa-fw"></i> Events<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/EditEvents/viewEvents.php">View Events</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addEvents/addEvents.php">Add Events</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/EditEvents/editevents.php">Edit Events</a>
                                </li>
								
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-comments fa-fw"></i> Meetings<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/editmeetings/viewmeetings.php">View Meetings</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/addmeetings/addmeetings.php">Add Meetings</a>
                                </li>
								<li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/editmeetings/editmeetings.php">Edit Meetings</a>
                                </li>
								
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/charts/taskProgression.php">Task Progressions</a>
                                </li>
                                <li>
                                    <a href="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/pages/charts/donevsProg.php">Done vs. In Progress</a>
                                </li>
								    </ul>
                        
                        </li>
                   
								
                            </ul>
                        </li>
                        
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">View Events</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           
				
				
			
						
					
											
							<?php
							/* 
								VIEW.PHP
								Displays all data from 'players' table
							*/

								// connect to the database
								include('connect-db.php');
								$myID=$_SESSION['sess_username'];
								// get results from database
								$result = mysql_query("SELECT * FROM events WHERE users LIKE '%$myID%' OR users ='ALL' OR eventsRespo LIKE '%$myID%' ") 
									or die(mysql_error());  
									
								// display data in table
								
								
								
								
								
								echo "<div class='panel-body'>";
								echo"<div class='dataTable_wrapper'>";
									echo"<table class='table table-striped table-bordered table-hover' id='dataTables-example'>";
										echo"<thead>";
											echo"<tr>";
												echo"<th>ID</th>";
												echo"<th>Title Title</th>";
												echo"<th>Event Discrpition</th>";
												echo"<th>Event Date</th>";
												echo"<th>Event Time</th>";
												echo"<th>Members</th>";
												
	
											
											echo"</tr>";
										echo"</thead>";
										echo"<tbody>";
								
								
										
								// loop through results of database query, displaying them in the table
								while($row = mysql_fetch_array( $result )) {
									
																								
									// echo out the contents of each row into a table
									echo "<tr class='odd gradeX'>";
									echo '<td>' . $row['eventsID'] . '</td>';
									echo '<td>' . $row['eventsTitle'] . '</td>';
									echo '<td>' . $row['eventsDetails'] . '</td>';
									echo '<td>' . $row['eventsDate'] . '</td>';
									echo '<td>' . $row['eventsTime'] . '</td>';
									echo '<td>' . $row['users'] . '</td>';
									
							
									
									
									

									echo "</tr>"; 
								} 
								
								echo "</tbody>";
								

								// close table>
								echo "</table>";
								echo"</div>";
							?>
					
					</body>
						</html>			
									
									
								  <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/dist/js/sb-admin-2.js"></script>

	<!-- DataTables JavaScript -->
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/CompanyCalendar/UInterfaces/ManagerPanel/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    

  <script>var events = <?php echo $events ?>;</script>
  
 
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

  
  
  </body>
</html>