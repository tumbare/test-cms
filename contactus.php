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
	  <div class="col-lg-9" style="min-height:600px; text-align:justify">
   	    <h1>Contact Us</h1>
        <div id="contacts_list">
<?php
$result2 = $db->select("SELECT * from site_pages where site_id = 34 order by title desc");
while ($row=$db->get_row($result2, 'MYSQL_ASSOC')){
?>        	
            <div class="col-lg-6 col-sm-6" style="min-height:80px; border:solid 2px #F5F5F5;">
            	<strong><?php echo $row["title"];?></strong>
                <p><?php echo str_replace("../files/","files/",$row["description"]); ?></p>
            </div>
 <?php } ?>       
        </div>
        
	  </div>
    	
        <div class="col-lg-3 small" style="min-height:600px;">
        	<?php include("includes/inc_right_news.php");?>
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
