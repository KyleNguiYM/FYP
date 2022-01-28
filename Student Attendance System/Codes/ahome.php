<?php 
require_once('connection.php'); 

?>
<!DOCTYPE html>
<html>
<head>
    
<!-- CSS only -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
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
    h1,h2{
        width: 100%;
        text-align: center;
        font-size: 40px;
        font-weight: 500;
        color:#fff;
    }
    table{
        margin-top: 5em;
    }
    li {
    list-style: none;
    }
.anidi_services {
    padding: 40px 20px 40px 20px;
    border-radius: 6px;
    background-color: rgb(20, 110, 153);
}
.anidi_services ul {
    display: block;
    margin-left:10px;
}

.anidi_services ul li {
    display: block;
    margin-top: 5px;
    margin-bottom: 5px;
    color: #fff;
    text-decoration: none;
    -webkit-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
}

.anidi_services ul li a {
    display: block;
    color: #fff;
    text-decoration: none;
    -webkit-transition: 0.5s;
    -o-transition: 0.5s;
    transition: 0.5s;
}

.anidi_services ul li a span.icon {
    width: 50px;
    display: block;
    font-size: 30px;
    vertical-align: middle;
    float: left;
}

.anidi_services ul li a span.text {
    display: block;
    vertical-align: middle;
    font-size: 16px;
    margin-left: 45px;
    padding-top: 10px;
}
</style>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">SUC Student Attendance System</a>
    <button type="button" class="btn btn-light"><a href="logout-user.php"> Log out</a></button>
    </nav>
    <?php include('aheader.php');?>
    <br>
    <h1 style='color: #fff;'><b>Home</b></h1>
    </br>
    </br>
    <h2 style='color: #fff;'>Quick Links</h2>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container anidi_services ">
	<div class="row">
		<ul class="links">
                            <li><a href="course.php" title="Course list">
                                <span class="icon"><i class="fa fa-book"></i></span>
                                <span class="text">Course</span></a>
                                <div class="clearfix"></div>
                            </li>
                            <li><a href="astudent.php" title="Student list">
                                <span class="icon"><i class="fa fa-address-book"></i></span>
                                <span class="text">Students</span></a>
                                <div class="clearfix"></div>
                            </li>
                            <li><a href="class.php" title="Class list">
                                <span class="icon"><i class="fa fa-briefcase"></i></span>
                                <span class="text">Class</span></a>
                                <div class="clearfix"></div>
                            </li>
                            <li><a href="class.php" title="Attendance list">
                                <span class="icon"><i class="fa fa-list"></i></span>
                                <span class="text">Attendance</span></a>
                                <div class="clearfix"></div>
                            </li>
                            <li><a href="faculty.php" title="Faculty list">
                                <span class="icon"><i class="fa fa-university"></i></span>
                                <span class="text">Faculty</span></a>
                                <div class="clearfix"></div>
                            </li>
                            <li><a href="users.php" title="Users">
                                <span class="icon"><i class="fa fa-users"></i></span>
                                <span class="text">Users</span></a>
                                <div class="clearfix"></div>
                            </li>
                        </ul>
	</div>
    </div>
</br>
</body>
<?php include('footer.php');?>
</html>