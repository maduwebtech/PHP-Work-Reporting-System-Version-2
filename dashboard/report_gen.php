<?php
include("Configuration.php");
session_start();
if (!isset($_SESSION['user_data'])) {
  header("location:../index.php");
}
if (isset($_SESSION['user_data'])) {
  $userdata=$_SESSION['user_data'];
  $role=$userdata['3'];
  if ($role!=0) {
    header("location:emp_profile.php");
  }
}
$count=0;
if (isset($_POST["report_btn"])) {
  $work_date=mysqli_real_escape_string($config,$_POST["work_date"]);
  $w_date=date('d-m-Y',strtotime($work_date));
  $sql="SELECT * FROM work_tbl LEFT JOIN user_reg_tbl ON work_tbl.employee_id=user_reg_tbl.emp_id WHERE work_tbl.work_date='$work_date'";
  $query3=mysqli_query($config,$sql);
  $rows=mysqli_num_rows($query3);
  if ($rows) 
  	{
  		
      $html = '<html><body style="font-family: Verdana"><br>';
      $html .= '<table align="center" width="100%" border="1" cellpadding="5" cellspacing="0"><thead><tr><th>Sr.#</th>
      <th>Employee Name</th>
      <th>Designation</th>
      <th>Scale</th>
      <th>Work Date</th>
      <th colspan="3">Daily Work Activities</th>
      </tr>
      </thead><tbody>';
      $count=0;
      while ($rows = mysqli_fetch_array($query3)) {
      $html .= '
      <tr>
      <td align="center">'.++$count.'</td>
      <td>'. ucwords($rows['user_name']).'</td>
      <td>'. ucwords($rows['user_des']) .'</td>
      <td align="center">'. $rows['user_scale'].'</td>
      <td align="center">'.$w_date.'</td>
      <td colspan="3">'.ucfirst($rows['work_desc']).'</td>
      </tr>';    
    }     
    $html .= '</tbody></table></body></html>';
      require_once __DIR__ . '/vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
      $mpdf->SetHTMLHeader('<div style="text-align: center; font-weight: bold;"><h3>Daily Work Report of AJKED IT Employees</h3>
        </div>');      
      $mpdf->WriteHTML($html);
      $mpdf->SetHTMLFooter('
        <table width="100%">
        <tr>
          <td width="33%">{DATE j-m-Y}</td>
          <td width="33%" align="center">{PAGENO}/{nbpg}</td>
          <td width="33%" style="text-align: right;">Web Generated Report</td>
        </tr>
        </table>');
      $file_name = 'work_report.pdf';
      $mpdf->Output($file_name,'I');
    }
  else
  {
    $_SESSION["report_msg"]="<span class='text-danger'><small>No Work Found in your selected date</small></span>";
    header("location:admin_profile.php");
  }
}
if (isset($_POST["report_btn2"])) {
  $task_date=mysqli_real_escape_string($config,$_POST["work_date"]);
  $w_date=date('d-m-Y',strtotime($task_date));
  $sql2="SELECT * FROM task_tbl LEFT JOIN user_reg_tbl ON task_tbl.emp_id=user_reg_tbl.emp_id WHERE task_tbl.task_date='$task_date'";
  $query2=mysqli_query($config,$sql2);
  $rows=mysqli_num_rows($query2);
  if ($rows) 
    {
      
      $html = '<html><body style="font-family: Verdana"><br>';
      $html .= '<table align="center" width="100%" border="1" cellpadding="5" cellspacing="0"><thead><tr><th>Sr.#</th>
      <th>Employee Name</th>
      <th>Designation</th>
      <th>Scale</th>
      <th>Work Date</th>
      <th colspan="3">Assigned Task</th>
      </tr>
      </thead><tbody>';
      $count=0;
      while ($rows = mysqli_fetch_array($query2)) {
      $html .= '
      <tr>
      <td align="center">'.++$count.'</td>
      <td>'. ucwords($rows['user_name']).'</td>
      <td>'. ucwords($rows['user_des']) .'</td>
      <td align="center">'. $rows['user_scale'].'</td>
      <td align="center">'.$w_date.'</td>
      <td colspan="3">'.ucfirst($rows['task_des']).'</td>
      </tr>';    
    }     
    $html .= '</tbody></table></body></html>';
      require_once __DIR__ . '/vendor/autoload.php';
      $mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
      $mpdf->SetHTMLHeader('<div style="text-align: center; font-weight: bold;"><h3>Daily Work Assigned Report of AJKED IT Employees</h3>
        </div>');      
      $mpdf->WriteHTML($html);
      $mpdf->SetHTMLFooter('
        <table width="100%">
        <tr>
          <td width="33%">{DATE j-m-Y}</td>
          <td width="33%" align="center">{PAGENO}/{nbpg}</td>
          <td width="33%" style="text-align: right;">Web Generated Report</td>
        </tr>
        </table>');
      $file_name = 'work_report.pdf';
      $mpdf->Output($file_name,'I');
    }
  else
  {
    $_SESSION["report_msg"]="<span class='text-danger'><small>No Work Found in your selected date</small></span>";
    header("location:admin_profile.php");
  }
}?>