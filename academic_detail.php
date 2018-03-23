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

$school = "";
$university = "";
$seatno = "";
$avgmarks = "";
$tmarks = "";
$percentage = "";





?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="candidate_detail.php">Candidate Details</a></li>
    <li class="breadcrumb-item"><a href="parent_detail.php">Parents Details</a></li>
    <li class="breadcrumb-item active" aria-current="page">Academic Details</li>
  </ol>
</nav>


<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">SSC</label>
    <div class="col-sm-3">
    </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name of School </label>
    <div class="col-sm-3">
      <input type="text"  class="form-control" id="staticEmail" placeholder="School" name="school" value=<?php echo'"'.$school.'"'; ?>>
  </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">University Name </label>
    <div class="col-sm-3">
      <input type="text"  class="form-control" id="staticEmail" placeholder="University" name="university" value=<?php echo'"'.$university.'"'; ?>>
  </div>
</div>

<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Exam Seat Number</label>
    <div class="col-sm-3">
      <input type="number"  class="form-control" id="staticEmail" placeholder="Seat No" name="seatno" value=<?php echo'"'.$seatno.'"'; ?>>
  </div>
</div>

    </div>
    	<label class="col-sm-2 col-form-label">Year of Passing</label>
    	<div class="col-sm-3">
    		 <select id="inputState"  class="form-control">
		        <option selected>Select</option>
		        <option>1990</option>
		        <option>1991</option>
		        <option>1992</option>
		        <option>1993</option>
		        <option>1994</option>
		        <option>1995</option>
		        <option>1996</option>
		        <option>1997</option>
		        <option>1998</option>
		        <option>1999</option>
		        <option>2000</option>
		        <option>2001</option>
		        <option>2002</option>
		        <option>2003</option>
		        <option>2004</option>
		        <option>2005</option>
		        <option>2006</option>
		        <option>2007</option>
		        <option>2008</option>
		        <option>2009</option>
		        <option>2010</option>
		        <option>2011</option>
		        <option>2012</option>
		        <option>2013</option>
		        <option>2014</option>
		        <option>2015</option>
		        <option>2016</option>
		        <option>2017</option>
		        <option>2018</option>
		      </select>
		    		
    	</div>
    	
    </div>



<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Average Marks</label>
    <div class="col-sm-3">
      <input type="number"  class="form-control" id="staticEmail" placeholder="Avg Marks" name="avgmarks" value=<?php echo'"'.$avgmarks.'"'; ?>>
  </div>
</div>


<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Total Marks</label>
    <div class="col-sm-3">
      <input type="number"  class="form-control" id="staticEmail" placeholder="Total Marks" name="tmarks" value=<?php echo'"'.$tmarks.'"'; ?>>
  </div>
</div>


<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Percentage</label>
    <div class="col-sm-3">
      <input type="number"  class="form-control" id="staticEmail" placeholder="%" name="percentage" value=<?php echo'"'.$percentage.'"'; ?>>
  </div>
</div>


<div class="row">
	<div class="col-md-12">
		<a class="btn btn-primary" href=".php" role="button">Submit</a>