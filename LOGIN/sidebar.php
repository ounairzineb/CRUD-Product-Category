<div class="sidebar">
  <ul class="sidebar-menu">
    <li><a href="index.php">Products</a></li>
    <li><a href="index2.php">Categories</a></li>
    <?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { ?>
      <li class="logout"><a href="logout.php">Logout</a></li>
    <?php } ?>
  </ul>
</div>



<style>
.sidebar {
  background-color: #f5f5f5;
  width: 200px;
  height: 100vh;
  position: fixed;
  left: 0;
  top: 0;
}

.sidebar-menu {
  list-style-type: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  height: 100%;
}

.sidebar-menu li {
  padding: 10px;
  text-align: center;
}

.sidebar-menu li a {
  display: block;
  text-decoration: none;
  color: #fff;
}

.sidebar-menu li a:hover {
  background-color: #ee6b61;
  color: #fff;
  font-weight: bold;
}

.sidebar-menu .logout {
  margin-top: auto;
}

</style>
