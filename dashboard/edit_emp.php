<?php include("header.php");
include("Configuration.php");
if ($role!=0){
  header("location:../404.php");
}
$emp_id=$_GET['id'];
if (empty($emp_id)) {
  header("location:users_list.php");
}
$sql="SELECT * FROM user_reg_tbl WHERE emp_id='$emp_id'";
$query=mysqli_query($config,$sql);
$row=mysqli_fetch_assoc($query);
if (isset($_POST['update_emp'])) {
  $u_name=mysqli_real_escape_string($config,$_POST['user_name']);
  $u_des=mysqli_real_escape_string($config,$_POST['user_des']);
  $u_sec=mysqli_real_escape_string($config,$_POST['user_section']);
  $u_res=mysqli_real_escape_string($config,$_POST['user_res']);
  $u_scale=mysqli_real_escape_string($config,$_POST['user_scale']);
  $u_role=mysqli_real_escape_string($config,$_POST['user_role']);
  if (strlen($u_name) < 4 || strlen($u_name) > 100) {
    $error="<span class='text-danger'>Username must be between 4 to 100 char";
  }
  else
  {
      $sql2="UPDATE user_reg_tbl SET user_name='$u_name',user_des='$u_des',user_section='$u_sec',user_res='$u_res',user_scale='$u_scale',user_role='$u_role' WHERE emp_id='$emp_id'";
      $query2=mysqli_query($config,$sql2);
      if($query2)
      {
        $_SESSION['msg']="<span class='text-success text-center'>One record has been updated successfully</span>";
        header("location:edit_emp.php");
      }
      else
      {
        $error="<span class='text-danger'>Failed,please try again</span>";
      }
    }
  } 
?>
    <div class="container mt-2">
      <form action="" method="POST">
      <div class="row m-2 p-4 register_form border border-secondary">        
        <h5 class="text-center">Edit Employee Information</h5>
        <div class="col-md-5 m-auto">
            <div class="mb-2">
              <label>Fullname</label>
              <input type="text" name="user_name" placeholder="Fullname" class="form-control" required value="<?= $row['user_name'] ?>" maxlength="30" minlength="3">
            </div>
            <div class="mb-2">
              <label>Designation</label>
              <input type="text" name="user_des" placeholder="Designation" class="form-control" required value="<?= $row['user_des'] ?>" maxlength="30" minlength="3">
            </div>
            <div class="mb-2">
              <label>Section</label>
              <select class="form-control required" name="user_section">
                <option value="<?= $row['user_section'] ?>" selected><?= $row['user_section'] ?></option>
                <option value="DIT">DIT</option>
                <option value="CBS Muzaffarabad">CBS Muzaffarabad</option>
                <option value="CBS Rawalakot">CBS Rawalakot</option>
                <option value="CBS Mirpur">CBS Mirpur</option>
                <option value="CBS Kotli">CBS Kotli</option>
              </select>
            </div>
            <div class="mb-2">
              <label>Responsibilities</label>
              <textarea class="form-control" rows="3" name="user_res" maxlength="300" minlength="10"><?= $row['user_res'] ?>
              </textarea>
            </div>
        </div>
        <div class="col-md-5 m-auto">
          <div class="mb-2">
              <label>Scale</label>
              <select class="form-control required" name="user_scale">
                <option value="<?= $row['user_scale'] ?>" selected><?= $row['user_scale'] ?></option>
                <option value="BPS-09">BPS-09</option>
                <option value="BPS-10">BPS-10</option>
                <option value="BPS-11">BPS-11</option>
                <option value="BPS-12">BPS-12</option>
                <option value="BPS-13">BPS-13</option>
                <option value="BPS-14">BPS-14</option>
                <option value="BPS-15">BPS-15</option>
                <option value="BPS-16">BPS-16</option>
                <option value="BPS-17">BPS-17</option>
                <option value="BPS-18">BPS-18</option>
                <option value="BPS-19">BPS-19</option>
                <option value="BPS-20">BPS-20</option>
              </select>
            </div>
            <div class="mb-2">
              <label>User ID</label>
              <input disabled type="text" name="user_id" class="form-control" value="<?= $row['user_id'] ?>" maxlength="30" minlength="4">
            </div>
            <div class="mb-2">
              <label>Password</label>
              <input disabled type="password" name="user_pass" class="form-control" value=""      >
            </div>
            <div class="mb-2">
              <label>User Role</label>
              <select required name="user_role" class="form-control">
                <option selected value="<?= $row['user_role'] ?>"><?php if ($row['user_role']==0) {
                  echo "Admin";
                } 
                else
                {
                  echo "Normal User";
                }
              ?></option>
                <option value="1">Normal User</option>
                <option value="0">Admin</option>
              </select>
            </div>
            <div class="mb-2">
              <button class="btn btn-primary" name="update_emp">Update</button>
              <a  href="users_list.php" class="btn btn-secondary">Back</a>
            </div>
        </div>        
      </div>
    </form>
    </div>
<?php include("footer.php");?>