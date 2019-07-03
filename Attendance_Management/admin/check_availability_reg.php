<?php
require_once("includes/config.php");
if(!empty($_POST["regNo"])) {
	$regNo= $_POST["regNo"];
	
		$result ="SELECT count(*) FROM userregistration WHERE regNo=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('s',$regNo);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo "<span style='color:red'> Reg No. already taken .</span>";
}
else{
	echo "<span style='color:green'> Reg No. available for registration .</span>";
}
}


?>