<?php 

if (isset($_POST['create'])) {
	include "../db_conn.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$nom = validate($_POST['name']);
	$description = validate($_POST['description']);
	

	$user_data = 'name='.$nom. '&description='.$description;

	if (empty($nom)) {
		header("Location: ../index2.php?error=Name is required&$user_data");
	}
			else if (empty($description)) {
				header("Location: ../index2.php?error=Description is required&$user_data");
			

	}else {

       $sql = "INSERT INTO categories(name, description) 
               VALUES('$nom', '$description')";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read_category.php?success=successfully created");
       }else {
          header("Location: ../index2.php?error=unknown error occurred&$user_data");
       }
	}

}