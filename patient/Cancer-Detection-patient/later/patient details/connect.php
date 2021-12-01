<?php
    session_start(); 
	$patientid = $_POST['patientid']; 
	$doc_id=$_POST['doc_id']; 
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
	$conn = new mysqli('localhost','root','','signup');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into symptoms(patientid,doc_id,clump, unifsize, unifshape,margadh,singepisize,barenuc,BlandChrom,NormNucl,Mit) values(?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("iiiiiiiiiii", $patientid,$doc_id,$clump, $unifsize,$unifshape,  $margadh,$singepisize,$barenuc,$BlandChrom,$NormNucl,$Mit);
		$execval = $stmt->execute();
		
		$stmt->close();
		$conn->close();
	}
?>
