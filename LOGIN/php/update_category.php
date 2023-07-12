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

	$sql = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read_category.php");
    }


}else if(isset($_POST['update_category'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$nom = validate($_POST['name']);
        $description = validate($_POST['description']);
        $id = validate($_POST['id']);

	if (empty($nom)) {
		header("Location: ../update_category.php?id=$id&error=Name is required");
	}else if (empty($description)) {
		header("Location: ../update_category.php?id=$id&error=Description is required");
	
	}else {

       $sql = "UPDATE categories
               SET name='$nom', description='$description'
               WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read_category.php?success=successfully updated");
       }else {
          header("Location: ../update_category.php?id=$id&error=unknown error occurred&$user_data");
       }
	}
}else {
	header("Location: read_category.php");
}