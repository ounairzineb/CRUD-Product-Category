<?php
// Start the session before any output
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
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
    height: 95vh;
    flex-direction: column;
}
</style>

<div class="container">
	<?php include "sidebar.php"; ?>
	<form action="php/create.php" method="post">
		<h4 class="display-4 text-center">Products</h4><hr><br>
		<?php if (isset($_GET['error'])) { ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $_GET['error']; ?>
		</div>
		<?php } ?>
		<div class="form-group">
			<label for="nom">Nom</label>
			<input type="nom" 
				   class="form-control" 
				   id="nom" 
				   name="nom" 
				   value="<?php if(isset($_GET['nom']))
								   echo($_GET['nom']); ?>" 
				   placeholder="Entrez le nom du produit">
		</div>

		<div class="form-group">
			<label for="categorie">Categorie</label>
			<select class="form-control" id="categorie" name="categorie">
				<?php
				// Include the database connection
				include "db_conn.php";

				// Query to retrieve the categories
				$query = "SELECT * FROM categories";
				$result = mysqli_query($conn, $query);

				// Loop through the categories and create the options
				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					$name = $row['name'];
					echo "<option value='$name'>$name</option>";
				}

				// Close the database connection
				mysqli_close($conn);
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="description" style="display: block;">Description</label>
			<textarea class="form-control" name="description" placeholder="Entrez la description"><?php if(isset($_GET['description'])) echo $_GET['description']; ?></textarea>
		</div>

		<div class="form-group">
			<label for="montant">Montant</label>
			<input type="montant" 
				   class="form-control" 
				   id="montant" 
				   name="montant" 
				   value="<?php if(isset($_GET['montant']))
								   echo($_GET['montant']); ?>" 
				   placeholder="Entrez le montant">
		</div>

		<button type="submit" 
				class="btn btn-primary"
				name="create">Create</button>
		<a href="read.php" class="link-primary">View</a>
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
