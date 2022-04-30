<?php include "header.php"; 
if($_SESSION['role'] == '0'){
  header("Location: {$hostname}/admin/post.php");
}
 include "config.php";

if(isset($_POST['sumbit'])){

$category_id =mysqli_real_escape_string($conn,$_POST['cat_id']);
$category_name = mysqli_real_escape_string($conn,$_POST['cat_name']);
$post = mysqli_real_escape_string($conn,$_POST['post']);

$sql = " UPDATE category SET category_name = '{$category_name}' WHERE category_id = '{$category_id}' ";

$result = mysqli_query($conn,$sql) or die ("update query is failed");

 if($result){
    header("Location: {$hostname}/admin/category.php");
  }

}

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <?php
                   
                  $category_idu = $_GET['idc'] or die ("NOT work id" . mysqli_connect_error(0));

                  $sqlu = "SELECT * FROM category WHERE category_id = '{$category_idu}'";
          
                  $resultu = mysqli_query($conn,$sqlu) or die ($_GET['idc']);
                 

                  if(mysqli_num_rows($resultu) > 0){
                         while($row = mysqli_fetch_assoc($resultu)){
                  ?>
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id']; ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name']; ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                  <?php
                         }

                        }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
