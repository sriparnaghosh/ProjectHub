<?php
	session_start();
	function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

	$servername='localhost:8091';
	$user='root';
	$pass='';
	$dbname='projecthub';

	$conn=new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");
	//check connection if we can connect to the database or not
	if($conn->connect_error)
	{
		die("Connection failed:".$conn->connect_error);
	}
	$UniId = $_SESSION['id'];
	$proTitles=$_REQUEST["project-title"];
	$cat=$_REQUEST["project-topic"];
	$des=$_REQUEST["project-description"];
	$run=$_REQUEST["project-status"];

	$sql="INSERT INTO project VALUES('?','".$UniId."','".$proTitles."','".$cat."','".$des."','".$run."')";
	$result = $conn->query($sql);
	redirect('landing.php');
	$conn->close();
?>
