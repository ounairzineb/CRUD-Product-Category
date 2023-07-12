<?php
// Start the session before any output
session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Category Form</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <style>
        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container form {
            background: white;
            width: 800px;
            padding: 90px;
            border-radius: 50px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .link-right {
            display: flex;
            justify-content: flex-end;
        }

        textarea {
            border-radius: 2px;
            padding: 10px;
            width: 80%;
        }

        body {
            background: rgb(242, 215, 213);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
            flex-direction: column;
        }

        
    </style>

    <div class="container">
    <?php include "sidebar.php"; ?>
        <form action="php/create_category.php" method="post">
            <h4 class="display-4 text-center">Categories</h4><hr><br>

            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php } ?>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter the category name">
            </div>

            <div class="form-group">
                <label for="description" style="display: block;">Description</label>
                <textarea class="form-control" name="description" placeholder="Enter the description"></textarea>
            </div>

            

            <button type="submit" class="btn btn-primary" name="create">Create</button>
            <a href="read_category.php" class="link-primary">View</a>
        </form>
    </div>

    <?php 
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
</head>
<body>
	
	<style>
		h1 {
			position: absolute;
			top: 20px;
			left: 20px;
		}

		a {
			background: black;
			padding: 5px 20px;
			color: #fff;
			border-radius: 5px;
			margin-right: 10px;
			border: none;
			text-decoration: none;
		}
	</style>
</body>
</html>

<?php 
} else {
	header("Location: index1.php");
	exit();
}
?>
</body>
</html>
