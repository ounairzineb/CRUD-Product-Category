<?php 

if (isset($_GET['id'])) {
	include "db_conn.php";

	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM produits WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
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
        $id = validate($_POST['id']);

	if (empty($nom)) {
		header("Location: ../update.php?id=$id&error=Name is required");
	}else if (empty($montant)) {
		header("Location: ../update.php?id=$id&error=Price is required");
	}else if (empty($categorie)) {
		header("Location: ../update.php?id=$id&error=Category is required");
	}else if (empty($description)) {
		header("Location: ../update.php?id=$id&error=Description is required");
	
	}else {

       $sql = "UPDATE produits
               SET nom='$nom', montant='$montant', categorie='$categorie', description='$description'
               WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully updated");
       }else {
          header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
       }
	}
}else {
	header("Location: read.php");
}