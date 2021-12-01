<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
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
            <form action="connect.php" method="post">
            <div class="form-group">
                <label for="docname">Doctor Name</label>
               <?php echo $username; ?>
              <div class="form-group">
                <label for="firstName">First Name</label>
                
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                />
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="m"
                      id="male"
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                    />Others</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                  required=""
                />
              </div>
             
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="number"
                  name="number"
                  pattern="^[0-9]{10}$"
                  title="Please enter 10 digit phone number"
                  required=""
                />
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
