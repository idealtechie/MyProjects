<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if(isset($_POST['submit']))
{
$block=$_POST['bl'];
$roomno=$_POST['ro'];
$date=$_POST['dt'];
$subjectCode=$_POST['sc'];
$total=$_POST['to'];
$present=$_POST['pr'];
$absent=$_POST['ab'];
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];

$query="insert into  registration(block,roomno,date,subjectCode,total,present,absent,regno,firstName,middleName,lastName,gender,contactno,emailid) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('iissiiiissssis',$block,$roomno,$date,$subjectCode,$total,$present,$absent,$regno,$fname,$mname,$lname,$gender,$contactno,$emailid);
$stmt->execute();
echo"<script>alert('Attendance Succssfully Submitted');</script>";
}
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Student Attendance Management</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

</head>
<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Attendance Submission </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">Fill all Info</div>
									<div class="panel-body">
										<form method="post" action="" class="form-horizontal">
							
							
<div class="form-group">
<label class="col-sm-4 control-label"><h4 style="color: green" align="left">Attendance Details </h4> </label>
</div>


											
<div class="form-group">
<label class="col-sm-2 control-label">Block</label>
<div class="col-sm-8">
<input type="text" name="bl" id="bl"  class="form-control"  >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Room</label>
<div class="col-sm-8">
<input type="text" name="ro" id="ro"  class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Date</label>
<div class="col-sm-8">
<input type="date" name="dt" id="dt"  class="form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Subject Code</label>
<div class="col-sm-8">
<input type="text" name="sc" id="sc"  class="form-control" >
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label">Total</label>
<div class="col-sm-8">
<input type="text" name="to" id="to"  class="result form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Present</label>
<div class="col-sm-8">
<input type="text" name="pr" id="pr"  class="result form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Absent</label>
<div class="col-sm-8">
<input type="text" name="ab" id="ab"  class="result form-control" >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label"><h4 style="color: green" align="left">Faculty info </h4> </label>
</div>



<?php	
$aid=$_SESSION['id'];
	$ret="select * from userregistration where id=?";
		$stmt= $mysqli->prepare($ret) ;
	 $stmt->bind_param('i',$aid);
	 $stmt->execute() ;//ok
	 $res=$stmt->get_result();
	 //$cnt=1;
	   while($row=$res->fetch_object())
	  {
	  	?>

<div class="form-group">
<label class="col-sm-2 control-label">Registration No : </label>
<div class="col-sm-8">
<input type="text" name="regno" id="regno"  class="form-control" value="<?php echo $row->regNo;?>" readonly >
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">First Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $row->firstName;?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Middle Name : </label>
<div class="col-sm-8">
<input type="text" name="mname" id="mname"  class="form-control" value="<?php echo $row->middleName;?>"  readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Last Name : </label>
<div class="col-sm-8">
<input type="text" name="lname" id="lname"  class="form-control" value="<?php echo $row->lastName;?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<input type="text" name="gender" value="<?php echo $row->gender;?>" class="form-control" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact" value="<?php echo $row->contactNo;?>"  class="form-control" readonly>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id : </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $row->email;?>"  readonly>
</div>
</div>
<?php } ?>




<div class="col-sm-6 col-sm-offset-4">
<button class="btn btn-default" type="submit">Cancel</button>
<input type="submit" name="submit" Value="Submit" class="btn btn-primary">
</div>
</form>

									</div>
									</div>
								</div>
							</div>
						</div>
							</div>
						</div>
					</div>
				</div> 	
			</div>
		</div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>

</html>