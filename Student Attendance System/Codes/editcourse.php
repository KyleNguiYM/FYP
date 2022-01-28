<!DOCTYPE html>
<html>
<!-- CSS only -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
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
        text-align: center;
    }
    table{
        margin-top: 5em;
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

if(isset($_GET['pid'])){ 
	
	$pid=$_GET['pid'];
	$sql="select * from courses where courses.id='$pid'";

	$result=$con->query($sql);
}

if(isset($_POST['id'])){  
    $id=$_POST['id'];
	$course=$_POST['course'];
	$description=$_POST['description'];

$sql="insert into courses values('$id','$course','$description')";

$result=$con->query($sql);

$con->close();
}

include('aheader.php');
?>

<h2>Edit Course</h2>
<div class="container">
	<form method="post" action="course.php" enctype="multipart/form-data">
		<?php
			if ($result->num_rows > 0) {    
				while($row = $result->fetch_assoc()) {
					//display result
					$id=$row['id'];
	                $course=$row['course'];
                    $description=$row['description'];
		?>
		<div class="form-group">
			<label for="ID">ID</label>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>" readonly>
		</div>		
		<div class="form-group">
			<label for="Course">Course</label>
			<input type="text" class="form-control" id="course" name="course" value="<?php echo $course; ?>">
		</div>
        <div class="form-group">
			<label for="description">Description</label>
			<input type="textarea" class="form-control" id="description" name="description" value="<?php echo $description; ?>"><br/>
		<div class="form-group">			
	  <button type="submit" class="btn btn-primary">Update</button>
		<?php
				} //end while loop
			}	// end if statement
		?>
	</form>

<div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://subjects.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>