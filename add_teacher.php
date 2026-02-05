<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
    exit();
}

elseif($_SESSION['usertype']=='student')
{
    header("location:login.php");
    exit();
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$conn=mysqli_connect($host,$user,$password,$db);

if ($conn===false) {
    die("Connection error");
}
if(isset($_POST['add_teacher']))
{
$t_name=$_POST['teacher_name'];
$t_description=$_POST['description'];
$t_experience=$_POST['experience'];

$sql="INSERT INTO teacher(name,description,experience) 
      VALUES ('$t_name','$t_description','$t_experience')";

$result=mysqli_query($conn,$sql);
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
<style type="text/css">


label
{
   display: inline-block;
   text-align: right;
   width: 100px;
   padding-top: 10px;
   padding-bottom: 10px;
}
.div_deg
{
background-color: skyblue;
width: 400px;
padding-top: 70px;
padding-bottom: 10px;
}



</style>
<?php
include 'admin_css.php';
?>
	
</head>
<body>
<?php
include 'admin_sidebar.php';
?>

		<div class="content">
                 <center>
		<h1>Add Teacher</h1>
<div class="div_deg">
<form action="add_teacher.php" method="POST">
       <div>
        <label>Teacher Name</label>
        <input type="text" name="teacher_name"><br>
        </div>
      <div>
     <label>Description</label>
     <input type="text" name="description"><br>
    </div>
     <div>
     <label>Experience</label>
     <input type="text" name="experience"><br>
      </div>
     <div>
     <input type="submit" name="add_teacher" class="btn btn-primary"  value="Add Teacher">
     </div>
     

</form>
</div>
</center>
	</div>
</body>
</html>

