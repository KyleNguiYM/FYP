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
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" />
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
                     <h2>Attendance Report</h2>                         
                    </div>
                    
                </div>
                <div class="row">
                <div class="col-md-12">
                <div class="panel panel-success">
                <div class="panel-heading">
                <h3 class="panel-title">Filter by Class and Month</h3>
                </div>
                <div class="panel-body">
                <form action="" method="GET">
                            <div class="row">
                            <div class="col-md-8">
                            <?php
                            include('connection.php');

                            $sql="SELECT * FROM class";

                            $result=$con->query($sql);
                            ?> 
                            
                                <label for="searchbar"><h5><b>Select Class</h5></b></label>
                                    <input type="text" name="subject_code" placeholder="Type to search..." list="subject_code&name" autocomplete="off" 
                                    value="<?php if(isset($_GET['subject_code'])){echo $_GET['subject_code'];} ?>" class="form-control">
                                    <datalist id="subject_code&name">
                                    <?php while($row = mysqli_fetch_array($result)) { ?>
                                    <option value="<?php echo $row['subject_code']; ?>"><?php echo $row['subject']; ?>, <?php echo $row['lecturer']; ?></option>
                                    <?php } ?>
                                    </datalist> 
                                    <?php mysqli_close($con); ?>
                                
                                <div class="row">
                                <br>
                                <div class="col-md-8">
                                    <br>
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                                </div>

                                </div>
                            </div>
                </form>
                </div>
                </div>
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title">Attendance Table Panel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <form action="" method="GET">
                            <?php
                            $con = mysqli_connect("localhost","root","","sas_db");

                            if(isset($_GET['subject_code']))
                            {
                                $subject_code = $_GET['subject_code'];

                                $query = "SELECT enroll_list.id_no,enroll_list.subject_code,students.name FROM enroll_list LEFT JOIN students ON enroll_list.id_no = students.id_no WHERE subject_code='$subject_code'";
                                $query_run = mysqli_query($con, $query);
                                
                            ?>
                            <p><b>Class: </b><?php echo $subject_code?></p>
                            
                            <p><b>Absent Rate = </b>(100 - Attend Rate) % </p>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-report">
                                <thead>
                                        <tr>
                                            <th class="text-center">Student ID</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Present</th>
                                            <th class="text-center">Absent</th>
                                            <th class="text-center">Late</th>
                                            <th class="text-center">Total</th>
                                            <th class="text-center">Attend Rate(%)</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
    
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    $id_no=$row['id_no'];
                                                    $name=$row['name'];
					                ?>
                                        <tr>
					                    <td class="text-center"><?php echo $id_no?></td>
					                    <td class="text-center"><?php echo $name ?></td>
                                        <td class="text-center">
                                        <?php
                                               include('connection.php');
                                            
                                               $sql="SELECT Count(DISTINCT student_id,dateofclass) AS present FROM attend 
                                               WHERE student_id='$id_no' AND subject_code='$subject_code' AND attendstatus='Present'";
                                               
                                               $result=$con->query($sql);
   
                                               if ($result->num_rows > 0) {    
                                                   while($row = $result->fetch_assoc()) {
                                                       $present=$row['present'];
   
                                                   } //end while loop
                                               }	// end if statement
                                   
                                               echo $present; 
                                            ?>
                                        </td>
                                        <td class="text-center">
                                        <?php
                                               include('connection.php');
                                            
                                               $sql="SELECT Count(DISTINCT student_id,dateofclass) AS absent FROM attend 
                                               WHERE student_id='$id_no' AND subject_code='$subject_code' AND attendstatus='Absent'";
                                               
                                               $result=$con->query($sql);
   
                                               if ($result->num_rows > 0) {    
                                                   while($row = $result->fetch_assoc()) {
                                                       $absent=$row['absent'];
   
                                                   } //end while loop
                                               }	// end if statement
                                   
                                               echo $absent; 
                                            ?>
                                        </td>
                                        <td class="text-center">
                                        <?php
                                               include('connection.php');
                                            
                                               $sql="SELECT Count(DISTINCT student_id,dateofclass) AS late FROM attend 
                                               WHERE student_id='$id_no' AND subject_code='$subject_code' AND attendstatus='Late'";
                                               
                                               $result=$con->query($sql);
   
                                               if ($result->num_rows > 0) {    
                                                   while($row = $result->fetch_assoc()) {
                                                       $late=$row['late'];
   
                                                   } //end while loop
                                               }	// end if statement
                                   
                                               echo $late; 
                                            ?>
                                        </td>
                                        <td class="text-center">
                                        <?php
                                               include('connection.php');
                                            
                                               $sql="SELECT Count(DISTINCT student_id,dateofclass) AS total FROM attend 
                                               WHERE student_id='$id_no' AND subject_code='$subject_code'";
                                               
                                               $result=$con->query($sql);
   
                                               if ($result->num_rows > 0) {    
                                                   while($row = $result->fetch_assoc()) {
                                                       $total=$row['total'];
   
                                                   } //end while loop
                                               }	// end if statement
                                   
                                               echo $total; 
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                               include('connection.php');
                                            
                                               $sql="SELECT ROUND((SUM(CASE WHEN attendstatus = 'Present' THEN 1 ELSE 0 END)/COUNT(*)*100),2) as percent from attend 
                                               WHERE student_id='$id_no' AND subject_code='$subject_code'";
                                               
                                               $result=$con->query($sql);
   
                                               if ($result->num_rows > 0) {    
                                                   while($row = $result->fetch_assoc()) {
                                                       $percent=$row['percent'];
   
                                                   } //end while loop
                                               }	// end if statement
                                   
                                               echo $percent;
                                                
                                            ?>
                                        </td>
                                        <td class="text-center">
                                        <?php
                                        if ($total == 0) {
                                            echo "No actions taken because no attendance record.";
                                        } elseif ($percent < 75 & $total >= 3) {
                                            echo "Absent rate more than 25%. ";
                                            $receiver = "$id_no@sc.edu.my";
                                            $subject = "Warning letter";
                                            $body = "Hi, Student. Your absent rate is above 25%, please attend the incoming classes as many as you could to avoid being barred from 
final exam! Ignore this email if it is your first week for this class.";
                                            $sender = "From: admin@sc.edu.my";
                                            if(mail($receiver, $subject, $body, $sender)){
                                                echo "Warning letter sent successfully to $receiver";
                                            }else{
                                                echo "Sorry, failed while sending warning letter!";
                                            }
                                        } else {
                                            echo "No actions taken.";
                                        }
                                        ?>
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
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                
                $('#dataTables-report').dataTable({
                dom: 'Bfrtip',
                buttons: [
            {
                extend: 'pdfHtml5',
                title: "Attendance Report : <?php echo $subject_code?>",
                download: 'open',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            }
        ]
                });
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
