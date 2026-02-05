<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
    exit();
}

elseif($_SESSION['usertype'] == 'student')
{
    header("location:login.php");
    exit();
}
$host="localhost";
$user="root";
$password="";
$db="schoolproject";
  
$conn=mysqli_connect($host,$user,$password,$db);
$sql="SELECT * FROM teacher";
$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>View Teacher</title>

<?php
include 'admin_css.php';
?>
	
</head>
<body>
<?php
include 'admin_sidebar.php';
?>

		<div class="content">
		<h1>Teacher Data</h1>
 <table border="1px">
<tr> 
<th style="padding: 20px; font-size: 15px;">Teacher Name</th>
<th style="padding: 20px; font-size: 15px;">Description</th>
<th style="padding: 20px; font-size: 15px;">Experience</th>

</tr>

<?php
while($info=$result->fetch_assoc())
{
?>


<tr>
    <td style="padding: 20px; background-color: skyblue">
<?php echo "{$info['name']}"; ?> 
</td>
    <td style="padding: 20px; background-color: skyblue">
<?php echo "{$info['description']}"; ?> 
</td>
    <td style="padding: 20px; background-color: skyblue">
<?php echo "{$info['experience']}"; ?> 
</td>
     
</td>
</tr>
<?php
}
?>




</table>




	</div>
</body>
</html>
