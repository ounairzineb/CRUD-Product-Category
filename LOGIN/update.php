<?php include 'php/update.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
        <form action="php/update.php" method="post">

           <h4 class="display-4 text-center">Update</h4><hr><br>
           <?php if (isset($_GET['error'])) { ?>
           <div class="alert alert-danger" role="alert">
              <?php echo $_GET['error']; ?>
            </div>
           <?php } ?>

           <?php
           // Include the database connection
           include "db_conn.php";

           // Fetch the row using a query
           $id = $_GET['id']; // Assuming you are passing the 'id' through the URL
           $query = "SELECT * FROM produits WHERE id = '$id'";
           $result = mysqli_query($conn, $query);

           // Check if the query was successful
           if ($result && mysqli_num_rows($result) > 0) {
               $row = mysqli_fetch_assoc($result);
           } else {
               // Handle the case when the row is not found
               echo "Row not found!";
               exit();
           }
           ?>

           <div class="form-group">
             <label for="nom">Nom</label>
             <input type="text" 
                   class="form-control" 
                   id="nom" 
                   name="nom" 
                   value="<?= $row['nom'] ?? '' ?>" >
           </div>

           <div class="form-group">
             <label for="contact">Montant</label>
             <input type="text" 
                   class="form-control" 
                   id="montant" 
                   name="montant" 
                   value="<?= $row['montant'] ?? '' ?>" >
           </div>

           <div class="form-group">
             <label for="categorie">Categorie</label>
             <select class="form-control" id="categorie" name="categorie">
               <?php
                 // Query to retrieve the categories
                 $query = "SELECT * FROM categories";
                 $result = mysqli_query($conn, $query);

                 // Loop through the categories and create the options
                 while ($categoryRow = mysqli_fetch_assoc($result)) {
                   $id = $categoryRow['id'];
                   $name = $categoryRow['name'];
                   $selected = ($name == $row['categorie']) ? "selected" : "";
                   echo "<option value='$name' $selected>$name</option>";
                 }
               ?>
             </select>
           </div>

           <div class="form-group">
             <label for="contact">Description</label>
             <textarea class="form-control" 
                       id="description" 
                       name="description"><?= $row['description'] ?? '' ?></textarea>
           </div>
           
           <input type="text" 
                  name="id"
                  value="<?= $row['id'] ?? '' ?>"
                  hidden >

           <button type="submit" 
                   class="btn btn-primary"
                   name="update">Update</button>
            <a href="read.php" class="link-primary">View</a>

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
