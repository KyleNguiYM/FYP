
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
</head>
<?php
include('connection.php');

$sql="SELECT * FROM class";

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
font-size: 16px;"><a href="logout-user.php" class="btn btn-danger square-btn-adjust">Log out</a> </div>
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
                     <h2>Take Attendance</h2>                         
                    </div>
                    
                </div>

<div class="panel panel-warning">
  <div class="panel-heading">
    <h3 class="panel-title">Attendance Taking Panel </h3>
  </div>
  <div class="panel-body">
  <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-8">
                                <br>  
                                <label for="searchbar"><h5><b>Search Class</h5></b></label>
                                    <input type="text" name="subject_code" placeholder="Type to search..." list="subject_code&name" autocomplete="off" 
                                    value="<?php if(isset($_GET['subject_code'])){echo $_GET['subject_code'];} ?>" class="form-control">
                                    <datalist id="subject_code&name">
                                    <?php while($row = mysqli_fetch_array($result)) { ?>
                                    <option value="<?php echo $row['subject_code']; ?>"><?php echo $row['subject']; ?>, <?php echo $row['lecturer']; ?></option>
                                    <?php } ?>
                                    </datalist>
                                    <?php mysqli_close($con); ?>
                                </div>
                                <div class="col-md-4">
                                    <br><br><br> 
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </div>
    </form>
    <form action="take_attendance.php" method="GET">
                            <div class="row">
                                <div class="col-md-12">
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","sas_db");

                                    if(isset($_GET['subject_code']))
                                    {
                                        $subject_code = $_GET['subject_code'];

                                        $query = "SELECT * FROM class WHERE subject_code='$subject_code' ";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <div class="form-group mb-3">
                                                    <label for="subject">Subject Code</label>
                                                    </br></br>
                                                    <input type="text" name="subject_code" value="<?= $row['subject_code']; ?>" class="form-control" readonly>    
                                                </div>
                                                <br>
                                                <div class="form-group mb-3">
                                                    <label for="subject">Subject</label>
                                                    </br></br>
                                                    <input type="text" name="subject" value="<?= $row['subject']; ?>" class="form-control" readonly>    
                                                </div>
                                                <br>
                                                <div class="form-group mb-3">
                                                    <label for="">Lecturer</label>
                                                    </br></br>
                                                    <input type="text" name="lecturer" value="<?= $row['lecturer']; ?>" class="form-control" readonly>
                                                </div>
                                                <br>
                                                <div class="form-group mb-3">
                                                    <label for="">Venue</label>
                                                    </br></br>
                                                    <input type="text" name="venue" value="<?= $row['venue']; ?>" class="form-control" readonly>
                                                </div>
                                                <br>
                                                <div class="form-group mb-3">
                                                <label><b>Time Slot:</b></label>  
                                                <select name="timeslot" id="timeslot" class="form-control" required>
                                                <option selected>Choose...</option>
                                                <option value="<?= $row['weekday'] ?>, <?= $row['start_time'] ?> - <?= $row['end_time'] ?>"><?= $row['weekday'] ?>, <?= $row['start_time'] ?> - <?= $row['end_time'] ?></option>
                                                <option value="<?= $row['weekday2'] ?>, <?= $row['start_time2'] ?>-<?= $row['end_time2'] ?>"><?= $row['weekday2'] ?>, <?= $row['start_time2'] ?> - <?= $row['end_time2'] ?></option>
                                                </select>
                                                </div>
                                                <br>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>
                                </form>
                                                
                                <div class="col-md-2">
                                <button type="submit" name="take_attendance" class="btn btn-info"> Take attendance</button>
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
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
