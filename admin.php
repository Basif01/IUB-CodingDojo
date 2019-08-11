<!DOCTYPE html>
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="university";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

<html>
<head>
	<title>ADMIN PANEL</title>
	<link rel="stylesheet" type="text/css" href="adminstyle.css"/>
</head>
<body>
	<form  method="POST">
		<h1>ADMIN PANEL</h1>
		<h3>Independent University, Bangladesh</h3>
						
<div class="box">
	<h4>UNIVERSITY INFORMATION</h4>
	
	<p > 
		<div>
			University ID
			<input   id="UniID" name="UniID"></input>
		</div>
		<DIV>
		University Land
		<input   id="UniLand" name="UniLand"></input>	
		</DIV>
		<div>
			Total School
		<input   id="UniSchool" name="UniSchool"></input>
		</div>
		<div>
			Total Department
		<input   id="UniDept" name="UniDept"></input>
		</div>
		<div>
			Total Course
		<input   id="UniCourse" name="UniCourse"></input>
		</div>
		<div>
			Total Student
		<input   id="UniStudent" name="UniStudent"></input>
		</div>
		
<input id="submitButton" name="submitButton" type="submit" value="Submit">
	</p>
	<?php  
	//for uniInfo Input//
	if(isset($_POST["submitButton"]))
{
$UniID=$_POST['UniID'];
$Land=$_POST['UniLand'];
$TSchool=$_POST['UniSchool'];
$TDept=$_POST['UniDept'];
$TCourse=$_POST['UniCourse'];
$TStudent=$_POST['UniStudent'];
 	$sql = "INSERT INTO university (UniID,UniLand,TotalSchool,TotalDept,TotalCourse,TotalStudent) VALUES ('$UniID','$Land','$TSchool','$TDept','$TCourse','$TStudent')";


if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);
}
?>
	</div>
	<br>
	<div class="box">
	<h4>STUDENT INFORMATION</h4>
	<p > 
		<div>
			Student ID
			<input   id="STDID" name="ST"></input>
		</div>
		<div>
			Student Name
			<input   id="STDName" name="STDName"></input>
		</div>
		<DIV>
		Student Adress
		<input   id="STDAdr" name="STDAdr"></input>	
		</DIV>
		<div>
			Student Phone
		<input   id="STDPhn" name="STDPhn"></input>
		</div>
		<div>
			Student Email
		<input   id="STDEmail" name="STDEmail"></input>
		</div>
		<div>
			Department
		<input   id="STDDept" name="STDDept"></input>
		</div>
		<div>
		
<input id="submitButton1" name="submitButton1" type="submit" value="Submit">
	</p>
	<?php  
	//studentInfoInput//
	if(isset($_POST["submitButton1"]))
{
	$ID=$_POST['ST'];
$name=$_POST['STDName'];
$address=$_POST['STDAdr'];
$phone=$_POST['STDPhn'];
$email=$_POST['STDEmail'];
$dpt=$_POST['STDDept'];
 	$sql = "INSERT INTO student (StudentID,StudentName,StudentAddress,StudentPhone,StudentEmail,Department) VALUES ('$ID','$name','$address','$phone','$email','$dpt')";


if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
	</div>
</p>
</div>
<div class="box">
	<h4> SEARCH STUDENT INFORMATION</h4>
		Student ID
		<input   id="SearchID" name="SearchID"></input>
		
<input id="Search1" name="Search1" type="submit" value="Search">

	</p>

	 <?php

if(isset($_POST['Search1']))
{
    $valueToSearch = $_POST['SearchID'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `student` WHERE CONCAT(`StudentID`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);

    
}
 else {
    $query = "SELECT * FROM `student`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{   $connect = mysqli_connect("localhost", "root", "", "university");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

 
?>
<?php while($row = mysqli_fetch_array($search_result) ):?>
	<table>
                <tr>
                    <td><?php echo $row['StudentID'];?></td>
                    <td><?php echo $row['StudentName'];?></td>
                    
                </tr>
            </table>
                <?php endwhile;?>
	</div>
</form>
</body>
</html>
