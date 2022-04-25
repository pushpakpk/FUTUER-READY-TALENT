<?php
      $message='';
      $serverName = "cadateserever1103.database.windows.net"; // update me
      $connectionOptions = array(
        "Database" => "Cadatedatabasestatus", // update me
        "Uid" => "pushpak", // update me
        "PWD" => "Bahale123" // update me
      );
      //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if($conn==false){
        die(print_r(sqlsrv_errors(), true));
    }else{
      if(array_key_exists("send",$_POST)){
        $EmployeeId = $_REQUEST['EmployeeId'];
        $present = $_REQUEST['present'];
        $ship_detail = $_REQUEST['ship_detail'];
        $message = $_REQUEST['message'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y', time());
        $time = date('H:i:s',time());
        $Time = $date.' ('.$time.')';
        // print($message);
        $sql="INSERT INTO details(Emp_Id,Ship,Msg,Time,Attendence)VALUES ('$EmployeeId','$ship_detail','$message','$Time','On The Boad')";
        $results=sqlsrv_query($conn,$sql);
        if($results){
          $message = "Request has been sent";
          // echo "$message";
        }else{
          $message = "Request does not sent";
          // echo "$message";
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>SAF</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" method="POST">
					<?php
		      if($message){
		        echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>".$message."
		        
		        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		      	</div>";
		      }
	    	?>
				<span class="contact100-form-title">
					Employee Attendance Form
				</span>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">User ID *</span>
					<input class="input100" type="no" name="EmployeeId" placeholder="Enter your Employee ID">
				</div>

				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Enter your Presentpy *</san>
					<select class="input100" name="present">
						<option>Select the option</option>
						<option>Present</option>
						<option>Absent</option>
					</select>
					
				</div>
				<div>
					<span class="label-input100">Enter your Ship *</span>
					<select class="input100" name="ship_detail">
          <option selected>Select your Ship</option>
  	      <option value="Ship 1">Ship 1</option>
          <option value="Ship 2">Ship 2</option>
          <option value="Ship 3">Ship 3</option>
          <option value="Ship 4">Ship 4</option>
          </select>
        </div>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Your message here..." name="message"></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn" name="send">
							Submit
						</button>

					</div>

				</div>

			</form>
			<a href="captain.php" style="color: blue">Captain login</a>
		</div>
		
		<span class="contact100-more">

				Call us on +001 345 6178
		</span>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
