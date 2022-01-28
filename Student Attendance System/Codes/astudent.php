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
		color: #fff;
    }
    table{
        margin-top: 5em;
		background-color: #fff;
    }
</style>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<body>
<div class="header-top">
<nav class="navbar">
<a class="navbar-brand" href="#">SUC Student Attendance System</a>
<button type="button" class="btn btn-light"><a href="logout-user.php">Log out</a></button>
</nav>
</div>
<?php
include('connection.php');
include('aheader.php');

if(isset($_GET['delete'])){

	$delete=$_GET['delete'];
	$sql="delete from students where id_no='$delete'";
	$result=$con->query($sql);
}
if(isset($_POST['id_no'])){  //if recevied updated record
	$id_no=$_POST['id_no'];
	$batch_id=$_POST['batch_id'];
	$name=$_POST['name'];

	$sql="update students set batch_id='$batch_id',name='$name' where id_no='$id_no'";
	    
	$result=$con->query($sql);	
}



$sql="select * from students ORDER BY `id_no`";

$result=$con->query($sql);
?>
</br>
<h1 style='color: #fff;'><b>Students</b></h1>
</br>
<div class="container">
	    <div class="row">
		    <table class="table table-hover table-striped" style="background-color:white;">
			<span class="float:right">
			<a class="btn btn-warning btn-block col-sm-2 float-right" href="newstudent.php" id="new_student">
				<i class="fa fa-plus"></i> New Student</a></span>
				</br>
				<thead>
		        <tr class="thead-dark">
		            <th class="text-center"  width="15%">Student ID</th>
					<th class="text-center">Batch</th>
					<th class="text-center">Name</th>
                    <th class="text-center">Actions</th>
		        </tr>
		    </thead>
		        <tbody>	
					<?php
						if ($result->num_rows > 0) {    
							while($row = $result->fetch_assoc()) {
								//display result
								$id_no=$row['id_no'];
								$batch_id=$row['batch_id'];
								$name=$row['name'];
					?>
		            <tr>
		                <td class="text-center"><?php echo $id_no; ?></td>
						<td class="text-center"><?php echo $batch_id; ?></td>
						<td class="text-center"><?php echo $name; ?></td>
		                <td class="text-center">
		                    <a href="editstudent.php?sid=<?php echo $id_no; ?>" class="btn btn-primary">Edit</a>
							<a href="astudent.php?delete=<?php echo $id_no;?>
							" class="btn btn-danger" onclick="return confirm ('Confirm Delete?')">Delete</a>
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
	</div>
	</br>
</body>
<?php include('footer.php');?>
</html>
