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
    $ffname = $_POST['ffname'];
    $fmname = $_POST['fmname'];
    $flname = $_POST['flname'];
    $foccupation = $_POST['foccupation'];
    $fincome = $_POST['fincome'];
    $mfname = $_POST['mfname'];
    $mmname = $_POST['mmname'];
    $mlname = $_POST['mlname'];
    $moccupation = $_POST['moccupation'];
    $mincome = $_POST['mincome'];
    $total_income = $_POST['total_income'];

  $query = "UPDATE candidate_parents SET `ffname` = '".$ffname."' , `fmname` = '".$fmname."' , `flname` = '".$flname."' , `foccupation` = '".$foccupation."' , `fincome` = '".$fincome."' , `mfname` = '".$mfname."' , `mmname` = '".$mmname."' , `mlname` = '".$mlname."' , `moccupation` = '".$moccupation."' , `mincome` = '".$mincome."' , `total_income` = '".$total_income."' WHERE user_id = ".$user_id;
    //echo "$query";
  if($mysqli->query($query)){
    //echo "succes";
    header("Location: address_detail.php");
  }else {
    //echo "false";
    # code...
  }
}

$query = "SELECT * FROM candidate_parents WHERE user_id = ".$user_id;
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
$ffname = $row['ffname'];
$fmname = $row['fmname'];
$flname = $row['flname'];
$foccupation = $row['foccupation'];
$fincome = $row['fincome'];
$mfname = $row['mfname'];
$mmname = $row['mmname'];
$mlname = $row['mlname'];
$moccupation = $row['moccupation'];
$mincome = $row['mincome'];
$total_income = $row['total_income'];


require_once 'head.php';
require_once 'header1.php';
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidate_detail.php">Candidate Details</a>->Parents Details</li>
  </ol>
</nav>
<form method="post">
  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Parents Name </label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="Surname" name="flname" value=<?php echo'"'.$flname.'"'; ?>>
      </div>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="First Name" name="ffname" value=<?php echo'"'.$ffname.'"'; ?>>
      </div>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="Middle Name" name="fmname" value=<?php echo'"'.$fmname.'"'; ?> >
      </div>
    </div>


  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Father's Occupation </label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="Job" name="foccupation" value=<?php echo'"'.$foccupation.'"'; ?>>
    </div>
  </div>


  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Father's Income </label>
      <div class="col-sm-3">
        <input type="number"  class="form-control" id="fincome" onkeyup="addTotal()" placeholder="Income" name="fincome" max ="10000000" value=<?php echo'"'.$fincome.'"'; 
        ?>>
    </div>
  </div>

  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Mother's Name </label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="Surname" name="mlname" value=<?php echo'"'.$mlname.'"'; ?>>
      </div>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="First Name" name="mfname" value=<?php echo'"'.$mfname.'"'; ?>>
      </div>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="Middle Name" name="mmname" value=<?php echo'"'.$mmname.'"'; ?> >
      </div>
    </div>


  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Mothers's Occupation </label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="staticEmail" placeholder="Job" name="moccupation" value=<?php echo'"'.$moccupation.'"'; ?>>
    </div>
  </div>


  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Mother's Income </label>
      <div class="col-sm-3">
        <input type="number"  class="form-control" id="mincome" onkeyup="addTotal()" placeholder="Income" name="mincome" max ="100000000" value=<?php echo'"'.$mincome.'"'; 
        ?>>
    </div>
  </div>

  <div class="form-group row">
      <label for="staticEmail" class="col-sm-2 col-form-label">Total Income </label>
      <div class="col-sm-3">
        <input type="text"  class="form-control" id="total_income" placeholder="Total Income" name="total_income" value=<?php echo'"'.$total_income.'"'; ?> readonly>
    </div>
  </div>


  <div class="row">
  	<div class="col-md-12">
      <a href="candidate_detail.php" class="btn btn-outline-primary my-2 my-sm-0">Previous</a>
      <input type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0" value="Save and Next">
  	</div>
  </div>
</form>


<script type="text/javascript">
  
    function addTotal(){
      var fincome = $("#fincome").val();
      var mincome = $("#mincome").val();
      $("#total_income").val(parseInt(fincome)+parseInt(mincome));  
    }
  $(document).ready(function(){

 var fincome = $("#fincome").val();
      var mincome = $("#mincome").val();
      $("#total_income").val(parseInt(fincome)+parseInt(mincome));
  });

</script>