<?php include("header.php");
include("Configuration.php");
if ($role!=1){
  header("location:../404.php");
}
if (isset($_SESSION['user_data'])) {
  $userdata=$_SESSION['user_data'];
}
// fetch current and future tasks
$sql3="SELECT * FROM task_tbl WHERE emp_id=$userdata[4] AND task_date>=CURDATE()";
$query3=mysqli_query($config,$sql3);
$rows3=mysqli_num_rows($query3);
?>
    <div class="container mt-2 mb-2">
      <div class="row m-2">
        <div class="col-md-8 m-auto emp_profile p-4 border border-secondary rounded-1">
          <p class="text-center bg-white px-3 py-2 mb-0 border border-info">
            <span class="emp_name"><?= ucwords($userdata[0]) ?></span><br>
            <span>(<?= ucwords($userdata[1]) ?></span>
            <span><?= strtoupper($userdata[5]) ?>)</span>
          </p>
          <div class="bg-white px-3 pt-2 tasks">
            <strong>Duties and Responsibilities</strong>
            <ul class="pb-2 mb-0">
              <?php if ($rows3) {
                while ($task=mysqli_fetch_assoc($query3)) {
                  $taskDate=date('d-m-Y',strtotime($task['task_date']));
                  ?>
              <li><small><span class="text-danger"><?= $taskDate ?>: </span><i> <?= ucfirst($task['task_des']) ?></i></small></li>
            <?php }}else { ?>
              <li><small><?=$userdata[2]?></small></li>
            <?php } ?>
            </ul>
          </div>
          <div class="bg-white p-3 border border-info">
            <?php
            if (isset($_SESSION['work_desc'])) {
              $message1=$_SESSION['work_desc'];
              echo $message1;
              unset($_SESSION['work_desc']);
            }
            ?>
            <form method="POST">
              <label><strong>Daily Work</strong></label>
              <textarea required="required" class="form-control" rows="4" name="work_desc" maxlength="500" minlength="10" placeholder="Type..."></textarea>
              <button name="work_btn" class="btn btn-primary mt-2 btn-sm">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php include("footer.php"); 
if (isset($_POST['work_btn'])) {
  $employee_id=$userdata['4'];
  date_default_timezone_set("Asia/Karachi");
  $work_date=date('Y-m-d',time());
  $work_desc=mysqli_real_escape_string($config,$_POST['work_desc']);
  $sql="SELECT * FROM work_tbl WHERE employee_id='$employee_id' AND work_date='$work_date'";
  $query=mysqli_query($config,$sql);
  $rows=mysqli_num_rows($query);
  if ($rows) 
    {
      $_SESSION['work_desc']="<small class='text-danger'>You can not submit work again in same date</small>";
      header("location:emp_profile.php");
    }
  else
  {
    $sql2="INSERT INTO work_tbl (employee_id,work_date,work_desc) VALUES('$employee_id','$work_date','$work_desc')";
    $query2=mysqli_query($config,$sql2);
    if ($query2) 
    {
      $_SESSION['work_desc']="<small class='text-success'>Daily Work Submitted Successfully</small>";
      header("location:emp_profile.php");
    }
  }
}
?>