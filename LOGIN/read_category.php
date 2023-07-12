<?php include "php/read_category.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
</head>
<body>
	<style>
		.box {
	width: 1300px;
	position: absolute;
    left: 120px;

}
		</style>
	<div class="container">
		<div class="box">
			<h4 class="display-4 text-center">Liste des catégories</h4><br>
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nom</th>
				  <th scope="col">Description</th>
				  
				  
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			      <th scope="row"><?=$i?></th>
			      <td><?=$rows['name']?></td>
			      
				  
				  <td><?php echo $rows['description']; ?></td>
				  
			      <td><a href="update_category.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-success">Update</a>

			      	  <a href="php/delete_category.php?id=<?=$rows['id']?>" 
						onclick="return confirm('Voulez-vous supprimer cette catégorie de façon permanente?')" href="delete_category.php" class='btn btn-danger' >Delete</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			<div class="link-right">
				<a href="index2.php" class="link-primary">Create</a>
			</div>
		</div>
	</div>
</body>
</html>