<?php
session_start();
//include functions file and DB classes
require_once("cms/functions.php");
$db = new db_class;
if (!$db->connect())
$db->print_last_error(false);
$page_name = "home";
$page_title = "Contact Us - ";
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
	  <div class="col-xs-12 text-center" style="min-height: 400px">
   	    <h1>OPPS, Error 404 !</h1>
        <img src="images/page_not_found.jpg">
        <h4>The page or resource you requested was not found. This can be for a number of reasons. </h4>
        <h4 style="margin-bottom:20px; ">Use the search feature below to seach for the resource you were looking for</h4>
        <div class="col-xs-6 col-xs-offset-3">
        	<form id="search-form" role="search" action="<?php echo $base_url;?>search/search.php">

        <div class="input-group">

            <input type="text" class="form-control input-md" placeholder="Search" style="" name="query" id="query" />

            <input name="search" type="hidden" value="1" style="display:none" />

            <span class="input-group-btn">

                <button class="btn btn-primary btn-md" type="submit" style="color:#fff">

                    <i class="glyphicon glyphicon-search"></i>

                </button>

            </span>

        </div>

        </form>
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
