<?php include("header.php");
include("Configuration.php");
if ($role!=0){
  header("location:../404.php");
}
$emp_id=$_GET['id'];
$sql="SELECT * FROM user_reg_tbl WHERE emp_id=$emp_id";
$query=mysqli_query($config,$sql);
$result=mysqli_fetch_assoc($query);
?>
    <div class="container mt-5 mb-2">
      <div class="row m-2">
        <div class="col-md-6 m-auto emp_profile p-4 border border-secondary">
          <p class="text-center emp_name bg-white p-2">
            <strong>Section:</strong>
            <span class="text-primary"><?= ucwords($result['user_section']) ?></span>
          </p>
          <p class="text-center bg-white p-3">
            <span class="emp_name"><?= ucwords($result['user_name']) ?></span><br>
            <span>(<?= ucfirst($result['user_des']) ?></span>
            <span><?= strtoupper($result['user_scale']) ?>)</span>
          </p>
          <div class="bg-white p-3">
            <strong>Job Responsibilities</strong>
            <ul>
              <li><?= ucfirst($result['user_res']) ?></li>
            </ul>
          </div>
          <div class="mt-2">
            <a href="users_list.php" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </div>
    </div>
<?php include("footer.php"); ?>