<?php

require_once 'db_connect.php';
if(!isset($_SESSION['form_no']) || !isset($_SESSION['user_id'])){
	header("Location: login.php");
}
if(isset($_POST)){
	if(isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])){
		//var_dump($_SESSION);
		$form_no = $_SESSION['form_no'];
		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];
		if(!empty($current_password) && !empty($new_password) && strlen($new_password) > 5){
			$query = "SELECT * FROM users WHERE form_no = '".$form_no."' AND password = '".$current_password."'";
			$result = $mysqli->query($query);
			$user = $result->fetch_assoc();
			//echo $query;
			if($result->num_rows > 0){
				if($new_password  === $confirm_password){
					$query = "UPDATE users SET password = '".$new_password."' WHERE id = ".$user['id'];
					if($mysqli->query($query)){
						$_SESSION['password_update'] = "Password updated successfully";
						header("Location: index.php");
					}else{
						$_SESSION['password_update'] = "Some Database related error!";
					}
				}else{

						$_SESSION['password_update'] = "Confirm password does not match";
				}
			}else{
				$_SESSION['password_update'] = "Enter correct Password";
			}
		}else{
			$_SESSION['password_update'] = "Password should be atleast 6 letters";
			//echo "Hi";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>TSEC Admission</title>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="assets/login.css">
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/login.js"></script>
</head>
<body>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    	<div class="row">
    		<?php
	require_once 'header.php';
	?>

			<div class="col-md-6 col-md-offset-3" id="form_body">
				<?php
					if(isset($_SESSION['password_update'])){
					?>
					<div class="alert alert-warning" role="alert">
				   <?php echo $_SESSION["password_update"] ;?>
				</div><?php ;
				unset($_SESSION['password_update']);
				}
				?>
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="index.php" class="btn btn-default	 pull-right">Home</a>
							</div>
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Enter New Password</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="form_no" id="form_no" tabindex="1" class="form-control" placeholder="Form No" value=<?php echo '" Form Id - '.$_SESSION['form_no'].'"'; ?> disabled >
									</div>
									<div class="form-group">
										<input type="password" name="current_password" id="password" tabindex="2" class="form-control" placeholder="Current Password">
									</div>
									<div class="form-group">
										<input type="password" name="new_password" id="password" tabindex="2" class="form-control" placeholder="New Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Update Password">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
