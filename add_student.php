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
if(isset($_POST['add_student']))
{
$username=$_POST['name'];
$user_email=$_POST['email'];
$user_phone=$_POST['phone'];
$user_password=$_POST['password'];


$check="SELECT * FROM user WHERE username = '$username'";
$check_user=mysqli_query($conn,$check);

$row_count=mysqli_num_rows($check_user);


if($row_count==1)
{
echo "Username Already Exist. Try Another One";
}
else
{

$sql="INSERT INTO user(username, email, phone, usertype, password) 
      VALUES ('$username', '$user_email', '$user_phone', '$user_usertype','$user_password')";

$result=mysqli_query($conn,$sql);

if($result)
{
echo "Data Uploaded Succesfully";
}
else
{
echo "Upload Failed";
}

}

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
		<h1>Add Student</h1>
<div class="div_deg">
<form action="#" method="POST">
       <div>
        <label>Username</label>
        <input type="text" name="name">
        </div>
      <div>
     <label>Email</label>
     <input type="email" name="email">
    </div>
     <div>
     <label>phone</label>
     <input type="number" name="phone">
      </div>
     <div>
     <label>Password</label>
     <input type="text" name="password">
     </div>
     <div>
     <input type="submit" name="add_student" class="btn btn-primary"  value="Add Student">
     </div>
     

</form>
</div>












</center>


	</div>
</body>
</html>

