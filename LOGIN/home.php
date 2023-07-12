<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<body>
<style>
   

a {
	float: right;
	background: black;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
	text-decoration: none;
    position: absolute;
    top: 20px; right: 40px;
}
a:hover{
	opacity: .7;
}
 </style>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <a href="logout.php">Logout</a>
</body>
</html>

<?php 
}else{
     header("Location: index1.php");
     exit();
}
 ?>

 