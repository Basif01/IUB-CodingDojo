<?php
admin.php
if(isset($_POST["submitButton1"]))
{
	$SID=$_POST['STDID'];
$Sname=$_POST['STDName'];
$Saddress=$_POST['STDAdr'];
$Sphone=$_POST['STDPhn'];
$email=$_POST['STDEmail'];
$Sdept=$_POST['STDDept'];
 	$sql = "INSERT INTO student (StudentID,StudentName,StudentAddress,StudentPhone,StudentEmail,Department) VALUES ('$SID'$Sname','$Saddress','$Sphone','$email','$Sdept')";


if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
}
?>