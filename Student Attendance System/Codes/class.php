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
    h1{
        width: 100%;
        text-align: center;
        font-size: 40px;
        font-weight: 500;
    }
    table{
        margin-top: 5em;
    }
</style>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<body>
<?php
require_once('connection.php');

if(isset($_GET['delete'])){

	$delete=$_GET['delete'];
	$sql="delete from class where subject_code='$delete'";
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

	$sql="update class set weekday='$weekday',start_time='$start_time',end_time='$end_time', weekday='$weekday2',start_time='$start_time2',end_time='$end_time2', venue='$venue' where subject_code='$subject_code'";
	    
	$result=$con->query($sql);	
}
$sql="SELECT * FROM `class`";
$result=$con->query($sql);

?>
<div class="header-top">
<nav class="navbar">
<a class="navbar-brand" href="#">SUC Student Attendance System</a>
<button type="button" class="btn btn-light"><a href="logout-user.php">Log out</a></button>
</nav>

<?php
include('aheader.php');
?>
</div>
</br>		
<h1 style='color: #fff;'><b>Classes</b></h1>
</br>
<div class="container-md">

<table class="table table-hover table-striped" style="background-color:white;">
<span >
	<a class="btn btn-warning btn-block col-sm-2 float-right" href="newclass.php" id="new_class">
	<i class="fa fa-plus"></i> New Class</a></span>
    <thead class="thead-dark">
      <tr>
        <th class="text-center" width="10%">Subject Code</th>
        <th class="text-center">Subject Name</th>
        <th class="text-center">Lecturer</th>
        <th class="text-center" width="29%">Time Slot</th>
        <th class="text-center" width="10%">Venue</th>
        <th class="text-center" width="13%">Actions</th>
      </tr>
    </thead>
        
    <tbody>
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
		    <tr>
					<td class="text-center"><?php echo $subject_code ?></td>
                    <td class="text-center"><?php echo $subject ?></td>   
					<td class="text-center"><?php echo $lecturer ?></td>
					<td> Slot 1: <?php echo $weekday ?>, <?php echo $start_time ?> - <?php echo $end_time ?>
		            </br> Slot 2: <?php echo $weekday2 ?>, <?php echo $start_time2 ?> - <?php echo $end_time2 ?>
                    </td>
					<td class="text-center"><?php echo $venue ?></td>
                    <td class="text-center">
					    <a href="editclass.php?sid=<?php echo $subject_code; ?>" class="btn btn-sm btn-primary">Edit</a>
					    <a href="class.php?delete=<?php echo $subject_code;?>" 
                        class="btn btn-sm btn-danger" onclick="return confirm ('Confirm Delete?')">Delete</a>
                    </td>
		    </tr>
					
			<?php
					} //end while loop
				}	// end if statement
			?>
	</tbody>
</table>
</div>
</br>

</body>
<?php include('footer.php');?>
</html>