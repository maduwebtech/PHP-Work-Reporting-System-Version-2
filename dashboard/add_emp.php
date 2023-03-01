<?php include("header.php");
include("Configuration.php");
if ($role!=0){
  header("location:../404.php");
}
?>
    <div class="container mt-2">
      <form action="" method="POST">
      <div class="row m-2 p-3 register_form border border-secondary">
      <?php 
      if (isset($_SESSION['error'])) {
        $error=$_SESSION['error'];
        echo "<span style='color:red;text-align:center'>$error</span>";
        unset($_SESSION['error']);
      }
         if (isset($_SESSION['msg'])) {
            $message=$_SESSION['msg'];
            echo "<span class='text-center'>$message</span>";
            unset($_SESSION['msg']);
         } ?>        
        <h5 class="text-center">Employee Registration Form</h5>
        <div class="col-md-5 m-auto">
            <div class="mb-2">
              <label>Fullname</label>
              <input type="text" name="user_name" placeholder="Fullname" class="form-control" required maxlength="30" minlength="3">
            </div>
            <div class="mb-2">
              <label>Designation</label>
              <input type="text" name="user_des" placeholder="Designation" class="form-control" required maxlength="30" minlength="3">
            </div>
            <div class="mb-2">
              <label>Section</label>
              <select class="form-control required" name="user_section">
                <option value="">Select Section</option>
                <option value="DIT">DIT</option>
                <option value="CBS Muzaffarabad">CBS Muzaffarabad</option>
                <option value="CBS Rawalakot">CBS Rawalakot</option>
                <option value="CBS Mirpur">CBS Mirpur</option>
                <option value="CBS Kotli">CBS Kotli</option>
              </select>
            </div>
            <div class="mb-2">
              <label>Responsibilities</label>
              <textarea class="form-control" rows="3" name="user_res" maxlength="300" minlength="10"></textarea>
            </div>
        </div>
        <div class="col-md-5 m-auto">
          <div class="mb-2">
              <label>Scale</label>
              <select class="form-control required" name="user_scale">
                <option value="">Select Scale</option>
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
              <input type="text" name="user_id" class="form-control" maxlength="30" minlength="4">
            </div>
            <div class="mb-2">
              <label>Password</label>
              <input type="password" name="user_pass" class="form-control" maxlength="100" minlength="4">
            </div>
            <div class="mb-2">
              <label>User Role</label>
              <select required name="user_role" class="form-control">
                <option value="">Select Role</option>
                <option value="1">Normal User</option>
                <option value="0">Admin</option>
              </select>
            </div>
            <div class="mb-2">
              <button class="btn btn-primary" name="add_emp">Register</button>
              <a  href="users_list.php" class="btn btn-secondary">Back</a>
            </div>
        </div>        
      </div>
    </form>
    </div>
<?php include("footer.php");
if (isset($_POST['add_emp'])) {
  $u_name=mysqli_real_escape_string($config,$_POST['user_name']);
  $u_des=mysqli_real_escape_string($config,$_POST['user_des']);
  $u_sec=mysqli_real_escape_string($config,$_POST['user_section']);
  $u_res=mysqli_real_escape_string($config,$_POST['user_res']);
  $u_scale=mysqli_real_escape_string($config,$_POST['user_scale']);
  $u_id=mysqli_real_escape_string($config,$_POST['user_id']);
  $u_pass=mysqli_real_escape_string($config,sha1($_POST['user_pass']));
  $u_role=mysqli_real_escape_string($config,$_POST['user_role']);
  if (strlen($u_name) < 4 || strlen($u_name) > 100) {
    $_SESSION['error']="Username must be between 3 to 30 char";
    header("location:add_emp.php");
  }
  elseif (strlen($u_pass) < 4) {
    $_SESSION['error']="Password must be 4 Char long";
    header("location:add_emp.php");
  }
  else
  {
    $sql="SELECT * FROM user_reg_tbl WHERE user_id='$u_id'";
    $query=mysqli_query($config,$sql);
    $row=mysqli_num_rows($query);
    if ($row >= 1)
    {
      $_SESSION['error']="User ID already exist";
      header("location:add_emp.php");
    }
    else
    {
      $sql2="INSERT INTO user_reg_tbl(user_name,user_des,user_section,user_res,user_scale,user_id,user_pass,user_role) VALUES('$u_name','$u_des','$u_sec','$u_res','$u_scale','$u_id','$u_pass','$u_role')";
      $query2=mysqli_query($config,$sql2);
      if($query2)
      {
        $_SESSION['msg']="<span class='text-success'>User has been added successfully</span>";
        header("location:add_emp.php");
      }
      else
      {
        $error="Failed,please try again";
      }
    }
  }
}  
?>