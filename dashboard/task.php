<?php include("header.php");
include("Configuration.php");
if ($role!=0){
  header("location:../404.php");
}
$sql="SELECT * FROM user_reg_tbl WHERE user_scale!='BPS-20' AND user_scale!='BPS-19' AND user_scale!='BPS-18' AND user_scale!='BPS-17'";
$query=mysqli_query($config,$sql);
?>
<div class="container mt-2">
  <form action="" method="POST">
  <div class="row m-2">
    <div class="col-md-8 m-auto task_form px-4 py-3 border border-secondary">
      <?php 
       if (isset($_SESSION['msg'])) {
         $msg=$_SESSION['msg'];
         echo $msg;
         unset($_SESSION['msg']);
       }
      ?>
      <p class="text-center"><strong>Assign Task</strong></p>
      <div class="mb-2">
        <label>Employee</label>
        <select class="form-control required" name="emp_id">
          <option value="">Select Employee</option>
          <?php while ($rows=mysqli_fetch_assoc($query)) {?>
          <option value="<?= $rows['emp_id'] ?>"><?= $rows['user_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-2">
        <label>Select Date</label>
        <input type="date" name="task_date" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Task</label>
        <textarea class="form-control" required name="task_des" rows="3" minlength="10" placeholder="Type..."></textarea>
      </div>
      <div class="mb-2">
        <button class="btn btn-primary btn-sm" name="task_btn">Assign Task</button>
        <a href="users_list.php" class="btn btn-secondary btn-sm">Back</a>
      </div>
    </div>
  </div>
  </form>
</div>
<?php include("footer.php");
if (isset($_POST['task_btn'])) {
  $emp_id=mysqli_real_escape_string($config,$_POST['emp_id']);
  $task_date=mysqli_real_escape_string($config,$_POST['task_date']);
  $task_des=mysqli_real_escape_string($config,$_POST['task_des']);
  $check="SELECT * FROM task_tbl WHERE emp_id='$emp_id' AND task_date='$task_date'";
  $run=mysqli_query($config,$check);
  $checkRow=mysqli_num_rows($run);
  if ($checkRow) {
    $_SESSION['msg']="<small class='text-danger text-center'>Task Already assigned in selected date</small>";
    header("location:task.php");
  }
  else{
  $sql2="INSERT INTO task_tbl (emp_id,task_date,task_des) VALUES('$emp_id','$task_date','$task_des')";
  $query2=mysqli_query($config,$sql2);
  if ($query2) {
    $_SESSION['msg']="<small class='text-success text-center'>Task Assigned Successfully</small>";
    header("location:task.php");
  }
  else
  {
    $_SESSION['msg']="<small class='text-danger text-center'>Failed, please try again</small>";
    header("location:task.php");
  }
}}
?>