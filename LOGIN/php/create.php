<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$nom = validate($_POST['nom']);
	$montant = validate($_POST['montant']);
	$categorie = validate($_POST['categorie']);
	$description = validate($_POST['description']);
	

	$user_data = 'nom='.$nom. 'montant='.$montant. '&categorie='.$categorie. '&description='.$description;

	if (empty($nom)) {
		header("Location: ../index.php?error=Name is required&$user_data");
	}else if (empty($montant)) {
		header("Location: ../index.php?error=Price is required&$user_data");
	}
		else if (empty($categorie)) {
			header("Location: ../index.php?error=Category is required&$user_data");
		}
			else if (empty($description)) {
				header("Location: ../index.php?error=Description is required&$user_data");
			

	}else {

       $sql = "INSERT INTO produits(nom, montant, categorie, description) 
               VALUES('$nom', '$montant', '$categorie', '$description')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully created");
       }else {
          header("Location: ../index.php?error=unknown error occurred&$user_data");
       }
	}

}