<?php
    session_start();
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }


	$email_login=$_POST["email"];
	$password_login=$_POST["password"];
    $user='root';
    $pass='';
    $dbname='projecthub';

	   if ($email_login && $password_login) {
            $conn = new mysqli('localhost',$user,$pass,$dbname) or die("Connection failed");

            $sql = "SELECT * FROM logininfo WHERE '$email_login' = email";
            $result = $conn->query($sql);
            $row=mysqli_fetch_array($result);
            if($row)
            {
                $fullname=$row['email'];
                $password=$row['password'];
                $_SESSION['id'] = $row['id'];
            }
            if($password==$password_login)
            {
                redirect('landing.php');

            }
            else 
                 redirect('index.html');

        }
	$conn->close();

?>