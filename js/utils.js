jQuery(document).ready(function() {

//all those containers we need to overflow, lets do it here faq 
jQuery("#container, #everything, .my_overflow, #left, #my_content_here, #main_center, .box_with_title").css("overflow", "auto");

$(".add_notice1").click(function()
  {	
  	var url = $(this).attr("href");
	TopUp.display (url, 
				{width : 920, height : 570, type : 'iframe', title : 'Add Notice', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
  
 $(".edit_profile").click(function()
  {	
  	var url = $(this).attr("href");
	TopUp.display (url, 
				{width : 920, height : 480, type : 'iframe', title : 'Edit Profile', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  }); 
  
   $(".post").click(function()
  {	
  	var url = $(this).attr("href");
	TopUp.display ('assets/user_status.php', 
				{width : 920, height : 250, type : 'iframe', title : 'Post Message', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  }); 

$(".add_notice").click(function()
  {	
  	var url = $(this).attr("href");
	TopUp.display (url, 
				{width : 920, height : 570, type : 'iframe', title : 'Add Notice', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
   

$(".forum_add_response").click(function()
  {	
  	var url = $(this).attr("href");
	TopUp.display (url, 
				{width : 920, height : 570, type : 'iframe', title : 'Add Topic Response', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });

$(".forum_add_qresponse").click(function()
  {	
  	var url = $(this).attr("href");
	TopUp.display (url, 
				{width : 920, height : 570, type : 'iframe', title : 'Add Query Response', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
 


$(".forum_add_topic").click(function()
  {	
  	var url = $(this).attr("href");
	TopUp.display (url, 
				{width : 720, height : 350, type : 'iframe', title : 'Add Forum', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });

$(".forum_add_forum").click(function()
  {	TopUp.display ('assets/forum_addforum.php', 
				{width : 620, height : 300, type : 'iframe', title : 'Add Forum', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
  

  
  
 $(".forum_add_help").click(function()
  {	TopUp.display ('assets/forum_addhelp.php', 
				{width : 620, height : 300, type : 'iframe', title : 'Add Query', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  }); 

$(".add_event").click(function()
  {	TopUp.display ('assets/news_addevent.php', 
				{width : 820, height : 600, type : 'iframe', title : 'Add Event', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });

$(".user_add_gallery").click(function()
{
	var t = $(this).attr("id");
	if (t != "") url = 'assets/user_addgallery.php?albumtype=public';
	else url = 'assets/user_addgallery.php?albumtype=private';
	
 	TopUp.display (url, 
				{width : 720, height : 350, type : 'iframe', title : 'Add Album', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });

$(".user_edit_gallery").click(function()
{
  	var url = $(this).attr("href");
 	TopUp.display (url, 
				{width : 720, height : 350, type : 'iframe', title : 'Edit Album', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
  
$(".add_images").click(function()
{
	var t = $(this).attr("id");
	url = 'assets/ga_addimages.php?albumid='+t;

	
 	TopUp.display (url, 
				{width : 820, height : 950, type : 'iframe', title : 'Add Photos', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });  

$(".user_status").click(function()
  {	TopUp.display ('assets/user_status.php', 
				{width : 620, height : 310, type : 'iframe', title : 'Update Status', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
  
 $(".user_post").click(function()
  {	TopUp.display ('assets/user_post.php', 
				{width : 620, height : 310, type : 'iframe', title : 'Post Message', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
  
   $(".forum_add_category").click(function()
  {	TopUp.display ('assets/dl_addcategory.php', 
				{width : 620, height : 240, type : 'iframe', title : 'Add download Category', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });
   

$(".change_profile_picture").click(function()
  {	TopUp.display ('assets/user_profile_picture.php', 
				{width : 620, height : 390, type : 'iframe', title : 'Change Profile Picture', layout : 'dashboard', shaded: 1, effect:'fade', onclose:"refresh_page()"});
  return false;
  });

//used to select all checkboxes or clear them
$("#checkboxall").click(function()
  {
 	var sta  = $('#checkboxall').is(':checked');
	$("input[type='checkbox']:not([disabled='disabled'])").attr('checked', sta);
  });

});			


function increase_height(){
jQuery(document).ready(function() {
	
});	
}

function refresh_page(){
	window.location.reload();
}

//used to confrm a delete before proceeding
function confirmfirst(url)
{
var answer = confirm("This action is not reversable, are you sure you want to delete this item?")
	if (answer){
		window.location = url;
	}
	return false;
}
//used to submit the form when multiple check items are selected
function submitform()
{
	var answer = confirm("This action is not reversable, are you sure you want to delete the selected items?")
	if (answer){
		document.forms["selected_form"].submit();
	}
}

//our tabs code
jQuery(document).ready(function(){
    //  When user clicks on tab, this code will be executed
    jQuery("#tabs li").click(function() {
        //  First remove class "active" from currently active tab
        jQuery("#tabs li").removeClass('active');
 
        //  Now add class "active" to the selected/clicked tab
        jQuery(this).addClass("active");
 
        //  Hide all tab content
        jQuery(".tab_content").hide();
 
        //  Here we get the href value of the selected tab
        var selected_tab = jQuery(this).find("a").attr("href");
 
        //  Show the selected tab content
        jQuery(selected_tab).fadeIn();
 
        //  At the end, we add return false so that the click on the link is not executed
        return false;
    });
});

/*default text */
jQuery(document).ready(function()
{
    jQuery(".defaultText").focus(function(srcc)
    {
        if (jQuery(this).val() == jQuery(this)[0].title)
        {
            jQuery(this).removeClass("defaultTextActive");
            jQuery(this).val("");
        }
    });
    jQuery(".defaultText").blur(function()
    {
        if (jQuery(this).val() == "")
        {
            jQuery(this).addClass("defaultTextActive");
            jQuery(this).val(jQuery(this)[0].title);
        }
    });
    jQuery(".defaultText").blur();        
});
