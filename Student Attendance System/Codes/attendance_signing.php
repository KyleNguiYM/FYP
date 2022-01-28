<?php 
require_once "controllerUserData.php";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
 
require_once('connection.php'); 
date_default_timezone_set('Asia/Singapore');

$sql="SELECT student.id_no FROM students
INNER JOIN usertable ON students.email= usertable.email";
$result=$con->query($sql);
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
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

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
                style="width:45px; height:45px; margin-: 5px;">SUC</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><?php echo $fetch_info['email'] ?> <a href="logout-user.php" class="btn btn-danger square-btn-adjust">Log out</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                            <li>
                                <a  href="shome.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                            </li>
                            <li>
                                <a  href="inbox.php"><i class="fa fa-inbox fa-3x"></i> Inbox</a>
                            </li>
                            <li>
                                <a  href="scanqr.php"><i class="fa fa-qrcode fa-3x"></i> Scan QR Code</a>
                            </li>
                            <li>
                                <a  href="sclass.php"><i class="fa fa-list-alt fa-3x"></i> Class</a>
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
                     <h2>Sign Attendance</h2>                         
                    </div>
                       
                </div>
                <div class="alert alert-warning" role="alert">
                <i class="fa fa-exclamation-circle "></i> <b>Alert: </b> 
                Remember to sign the attendance everyday. Student who have attendance rate < 75% would receive warning letter. 
                </div>
                <div class="panel panel-primary">
                <div class="panel-heading">
                <h3 class="panel-title">Attendance Signing</h3>
                </div>
                <div class="panel-body">
    
                <form action="sign_attend.php" method="POST">
                <div class="row">
                            <div class="col-md-12">
                            <div class="form-group mb-3">
                            <?php

                            $sql="SELECT id_no FROM students INNER JOIN usertable ON students.name= usertable.name 
                            WHERE email='$email'";

                            $result=$con->query($sql);

                            if ($result->num_rows > 0) {    
                                while($row = $result->fetch_assoc()) {
                                //display result
                                $id_no=$row['id_no'];

                            ?>
                                <label>Student ID</label>
                                <input type="text" name="student_id" value="<?php echo $id_no ?>" class="form-control" readonly/>
                            <?php
							    } //end while loop
						    }	// end if statement
					        ?>
                            </div>
                                <hr>
                                <?php 
                                    $con = mysqli_connect("localhost","root","","sas_db");

                                    if(isset($_GET['subject_code']))
                                    {
                                        $subject_code = $_GET['subject_code'];
                                        $doc = $_GET['doc'];

                                        $query = "SELECT * FROM class WHERE subject_code='$subject_code'";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                
                                                <div class="form-group mb-3">
                                                    <label>Subject Code</label>
                                                    <input type="text" name="subject_code" value="<?php echo $subject_code?>" class="form-control" readonly/>
                                                </div>
                                                <p><b>Subject: </b><?= $row['subject']; ?></p>
                                                <p><b>Lecturer: </b><?= $row['lecturer']; ?></p>
                                                <p><b>Venue: </b><?= $row['venue']; ?></p>
                                                <br>
                                                
                                                <div class="form-group mb-3">
                                                    <label for="">Time Slot</label>                                                   
                                                    <select name="timeslot" id="timeslot" class="form-control" required>
                                                        <option selected>Choose...</option>
                                                        <option value="<?= $row['weekday'] ?>, <?= $row['start_time'] ?> - <?= $row['end_time'] ?>"><?= $row['weekday'] ?>, <?= $row['start_time'] ?> - <?= $row['end_time'] ?></option>
                                                        <option value="<?= $row['weekday2'] ?>, <?= $row['start_time2'] ?>-<?= $row['end_time2'] ?>"><?= $row['weekday2'] ?>, <?= $row['start_time2'] ?> - <?= $row['end_time2'] ?></option>
                                                    </select>
                                                </div> 
                                                                                               
                                                <label>Date of Class: </label>
                                                <div class="form-group mb-3">
                                                <input type="date" name="doc" value="<?php echo $doc?>" class="form-control">
                                                </div>    
                                                
                                                <label>Attendance Status</label> 
                                                <div class="radio">
                                                    <input type="radio" name="attend_status" value="Present" checked/> Present
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" name="attend_status" value="Absent" /> Absent
                                                </div>
                                                <div class="checkbox">
                                                    <input type="radio" name="attend_status" value="Late" /> Late
                                                </div>
                                                <div class="form-group mb-3">
                                                <button type="submit" name="sign_attendance" class="btn btn-success"><i class="fa fa-edit"></i> Sign attendance</button>
                                                </div>
                                                
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    }
                                   
                                ?>

                            </div>
                            
                            </form>
                </br>
                
                                
                            </div>
                 <!-- /. ROW  -->
                           
                
              
                        
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
    <script src="https://code.jquery.com/jquery-3.6.0.js" ></script>
    <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>
</html>
