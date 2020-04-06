<?php
	session_start();
	$username=$_SESSION["uname"];
	if(!isset($_SESSION["uname"]))
	{
		header("location:index.php");
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>XCOMPANY</title>
	<style>
		body{
			margin:0;
			padding:0px 50px;
		}
		a{
			text-decoration:none;
		}
		.header_area{
			width:100%;
			
			
		}
		.logoarea{
			width:35%;
			float:left;
			background-color:#25cee0;
		}
		.logoarea h1{
			padding-left:30px;
		}
		.menu_area{
			width:65%;
			float:left;
			background-color:#25cee0;
		}
		.menu_area ul{
			list-style:none;
			text-align:right;
		}
		.menu_area ul li{
			display:inline-block;
			padding:15px;
			color:white;
		}
		.menu_area ul li a{
			
			color:white;
		}
		.content_area{
			height:500px;
			width:100%;
			overflow:hidden;
		}
		.content_left{
			width:35%;
			float:left;
		}
		
		.content_right{
			width:65%;
			float:left;
		}
		.content_right_l{
			width:60%;
			float:left;
		}
		.content_right_r{
			width:40%;
			float:left;
		}
		.footer_area{
			width:100%;
			overflow:hidden;
		}
		.footer_area h3{
			text-align:center;
		}
		.content_right_l{
			width:50%;
			float:left;
		}
		.content_right_l{
			width:50%;
			float:left;
		}
		img{
			max-width:50%;
		}
		.content_left{
			background-color:#b770d7;
			color:white;
		}
		.content_left ul{
			list-style:none;
		}
		.content_left ul li{
			padding:10px 0px;
			
		}
		.content_left ul li a{
			color:white;
			padding:10px 0px;
		}
		.content_left ul li a:hover{
			background-color:black;
		}
		.footer_area{
			background-color:#25cee0;
		}
	</style>
</head>
<body>
	<div class="header_area">
		<div class="logoarea">
			<h1><span class="x">X</span>Company</h1>
		</div>
		<div class="menu_area">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li>Logged in as <a style="color:red;" href="profile.php"><?php echo $username; ?></a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
	<div class="content_area">
		<div class="content_left">
			<h3>Account</h3>
			<ul>
				<li><a href="dashboard.php">Dashboard</a></li>
				<li><a href="profile.php">View Profile</a></li>
				<li><a href="editprofile.php">Edit Profile</a></li>
				<li><a href="changepicture.php">Change Profile Picture</a></li>
				<li><a href="changepassword.php">Change Password</a></li>
			</ul>
		</div>
		<div class="content_right">
			<div class="content_right_l">
				<h3>Profile</h3>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "xdb";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT id, name, username, email,password, picture FROM users WHERE username='".$_SESSION["uname"]."'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						echo "<table>";
						while($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>Id :</td>";
							echo "<td>".$row["id"]."</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<td>Name :</td>";
							echo "<td>".$row["name"]."</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<td>Email :</td>";
							echo "<td>".$row["email"]."</td>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<td>Username :</td>";
							echo "<td>".$row["username"]."</td>";
							echo "</tr>";
							$picture=$row["picture"];

						}
						echo "</table>";
					} else {
						echo "0 results";
					}

					$conn->close();
					
					
				 ?>
			</div>
			<div class="content_right_r">
				<img src="<?php echo $picture; ?>" alt="" />
			</div>
		</div>
	</div>
	
</body>
</html>