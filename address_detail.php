<?php 

require_once 'db_connect.php';

if(!isset($_SESSION)){
  if(!isset($_SESSION['dte_no'])){
    header("Location: logout.php");
  }
}


$dte_no = $_SESSION['dte_no'];
$user_id = $_SESSION['user_id'];

if($_POST){
  //var_dump($_POST);
    
  $address1 = $_POST['address1'];
  $address2 = $_POST['address2'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];

  $query = "UPDATE candidate_address SET `address1` = '".$address1."' , `address2` = '".$address2."' , `city` = '".$city."' , `state` = '".$state."' , `pincode` = '".$pincode."' WHERE user_id = ".$user_id;
    //echo "$query";
  if($mysqli->query($query)){
    //echo "succes";
    header("Location: academic_detail.php");
  }else {
    //echo "false";
    # code...
  }
}

$query = "SELECT * FROM candidate_address WHERE user_id = ".$user_id;
$result = $mysqli->query($query);
$row = $result->fetch_assoc();

$address1 = $row['address1'];
$address2 = $row['address2'];
$city = $row['city'];
$state = $row['state'];
$pincode = $row['pincode'];






require_once 'head.php';
require_once 'header1.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidate_detail.php">Candidate Details</a>-><a href="parent_detail.php">Parents Details</a>->Residential Details</li>  
  </ol>
</nav>


<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Residential Details</label>
    <div class="col-sm-3">
    </div>
</div>

<form method="post">
  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Address1 </label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="flat no./building name/street name" name="address1" value=<?php echo'"'.$address1.'"'; ?>>
    </div>
  </div>

  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Address2 </label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="landmark" name="address2" value=<?php echo'"'.$address2.'"'; ?>>
    </div>
  </div>

  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">City</label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="ex. Mumbai" name="city" value=<?php echo'"'.$city.'"'; ?>>
    </div>
  </div>
  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">State</label>
      <div class="col-sm-3">
        <input type="text "  class="form-control" id="staticEmail" placeholder="ex. Maharashtra" name="state" value=<?php echo'"'.$state.'"'; ?>>
    </div>
  </div>


  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Pincode</label>
      <div class="col-sm-3">
        <input type="number"  class="form-control" id="staticEmail" placeholder="ex. 401105" name="pincode" min="400000" max="499999"value=<?php echo'"'.$pincode.'"'; ?>>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <a href="parent_detail.php" class="btn btn-outline-primary my-2 my-sm-0">Previous</a>
        <input type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0" value="Save and Next">
    </div>
  </div>
</form>