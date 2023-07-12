<?php include 'php/update_category.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">
		<form action="php/update_category.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Update</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">Nom</label>
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?=$row['name'] ?>" >
		   </div>

		   
  

		   <div class="form-group">
		     <label for="contact">Description</label>
		     <input type="description" 
		           class="form-control" 
		           id="description" 
		           name="description" 
		           value="<?=$row['description'] ?>" >
		   </div>
		   
		   <input type="text" 
		          name="id"
		          value="<?=$row['id']?>"
		          hidden >

		   <button type="submit" 
		           class="btn btn-primary"
		           name="update_category">Update</button>
		    <a href="read_category.php" class="link-primary">View</a>

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

.container table {
	padding: 50px;
	border-radius: 70px;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.link-right {
	display: flex;
	justify-content: flex-end;
}
textarea{
    border-radius: 2px;
    padding: 10px;
    width: 80%;
    
}
body {
    background: rgb(242, 215, 213);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}


        </style>
	    </form>
	</div>
</body>
</html>