<?php
    session_start(); 
    
	$patientid = $_SESSION['var']; 
	 
	$clump = $_POST['clump'];
	$unifsize = $_POST['unifsize'];
	$unifshape = $_POST['unifshape'];
	$margadh = $_POST['margadh'];
    $singepisize = $_POST['singepisize'];
    $barenuc = $_POST['barenuc'];
    $BlandChrom = $_POST['BlandChrom'];
    $NormNucl = $_POST['NormNucl'];
    $Mit = $_POST['Mit'];
    

	// Database connection
	$conn = new mysqli('localhost','root','','test2');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into symptoms(patientid,clump, unifsize, unifshape,margadh,singepisize,barenuc,BlandChrom,NormNucl,Mit) values(?, ?,?, ?,?,?,?,?,?,?)");
		$stmt->bind_param("iiiiiiiiii", $patientid, $clump, $unifsize,$unifshape,  $margadh,$singepisize,$barenuc,$BlandChrom,$NormNucl,$Mit);
		$execval = $stmt->execute();
		
		$stmt->close();
		$conn->close();
	}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Using single SQL</title>
<style>
table,td,th
{
 padding:10px;
 border-collapse:collapse;
 font-family:Georgia, "Times New Roman", Times, serif;
 border:solid #ddd 2px;
}
</style>
</head>
<body>
<table align="center" border="1" width="100%">
<tr>
<th>patient id</th>

<th>result</th>
</tr>
<?php
$dbhandle=mysqli_connect("localhost","root");
mysqli_select_db($dbhandle,"test2");
$res=mysqli_query($dbhandle,"SELECT * from result where patient_id='".$patientid."'");


while($row=mysqli_fetch_assoc($res))
{
 ?>
    <tr>
    <td><p><?php echo $row['patient_id']; ?></p></td>
   
    <td><p><?php echo $row['result']; ?></p></td>
    </tr>
    <?php
}
?>
</table>
</body>
</html>


