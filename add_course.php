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
if(isset($_POST['add_course']))
{
$name=$_POST['name'];
$code=$_POST['code'];
$description=$_POST['description'];

$sql="INSERT INTO course(name,code,description) 
      VALUES ('$name','$code' ,'$description')";

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
		<h1>Add course</h1>
<div class="div_deg">
<form action="add_course.php" method="POST">
       <div>
        <label>Course Name</label>
        <input type="text" name="name"><br>
        </div>
      <div>
     <label>Course Code</label>
     <input type="text" name="code"><br>
    </div>
     <div>
     <label>Description</label>
     <input type="text" name="description"><br>
      </div>
     <div>
     <input type="submit" name="add_course" class="btn btn-primary"  value="Add Course">
     </div>
     

</form>
</div>
</center>
	</div>
</body>
</html>

