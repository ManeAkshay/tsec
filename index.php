<?php
require_once 'db_connect.php';

if(!isset($_SESSION['form_no']) || !isset($_SESSION['user_id'])){
	header("Location: login.php");
}

require_once 'head.php';
require_once 'header1.php';
//var_dump($_SESSION);
?>


<?php
	if(isset($_SESSION['password_update'])){
	?>
	<div class="alert alert-warning" role="alert">
	<?php echo $_SESSION["password_update"] ;?>
	</div><?php ;
	unset($_SESSION['password_update']);
	}
?>	
</div>
	</div>
</div>