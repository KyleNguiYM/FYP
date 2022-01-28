<?php
session_start();
$con = mysqli_connect("localhost","root","","sas_db");

if (isset($_POST['enrollclass']))
{
    $id_no=$_POST['id_no'];
    $classes=$_POST['classes'];

    foreach($classes as $classlist)
    {
        $query="INSERT INTO enroll_list(id_no,subject_code) VALUE('$id_no','$classlist')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
        $_SESSION['status'] = "Class Enrolled Successfully";
        header("Location: enroll_class.php");
        exit(0);
    }
    else
    {
        $_SESSION['status'] = "Class Failed to Enroll";
        header("Location: enroll_class.php");
        exit(0);
    }
}
?>