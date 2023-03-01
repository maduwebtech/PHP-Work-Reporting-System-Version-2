<?php include("header.php");
include("Configuration.php");
if ($role!=0){
  header("location:../404.php");
}
$sql="SELECT * FROM user_reg_tbl";
$query=mysqli_query($config,$sql);
$rows=mysqli_num_rows($query);
?>
    <div class="container">
    <div class="row m-2">
      <div class="col-md-10 m-auto mt-2 table-responsive px-5 py-2 bg-white border border-secondary">
        <?php if (isset($_SESSION['success'])) {
            $success=$_SESSION['success'];
            echo $success;
            unset($_SESSION['success']);
         }
    ?>
    <?php 
      if (!empty($error)) {
        echo "<span style='color:red;text-align:center'>$error</span>";
      }
         if (isset($_SESSION['msg'])) {
            $message=$_SESSION['msg'];
            echo "<span class='text-center'>$message</span>";
            unset($_SESSION['msg']);
         } ?>
      <h4 class="text-center mb-3">Employee List</h4>
      <a href="add_emp.php" class="btn btn-primary btn-sm">Add New</a>
      <a href="task.php" class="btn btn-primary btn-sm m-2">Assign Task</a>
      <hr>
         <table class="table table-hover bg-white table-sm">
          <thead>
            <tr>
              <th>Sr.#</th>
              <th>Employee Name</th>
              <th>Designation</th>
              <th>Scale</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($rows) {
              $count=0;
              while ($record=mysqli_fetch_assoc($query)) {
              ?>
            <tr>
              <td><?= ++$count ?></td>
              <td><?= ucwords($record['user_name']) ?></td>
              <td><?= ucfirst($record['user_des']) ?></td>
              <td><?= strtoupper($record['user_scale']) ?></td>
              <td class="d-flex">
                <span><a href="profile.php?id=<?=$record['emp_id']?>"><i class="bi bi-eye-fill text-success mx-1"></i></a></span>
                <span><a href="edit_emp.php?id=<?=$record['emp_id']?>"><i class="bi bi-pencil-square text-primary mx-1"></i></a></span>
                <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                  <input type="hidden" name="user_id" value="<?=$record['emp_id']?>">
                  <button class="p-0 border-0 bg-light" name="User_delete"><i class="bi bi-trash3-fill text-danger mx-1"></i></button>
                </form>
              </td>
            </tr>
            <?php } } else { ?>    
            <tr>
              <td colspan="5" class="text-center">No Record Found</td>
            </tr> 
          <?php } ?>
          <!-- Record Delete -->
          <?php
           if (isset($_POST['User_delete'])) {
            $id=$_POST['user_id'];
            $delete="DELETE FROM user_reg_tbl WHERE emp_id='$id'";
            $query2=mysqli_query($config,$delete);
              if ($query2) {
              $_SESSION['success']="<span class='text-success text-center'>One record has been deleted successfully</span>";
              header("location:users_list.php");
            }
          }
         ?>
          </div>
          </tbody>
        </table>
      </div>      
    </div>  
    </div>
<?php include("footer.php"); ?>