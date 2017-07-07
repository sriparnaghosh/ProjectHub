<?php
    session_start();
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    $user='root';
    $pass='';
    $dbname='projecthub';
    $topic = '';
            $conn = mysql_connect('localhost',$user,$pass) or die("Connection failed");
            mysql_select_db("projecthub",$conn);
            $sql=mysql_query("SELECT * FROM project",$conn);
           	

?>
<!DOCTYPE html>
<html  lang="en">
<head>
	<title>ProjectHub | Welcome</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
    <script type="text/javascript" src="jquery/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<div class="header1">
	<div class="row">
		<div class="col-md-3" style="font-size: 25px;">ProjectHub</div>
		<div class="col-md-6"></div>
		<div class="col-md-2"><button id="add-project-click">Add Project</button></div>
		<div class="col-md-1"><a href="logout.php"><button style="color: white">Logout</button></a></div>

	</div>
</div>
<div class="row">
	<div class="col-md-2" id="sidebar">
		<div id="interest">
			<div class="row" id=""><a>Web designing</a></div>
			<div class="row" id=""><a>Cloud Computing</a></div>
			<div class="row" id=""><a>Big Data</a></div>
			<div class="row" id=""><a>Machine learning</a></div>
			<div class="row" id=""><a>Android</a></div>
			<div class="row" id=""><a>iOS Development</a></div>
			<div class="row" id=""><a>Matlab</a></div>
			<div class="row" id=""><a>Image Processing</a></div>
			<div class="row" id=""><a>Cryptography</a></div>
			<div class="row" id=""><a>Technical Papers</a></div>
			<div class="row" id=""><a>Aptitude</a></div>
			<div class="row" id=""><a>Java</a></div>
			<div class="row" id=""><a>C++</a></div>
			<div class="row" id=""><a>C</a></div>
			<div class="row" id=""><a>Python</a></div>
			<div class="row" id=""><a>PHP</a></div>
			<div class="row" id=""><a>JavaScript</a></div>
		</div>
	</div>
	<div class="col-md-6" id="posts">

	<?php 							 //displaying all posts from database

	$num=mysql_numrows($sql);
	$i=0;

	while($i < $num):

		$proj=mysql_result($sql,$i,"proj_title");
		$status=mysql_result($sql,$i,"status");
		$description=mysql_result($sql,$i,"description");

		echo "<a><div class='post1' id='posting'>";
		echo "<div class='row'>";
				echo "<div class='col-md-10 protitle' id='pro-title'>Project Title:$proj</div>";
				echo "<div class='col-md-2' id='pro-status'>$status</div>";
			echo "</div><hr>";
			echo "<div class='row description' id='pro-desc'>$description</div>";
		echo "</div></a>";

		$i++;

	endwhile;

	mysql_close($conn);
	?>
	</div>

	<div class="col-md-4 " id="full_details">
		<div id="add-project">
			<center><h2>Wow! Tell Us About Your Project</h2></center><br>
			<form action="createPost.php" method="POST">
				<input type="text" name="project-title" placeholder="Project Title" required><br><Br>
				<input type="text" name="project-topic" placeholder="Project Topic" required><br><Br>
				<textarea name="project-description" placeholder="Project Description" required class="inputclass3"></textarea><br><Br>
				<div class="row">
					<div class="col-md-6">
						<input type="radio" name="project-status" value="running" class="radio-button"><span class="radio-field">Running</span> 
					</div>
					<div class="col-md-6">
						<input type="radio" name="project-status" value="done" class="radio-button"><span class="radio-field">Done</span><br><Br>
					</div>
				</div>
				<input type="submit" value="Inspire The World With This Project">

			</form>
		</div>
		<div id="project-full-descp">
			<div class="row">
				<div class="col-md-10 protitle" id="full-pro-title">Project Title</div>
				<div class="col-md-1" id="full-pro-status">Status</div>
			</div><hr>
			<div class="row description" id="full-pro-desc">Full Description here</div><hr>
			<div class="row buttons">
				<button>Join</button>
				<button>Request</button>
			</div>
		</div>

	</div>
</div>

</body>
<script type="text/javascript">
$(document).ready(function(){
    $("#add-project-click").click(function(){
        $("#add-project").toggle(600);
        $("#project-full-descp").toggle(600);

    });

    $("#post1").click(function(){
    	
    	$("#add-project").toggle(600);
        $("#project-full-descp").toggle(600);
        document.getElementById('full-pro-title').innerHTML = document.getElementById('pro-title').innerHTML;
        document.getElementById('full-pro-status').innerHTML = document.getElementById('pro-status').innerHTML;
        document.getElementById('full-pro-desc').innerHTML = document.getElementById('pro-desc').innerHTML;
    });
});

</script>
</html>