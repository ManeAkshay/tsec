<?php 

require_once 'db_connect.php';

if(!isset($_SESSION)){
	if(!isset($_SESSION['dte_no'])){
		header("Location: logout.php");
	}
}


$dte_no = $_SESSION['dte_no'];

require_once 'head.php';
require_once 'header1.php';
$pfname = "";
$pmname = "";
$plname = "";
$fjob = "";
$fincome = "";
$mfname = "";
$mmname = "";
$mlname = "";
$mjob = "";
$mincome = "";
$tincome = "";


?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidate_detail.php">Candidate Details</a></li>
    <li class="breadcrumb-item active" aria-current="page">Parents Details</li>
  </ol>
</nav>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Parents Name </label>
    <div class="col-sm-3">
      <input type="text"  class="form-control" id="staticEmail" placeholder="Surname" name="plname" value=<?php echo'"'.$plname.'"'; ?>>
    </div>
    <div class="col-sm-3">
      <input type="text"  class="form-control" id="staticEmail" placeholder="First Name" name="pfname" value=<?php echo'"'.$pfname.'"'; ?>>
    </div>
    <div class="col-sm-3">
      <input type="text"  class="form-control" id="staticEmail" placeholder="Middle Name" name="pmname" value=<?php echo'"'.$pmname.'"'; ?> >
    </div>
  </div>


<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Father's Occupation </label>
    <div class="col-sm-3">
      <input type="text"  class="form-control" id="staticEmail" placeholder="Job" name="fjob" value=<?php echo'"'.$fjob.'"'; ?>>
  </div>
</div>


<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Father's Income </label>
    <div class="col-sm-3">
      <input type="number"  class="form-control" id="staticEmail" placeholder="Income" name="fincome" max ="10000000" value=<?php echo'"'.$fincome.'"'; 
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
      <input type="text"  class="form-control" id="staticEmail" placeholder="Job" name="mjob" value=<?php echo'"'.$mjob.'"'; ?>>
  </div>
</div>


<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Mother's Income </label>
    <div class="col-sm-3">
      <input type="number"  class="form-control" id="staticEmail" placeholder="Income" name="mincome" max ="100000000" value=<?php echo'"'.$mincome.'"'; 
      ?>>
  </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Total Income </label>
    <div class="col-sm-3">
      <input type="number"  class="form-control" id="staticEmail" placeholder="Total Income" name="tincome" value=<?php echo'"'.$tincome.'"'; ?>>
  </div>
</div>


<div class="row">
	<div class="col-md-12">
		<a class="btn btn-primary" href="candidate_detail.php" role="button">Previous</a>
		<a class="btn btn-primary" href="academic_detail.php" role="button">Save and Next</a>

	</div>
</div>
