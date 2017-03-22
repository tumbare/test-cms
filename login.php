<?php
session_start();
//include functions file and DB classes
require_once("cms/functions.php");
$db = new db_class;
if (!$db->connect())
$db->print_last_error(false);
$page_name = "home";
$page_title = "Login to Portal - ";
$page_id =1;

//check for action variable and see if its logout
if ($_REQUEST["action"] == "logout")
{
	logout();
}

$msg = "";
$error = false;
if ($_SERVER['REQUEST_METHOD']=="POST")
{// someone is trying to log in
//first lets check referer and server name if its not the one specified in db_class then ignore requestd and send a 404 not found
		if (($_POST["username"] == "") || ($_POST["password"] == ""))
		  {
			  $msg =	"All fields are required. Username or password missing. ";
			  $error = true;
			  		
		  }
		  else
		  {
					  $myusername = mysql_real_escape_string($_POST["username"]);
					  $mypassword = mysql_real_escape_string($_POST["password"]);
					  $result = $db->select("SELECT * FROM portal_users where username = '$myusername' and password = '$mypassword'");
					  $num_rows = mysql_num_rows($result);
					  $mydata = mysql_fetch_assoc($result);
					  
					  if ($num_rows >= 1) //something has been found create session and redirect to home page
						  {
							  
							  $result = $db->select("SELECT * FROM portal_users where username = '$myusername' and password = '$mypassword' and active = 'Yes'");
							  $num_rows = mysql_num_rows($result);
							  $mydata = mysql_fetch_assoc($result);
							  if ($num_rows >= 1)
							  {
								  //lets stop session hijacking crooks
								  session_regenerate_id();
								  $_SESSION['username'] = $mydata["username"];
								  $_SESSION['userid'] = $mydata["id"];
								  $_SESSION['fname'] = $mydata["fname"];
								  $_SESSION['surname'] = $mydata["surname"];
								  $_SESSION['type'] 	= $mydata["type"];	
									if ($mydata["type"] == "Lecturer") 
										$link = $base_url . "lecturers/";
									else 
										$link = $base_url . "students/";

								  header("Location: " . $link);
								  exit();
							  }
							  else
							  {
								  $msg = "This account has been deactivated";
								  $error = true;
							  }
						  }
				  else
						  { //login details incorrect
							$msg = "Invalid Username/Password ";
							$error = true;
							//lets record the invalid login
						  }
		  }//if not blank fields
}

if (portal_loggedin()){
	if ($_SESSION["type"] == "Lecturer") 
		$link = $base_url . "lecturers/";
	else 
		$link = $base_url . "students/";
  
  header("Location: " . $link);
  exit();
}else{
	
//echo "not logged in";
}


?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<?php echo "<base href=\"$base_url\" /> \n";?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="favicon.ico">
        <title><?php echo $cms_name . " - "  . $page_title;?></title>
    
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/css.css" rel="stylesheet">
    
        <?php include("inc_head.php"); //all our js files, keywords, and jquery?>

  </head>

<body>

<?php include("includes/inc_header.php");?>

<!-- MAIN Body Container-->	
<div class="container" style="padding-top:30px; background:#fff">
	<div class="row">
    <h1 class="text-center"><?php echo $cms_name;?> Lecturer/Student Portal</h1>
    
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Login to NHTC Portal</h4>
          </div>
<?php if ($error){?>
		<div style="padding:7px;">
        <div class="alert alert-danger" >
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
        <a href="#" class="close" data-dismiss="alert">&times;</a>
   			<?php echo $msg;?>
		</div>
        </div>
<?php } ?>          
          
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="portal/" novalidate>
                              <div class="form-group">
                                  <label for="username" class="control-label">Username or Student Number</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required title="Please enter you username" placeholder="student # or username">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide">Wrong username or password</div>
                              
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <!--<a href="/forgot/" class="btn btn-default btn-block">Help to login</a> -->
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">How to register</p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Contact your administrator</li>
                          <li><span class="fa fa-check text-success"></span> Get username and password</li>
                          <li><span class="fa fa-check text-success"></span> Login on this page</li>
                          <li><span class="fa fa-check text-success"></span> Change password</li>
                          <li><span class="fa fa-check text-success"></span> Set Profile picture</li>
                          <li><small class="alert-warning">This portal is only open to NHTC Lecturers and students only</small></li>
                      </ul>
					</div>
              </div>
          </div>
      </div>
  </div>    
    
    </div>
</div>
<!-- /.container -->


<?php include("includes/inc_footer.php");?>

<script>

jQuery(document).ready(function($) {
	$('#content_div img').each(function() {
		  $(this).addClass("img-responsive").removeAttr('style');
	})
});
</script>

  </body>
</html>
