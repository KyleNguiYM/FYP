<?php 
require_once('connection.php'); 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUC Student Attendance System</title>
    <link rel="icon" href="SUClogo.png" type="image/png">
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<?php
include('connection.php');

$sql="SELECT attend.subject_code,attend.student_id,students.name,attend.timeslot,attend.attendstatus,attend.dateofclass,attend.signing_time FROM attend
INNER JOIN students ON attend.student_id = students.id_no";

$result=$con->query($sql);
?>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="lhome.php"><img src="SUClogo.png" 
                style="width:45px; height:45px; margin: 5px;">SUC</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="logout-user.php" class="btn btn-danger square-btn-adjust">Log out</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					
                    <li>
                        <a  href="lhome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a  href="qrcode.php"><i class="fa fa-qrcode fa-3x"></i> QR Code</a>
                    </li>
					<li>
                        <a  href="lclass.php"><i class="fa fa-list-alt fa-3x"></i> Class</a>
                    </li>
                    <li>
                        <a  href="student.php"><i class="fa fa-users fa-3x"></i> Student</a>
                    </li>		
                      <li>
                        <a  href="attendance_check.php"><i class="fa fa-edit fa-3x"></i> Take Attendance</a>
                    </li>
                    <li>
                        <a  href="attendance_record.php"><i class="fa fa-table fa-3x"></i> Attendance Record</a>
                    </li>
                    <li>
                        <a  href="attendance_report.php"><i class="fa fa-bar-chart-o fa-3x"></i> Attendance Report </a>
                    </li>				
					
					                     	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h1>Student Attendance System</h1> 
                     <h2>Attendance Record</h2>                         
                    </div>
                    
                </div>
                <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Search By Date</h3>
                </div>
                <div class="panel-body">
                <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Click to Filter</label> <br>
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                </form>
                </div>
                </div>
    
                </br>
                <div class="table-responsive">
                    
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead >
                                <tr>
                                    <th class="text-center" width="5%">Student ID</th>
                                    <th class="text-center" width="12%">Student Name</th>
                                    <th class="text-center" width="13%">Class</th>
                                    <th class="text-center" width="20%">Timeslot</th>
                                    <th class="text-center" width="10%">Attendance Status</th>
                                    <th class="text-center">Leave Status</th>
                                    <th class="text-center">Date of Class</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $con = mysqli_connect("localhost","root","","sas_db");

                                if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];

                                    $query = "SELECT attend.subject_code,attend.student_id,students.name,attend.timeslot,attend.attendstatus,attend.dateofclass,attend.leave,attend.signing_time FROM attend
                                    INNER JOIN students ON attend.student_id = students.id_no WHERE dateofclass BETWEEN '$from_date' AND '$to_date' 
                                    ORDER BY `signing_time` ASC";
                                    
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $row['student_id']; ?></td>
                                                <td class="text-center"><?= $row['name']; ?></td>
                                                <td class="text-center"><?= $row['subject_code']; ?></td>
                                                <td class="text-center"><?= $row['timeslot']; ?></td>
                                                <td class="text-center"><?= $row['attendstatus']; ?></td>
                                                <td class="text-center"><?= $row['leave']; ?></td>
                                                <td class="text-center"><?= $row['dateofclass']; ?></td>
                                                <td class="text-center">
                                                <button data-toggle="modal" data-target="#myModal" name="edit_attendance" class="btn btn-info"><i class="fa fa-edit "></i> Edit Attendance</button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>

                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Attendance</h4>
                                        </div>
                                        <div class="modal-body">
                                        <p><em>* Click on close button if you don't need to change anything.</em></p>
                                            <form action="edit_attend.php" method="POST">
                                            <label>Attendance Status</label> 
                                                <div class="checkbox">
                                                    <input type="checkbox" name="attend_status" value="Present" checked/> Present
                                                </div>
                                                <div class="checkbox">
                                                    <input type="checkbox" name="attend_status" value="Absent" /> Absent
                                                </div>
                                                <div class="checkbox">
                                                    <input type="checkbox" name="attend_status" value="Late" /> Late
                                                </div>
                                            <div class="form-group">
                                                <label for="leave" class="col-form-label">Enter Leave(If available):</label>
                                                <input type="text" name="leave" id="leave" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="leave_details" class="col-form-label">Leave Details:</label>
                                                <textarea class="form-control" id="leave_details" id="leave_details"></textarea>
                                            </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="edit_attendance" class="btn btn-primary"><i class="fa fa-save "></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                            </div>
                 <!-- /. ROW  -->
                <hr />                
                
              
                        
        </div>
               
    </div>
    
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
