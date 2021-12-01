<?php
    session_start(); 
 
  $username = $_SESSION["username"];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$number = $_POST['number'];
 
	// Database connection
	$conn = new mysqli('localhost','root','','test2');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(DoctorName,firstName, lastName, gender, email,number) values(?, ?,?, ?, ?,?)");
		$stmt->bind_param("sssssi",$username, $firstName, $lastName, $gender, $email,  $number);
       
		$execval = $stmt->execute();
		  
        $patientid = $stmt->insert_id;
        $_SESSION['var']=$patientid;
        
      
        

	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Patient details</title>
    <link rel="stylesheet" type="text/css" href="later/patient details/css/bootstrap.css" />
  </head>
  <body style="background-image: url('bg.jpg');">
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Please Enter Patients Details</h1>
          </div>
          <div class="panel-body">
            <form action="connect2.php" method="post">
              <div class="form-group">
                <label for="patientid">Patient Id

                </label>
              <?php
               echo $patientid;
               
              ?>
              </div>
             
              <div class="form-group">
                <label for="clump">clump</label>
                <input
                  type="text"
                  class="form-control"
                  id="clump"
                  name="clump"
                />
              </div>
              
              <div class="form-group">
                <label for="unifsize">unifsize</label>
                <input
                  type="text"
                  class="form-control"
                  id="unifsize"
                  name="unifsize"
                />
              </div>
             
              <div class="form-group">
                <label for="unifshape">unifshape</label>
                <input
                  type="number"
                  class="form-control"
                  id="unifshape"
                  name="unifshape"
                />
              </div>
              <div class="form-group">
                <label for="margadh">margadh</label>
                <input
                  type="number"
                  class="form-control"
                  id="margadh"
                  name="margadh"
                />
              </div>
              <div class="form-group">
                <label for="singepisize">singepisize</label>
                <input
                  type="number"
                  class="form-control"
                  id="singepisize"
                  name="singepisize"
                />
              </div>
              <div class="form-group">
                <label for="barenuc">barenuc</label>
                <input
                  type="number"
                  class="form-control"
                  id="barenuc"
                  name="barenuc"
                />
                </div>
                <div class="form-group">
                    <label for="BlandChrom">BlandChrom</label>
                    <input
                      type="number"
                      class="form-control"
                      id="BlandChrom"
                      name="BlandChrom"
                    />
                  </div>
                  <div class="form-group">
                    <label for="NormNucl">NormNucl</label>
                    <input
                      type="number"
                      class="form-control"
                      id="NormNucl"
                      name="NormNucl"
                    />
                  </div>
                  <div class="form-group">
                    <label for="Mit">Mit</label>
                    <input
                      type="number"
                      class="form-control"
                      id="Mit"
                      name="Mit"
                    />
                  </div>
              </div>
             
              <input type="submit" class="btn btn-primary" />
            </form>
          </div>
          
        </div>
      </div>
    </div>
  
 
</div>
  </body>
</html>
