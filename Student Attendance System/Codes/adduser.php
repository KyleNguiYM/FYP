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

if(isset($_POST['name'])){  //if recevied updated record
	$name=$_POST['name'];
    $email=$_POST['email'];
    $usertype=$_POST['usertype'];

$sql="INSERT INTO usertable (name,email,usertype) VALUE ('$name','$email','$usertype')";

$result=$con->query($sql);

if($result){
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	You have already added a new user.
	<a href="add.php" class="alert-link">Back to users list</a>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

$con->close();
}

include('aheader.php');
?>
<br>

<div class="container">
<div class="card mt-4">
                    <div class="card-header">
                        <h4 class="text-center">Add User</h4>
                    </div>
                    <div class="card-body">
	                <form method="post" action="add.php" enctype="multipart/form-data">
		            <div class="form-group col-md">
			        <label for="Name" class="form-label">Name</label>
			        <input type="text" class="form-control" id="name" name="name" required>
		            </div>		
		            <div class="form-group col-md">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                    <div class="col-md-4">
			        <label for="usertype" class="form-label">User Type</label>
                    <select name="usertype" class="form-control">
                    <option selected>Select...</option>
                    <option value="admin">Admin</option>
                    <option value="lecturer">Lecturer</option>
                    </select>
                    </div>
                    </div>
		            <div class="form-group col-md-4">			
	                <button type="submit" class="btn btn-primary">Add</button>
                    </div>
	            </form>
    </div>
</div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://subjects.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>