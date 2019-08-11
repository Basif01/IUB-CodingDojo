
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
if(isset($_POST["submitButton"]))
{
$UniID=$_POST['UniID'];
 	$sql = "INSERT INTO university (UniID) VALUES ('$UniID')";


if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}
?>