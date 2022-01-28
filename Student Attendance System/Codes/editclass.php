<!DOCTYPE html>
<html>
<!-- CSS only -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    body {
        background-image:url(SUC_building.jpg);
        background-size: cover;
        background-position: right;
        width: 100%;
        height:100%;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    nav{
        padding-left: 80px!important;
        padding-right: 80px!important;
        background: #4242df;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h2{
        width: 100%;
        text-align: center;
        font-size: 30px;
        font-weight: 500;
    }
    table{
        margin-top: 5em;
    }
</style>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<?php
include('connection.php');

if(isset($_GET['sid'])){ 
	
	$sid=$_GET['sid'];
	$sql="select * from class where class.subject_code='$sid'";

	$result=$con->query($sql);
}

if(isset($_POST['subject_code'])){  
    $subject_code=$_POST['subject_code'];
	$subject=$_POST['subject'];
	$lecturer=$_POST['lecturer'];
    $weekday=$_POST['weekday'];
    $start_time=$_POST['start_time'];
   	$end_time=$_POST['end_time'];
    $weekday2=$_POST['weekday2'];
    $start_time2=$_POST['start_time2'];
    $end_time2=$_POST['end_time2'];
    $venue=$_POST['venue'];

$sql="insert into class values('$subject_code','$subject','$lecturer','$weekday','$start_time','$end_time','$weekday2','$start_time2','$end_time2', '$venue')";

$result=$con->query($sql);

$con->close();
}
?>
<body>
<div class="header-top">
<nav class="navbar">
<a class="navbar-brand" href="#">SUC Student Attendance System</a>
<button type="button" class="btn btn-light"><a href="logout-user.php">Log out</a></button>
</nav>
<?php
include('aheader.php');
?>
</br>    

</br>
<div class="container">
<div class="card mt-4">
    <div class="card-header">
        <h4 class="text-center">Edit Class</h4>
    </div>
    <div class="card-body">
	            <form method="post" action="class.php" enctype="multipart/form-data">
		        <?php
			    if ($result->num_rows > 0) {    
                    while($row = $result->fetch_assoc()) {
                    //display result
                    $subject_code=$row['subject_code'];
                    $subject=$row['subject'];
                    $lecturer=$row['lecturer'];
                    $weekday=$row['weekday'];
                    $start_time=$row['start_time'];
                    $end_time=$row['end_time'];
					$weekday2=$row['weekday2'];
                    $start_time2=$row['start_time2'];
                    $end_time2=$row['end_time2'];
                    $venue=$row['venue'];
		        ?>
		        <div class="form-group">
			    <label for="ID">Subject Code</label>
			    <input type="text" class="form-control" id="subject_code" name="subject_code" value="<?php echo $subject_code; ?>" readonly>
		        </div>		
		        <div class="form-group">
			    <label for="Name">Subject Name</label>
			    <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject; ?>" required>
		        </div>
                <div class="form-group">
			    <label for="Lecturer">Lecturer Assigned</label>
			    <input type="text" class="form-control" id="lecturer" name="lecturer" value="<?php echo $lecturer; ?>" >
                </div>

				<div class="form-group">
			    <label for="Slot1">Slot 1</label>
                <div class="row">
                <div class="col-md-4">
                <label for="weekday" class="form-label"><em>Weekday</em></label>
                <select class="form-select" name="weekday" id="weekday" required>
    				<option value="">Select...</option>
        			<option value="Monday">Monday</option>
        			<option value="Tuesday">Tuesday</option>
        			<option value="Wednesday">Wednesday</option>
        			<option value="Thursday">Thursday</option>
					<option value="Friday">Friday</option>
    			</select>
                </div>
                <div class="col-md-3">
                <label for="starttime" class="form-label"><em>Start time</em></label>
                <select name="start_time" id="start_time" class="form-select" required>
                    <option selected>Choose...</option>
                    <option value="8:00 a.m.">8:00 a.m.</option>
        			<option value="9:00 a.m.">9:00 a.m.</option>
        			<option value="10:00 a.m.">10:00 a.m.</option>
        			<option value="11:00 a.m.">11:00 a.m.</option>
					<option value="12:00 p.m.">12:00 p.m.</option>
					<option value="1:00 p.m.">1:00 p.m.</option>
        			<option value="2:00 p.m.">2:00 p.m.</option>
        			<option value="3:00 p.m.">3:00 p.m.</option>
        			<option value="4:00 p.m.">4:00 p.m.</option>
        			<option value="5:00 p.m.">5:00 p.m.</option>
                </select>
                </div>
                <div class="col-md-3">
                <label for="endtime" class="form-label"><em>End time</em></label>
                <select name="end_time" id="end_time" class="form-select" required>
                    <option selected>Choose...</option>
                    <option value="8:00 a.m.">8:00 a.m.</option>
        			<option value="9:00 a.m.">9:00 a.m.</option>
        			<option value="10:00 a.m.">10:00 a.m.</option>
        			<option value="11:00 a.m.">11:00 a.m.</option>
					<option value="12:00 p.m.">12:00 p.m.</option>
					<option value="1:00 p.m.">1:00 p.m.</option>
        			<option value="2:00 p.m.">2:00 p.m.</option>
        			<option value="3:00 p.m.">3:00 p.m.</option>
        			<option value="4:00 p.m.">4:00 p.m.</option>
        			<option value="5:00 p.m.">5:00 p.m.</option>
                </select>
                </div>
                </div>
		        </div>

				<div class="form-group">
			    <label for="Slot2">Slot 2 (If available)</label>
                <div class="row">
                <div class="col-md-4">
                <label for="weekday2" class="form-label"><em>Weekday</em></label>
                <select class="form-select" name="weekday2" id="weekday2">
                    <option value="n/a" selected>N/a</option>
        			<option value="Monday">Monday</option>
        			<option value="Tuesday">Tuesday</option>
        			<option value="Wednesday">Wednesday</option>
        			<option value="Thursday">Thursday</option>
					<option value="Friday">Friday</option>
    			</select>
                </div>
                <div class="col-md-3">
                <label for="starttime2" class="form-label"><em>Start time</em></label>
                <select name="start_time2" id="start_time2" class="form-select">
                    <option value="n/a" selected>N/a</option>
                    <option value="8:00 a.m.">8:00 a.m.</option>
        			<option value="9:00 a.m.">9:00 a.m.</option>
        			<option value="10:00 a.m.">10:00 a.m.</option>
        			<option value="11:00 a.m.">11:00 a.m.</option>
					<option value="12:00 p.m.">12:00 p.m.</option>
					<option value="1:00 p.m.">1:00 p.m.</option>
        			<option value="2:00 p.m.">2:00 p.m.</option>
        			<option value="3:00 p.m.">3:00 p.m.</option>
        			<option value="4:00 p.m.">4:00 p.m.</option>
        			<option value="5:00 p.m.">5:00 p.m.</option>
                </select>
                </div>
                <div class="col-md-3">
                <label for="endtime2" class="form-label"><em>End time</em></label>
                <select name="end_time2" id="end_time2" class="form-select">
                    <option value="n/a" selected>N/a</option>
                    <option value="8:00 a.m.">8:00 a.m.</option>
        			<option value="9:00 a.m.">9:00 a.m.</option>
        			<option value="10:00 a.m.">10:00 a.m.</option>
        			<option value="11:00 a.m.">11:00 a.m.</option>
					<option value="12:00 p.m.">12:00 p.m.</option>
					<option value="1:00 p.m.">1:00 p.m.</option>
        			<option value="2:00 p.m.">2:00 p.m.</option>
        			<option value="3:00 p.m.">3:00 p.m.</option>
        			<option value="4:00 p.m.">4:00 p.m.</option>
        			<option value="5:00 p.m.">5:00 p.m.</option>
                </select>
                </div>
                </div>
                </div>
                <div class="form-group">
			    <label for="venue">Venue</label>
                <select class="form-control" name="venue" id="venue">
  					<option selected>Choose...</option>
  					<option value="L001">L001</option>
  					<option value="C013">C013</option>
					<option value="C015">C015</option>
					<option value="H001">H001</option>
					<option value="N002">N002</option>
                </select>
                </div>
				</br>
                <div class="form-group">			
	            <button type="submit" class="btn btn-primary">Update</button>
                </div>
		        <?php
				    } //end while loop
			    }	// end if statement
		        ?>
	            </form>

    
                </div>
            </div>

        </div>
    
   
</body>
</html>
