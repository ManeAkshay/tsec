<?php 

require_once 'db_connect.php';

if(!isset($_SESSION)){
	if(!isset($_SESSION['dte_no'])){
		header("Location: logout.php");
	}
}


$dte_no = $_SESSION['dte_no'];


if($_POST){
	//var_dump($_POST);
	if(isset($_POST['category']) && isset($_POST['gender']) && isset($_POST['disability'])){
		$category = $_POST['category'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$nationality = $_POST['nationality'];
		$religion = $_POST['religion'];
		$caste =$_POST['caste'];
		$disability = $_POST['disability'];
		if($disability === "no"){
			$disability_reason = '';
		}else{
			$disability_reason = $_POST['disability_reason'];
		}

	$query = "UPDATE candidate_details SET `category` = '".$category."' , `fname` = '".$fname."' , `mname` = '".$mname."' , `lname` = '".$lname."' , `dob` = '".$dob."' , `gender` = '".$gender."' , `nationality` = '".$nationality."' , `religion` = '".$religion."' , `caste` = '".$caste."' , `disability` = '".$disability."' , `disability_reason` = '".$disability_reason."' WHERE user_id = ".$_SESSION['user_id'];
		//echo "$query";
	if($mysqli->query($query)){
		//echo "succes";
	}else {
		//echo "false";
		# code...
	}
}
}


require_once 'head.php';
require_once 'header1.php';
$query = "SELECT * FROM candidate_details WHERE user_id = ".$_SESSION['user_id'];
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

$category = $row['category'];
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$dob = $row['dob'];
$gender = $row['gender'];
$nationality = $row['nationality'];
$religion = $row['religion'];
$caste =$row['caste'];
$disability = $row['disability'];
$disability_reason = $row['disability_reason'];
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Candidate Details</li>
  </ol>
</nav>
<form action="" method="post">
	<div class="form-group row" >
		<label for="staticEmail" class=" col-sm-2 col-form-label ">Candidate Category</label>
	    <div class="col-sm-8">
	    	<div class="form-check">
			  <input class="form-check-input" type="radio" name="category" id="Maharashtra" value="Maharashtra Candidate" <?php echo ($category === "Maharashtra Candidate")? 'checked' : '' ;?> checked>
			  <label class="form-check-label" for="Maharashtra">
			    Maharashtra Candidate
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="category" id="Outside" value="Outside Maharashtra Candidate" <?php echo ($category === "Outside Maharashtra Candidate")? 'checked' : '' ;?>>
			  <label class="form-check-label" for="Outside">
			    Outside Maharashtra Candidate
			  </label>
			</div>
	    </div>
	</div>
	<div class="form-group row">
	    <label for="staticEmail" class="col-sm-2 col-form-label">DTE Application No. </label>
	    <div class="col-sm-10">
	      <input type="text" readonly class="form-control-plaintext" id="staticEmail"  name="dte_no" value=<?php echo'"'.$dte_no.'"'; ?>>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="staticEmail" class="col-sm-2 col-form-label">Candidate Name </label>
	    <div class="col-sm-3">
	      <input type="text"  class="form-control" id="staticEmail" placeholder="Surname" name="lname" value=<?php echo'"'.$lname.'"'; ?>  required>
	    </div>
	    <div class="col-sm-3">
	      <input type="text"  class="form-control" id="staticEmail" placeholder="First Name" name="fname" value=<?php echo'"'.$fname.'"'; ?> required>
	    </div>
	    <div class="col-sm-3">
	      <input type="text"  class="form-control" id="staticEmail" placeholder="Middle Name" name="mname" value=<?php echo'"'.$mname.'"'; ?> required>
	    </div>
	  </div>
	  <div class="form-group row">
	    <label for="staticEmail" class="col-sm-2 col-form-label">Date of Birth</label>
	    <div class="col-sm-3">
	      <input type="date"  class="form-control" id="staticEmail" name="dob" value=<?php echo'"'.$dob.'"'; ?> required>
	    </div>
	</div>

	<div class="form-group row" >
		<label for="staticEmail" class=" col-sm-2 col-form-label ">Gender</label>
	    <div class="col-sm-8">
	    	<div class="form-check">
			  <input class="form-check-input" type="radio" name="gender" id="male" value="male" <?php echo ($gender === "male")? 'checked' : '' ;?>>
			  <label class="form-check-label" for="male">
			    Male
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="gender" id="female" value="female" <?php echo ($gender === "female")? 'checked' : '' ;?>>
			  <label class="form-check-label" for="female">
			    Female
			  </label>
			</div>
	    </div>
	</div>
	  <div class="form-group row">
	    <label for="staticEmail" class="col-sm-2 col-form-label">Nationality</label>
	    <div class="col-sm-3">
	      <input type="text"  class="form-control" id="staticEmail"  name="nationality" value=<?php echo'"'.$nationality.'"'; ?> required>
	    </div>
	</div>
	    <div class="form-group row">
	    <label for="staticEmail" class="col-sm-2 col-form-label">Religion</label>
	    <div class="col-sm-3">
	      <input type="text"  class="form-control" id="staticEmail"  name="religion" value=<?php echo'"'.$religion.'"'; ?> required>
	    </div>
	    	<label class="col-sm-2 col-form-label">Caste</label>
	    	<div class="col-sm-3">
	    		 <select id="inputState" name="caste"  class="form-control" required>
			        <option selected>Select</option>
			        <option value="SC/ST/VJ" <?php echo ($caste === "SC/ST/VJ")? 'selected' : '' ;?>>SC/ST/VJ</option>
			        <option value="NT(A)" <?php echo ($caste === "NT(A)")? 'selected' : '' ;?>>NT(A)</option>
			        <option value="NT(B)" <?php echo ($caste === "NT(B)")? 'selected' : '' ;?>>NT(B)</option>
			        <option value="NT(C)" <?php echo ($caste === "NT(C)")? 'selected' : '' ;?>>NT(C)</option>
			        <option value="NT(D)" <?php echo ($caste === "NT(D)")? 'selected' : '' ;?>>NT(D)</option>
			        <option value="OBC" <?php echo ($caste === "OBC")? 'selected' : '' ;?>>OBC</option>
			        <option value="OPEN" <?php echo ($caste === "OPEN")? 'selected' : '' ;?>>OPEN</option>
			      </select>
			    		
	    	</div>
	    	
	    </div>
	<div class="form-group row" >
		<label for="staticEmail" class=" col-sm-2 col-form-label ">Person with disability?</label>
	    <div class="col-sm-8">
	    	<div class="form-check">
			  <input class="form-check-input" type="radio" onclick="clickYes()" name="disability" id="pd1" value="yes"  <?php echo ($disability === "yes")? 'checked' : '' ;?> >
			  <label class="form-check-label" for="pd1">
			    Yes
			  </label>
			</div>
			<input type="text" class="form-control col-sm-5" id="disability_reason" placeholder="enter disability" name="disability_reason"  value=<?php echo'"'.$disability_reason.'"'; ?> <?php echo ($disability === "no")? 'style="display:none"': 'style="display:block"' ;?> 	 >
			<div class="form-check">
			  <input class="form-check-input" type="radio" onclick="clickNo()" name="disability" id="pd2" value="no" <?php echo ($disability === "no")? 'checked' : '' ;?>>
			  <label class="form-check-label" for="pd2" >
			    No
			  </label>
			</div>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
	<input type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0" value="Save and Next">
		</div>
	</div>
</form>

<script type="text/javascript">
function clickYes(){
		$("#disability_reason").css("display","block");
};
function clickNo(){
		$("#disability_reason").css("display","none");
};
$(document).ready(function(){
})

</script>