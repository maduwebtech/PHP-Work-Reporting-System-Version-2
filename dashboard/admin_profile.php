<?php include("header.php");
include("Configuration.php");
if ($role!=0){
  header("location:../404.php");
}
if (isset($_SESSION['user_data'])) {
  $userdata=$_SESSION['user_data'];
}
?>
    <div class="container mt-5 mb-2">
      <div class="row m-2">
        <div class="col-md-7 m-auto emp_profile p-4 border border-secondary">
          <p class="text-center bg-white p-3">
            <span class="emp_name"><?= ucwords($userdata[0]) ?></span><br>
            <span>(<?= ucwords($userdata[1]) ?></span>
            <span><?= strtoupper($userdata[5]) ?>)</span>
          </p>
          <div class="bg-white p-3">
            <?php 
            if (isset($_SESSION['report_msg'])) {
              $message2=$_SESSION['report_msg'];
              echo $message2;
              unset($_SESSION['report_msg']);
            }
            ?>
            <form action="report_gen.php" method="POST">
              <label><strong>Daily Task Report</strong></label>
              <input type="date" name="work_date" class="form-control" required>
              <button name="report_btn" class="btn btn-primary btn-sm mt-2">Completed Task</button>
              <button name="report_btn2" class="btn btn-primary btn-sm mt-2">Assigned Task</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php include ('footer.php');?>