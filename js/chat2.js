/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var inputUser = $("#user");
	var inputMessage = $("#umessage");
	var loading = $("#loading");
	//var messageList = $(".content > ul");
	var messageList = $("#msg > ul");
	
	//functions
	function updateShoutbox(){
		//just for the fade effect
		//messageList.hide();
		//loading.fadeIn();
		//send the post to shoutbox.php
		$.ajax({
			type: "POST", url: "shoutbox/", data: "action=update",
			complete: function(data){
				//loading.fadeOut();
				messageList.html(data.responseText);
				//messageList.fadeIn(1000);
			}
		});
		
	}setInterval(updateShoutbox, 10000);
	//check if all fields are filled
	function checkForm(){
		if(inputMessage.attr("value"))
			return true;
		else
			return false;
	}
	
	//Load for the first time the shoutbox data
	updateShoutbox();
	//setInterval('updateShoutbox()', 1000);
	
	//on submit event
	$("#umessage").keypress(function(e){
		 if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13))
        {
		if(checkForm()){
			var nick = inputUser.attr("value");
			var message = inputMessage.attr("value");
			//we deactivate submit button while sending
		    //send the post to shoutbox.php
				$.ajax({
					type: "POST", url: "resources/shoutbox/", data: "action=insert&user=" + nick + "&message=" + message,
					complete: function(data){
						//messageList.html(data.responseText);
						updateShoutbox();
						//reactivate the send button
						$("#umessage").attr("value", "");
						
					}
				 });
		
		}
		else alert("Please fill all fields!");
		//we prevent the refresh of the page after submitting the form
		return false;
		}
	});

     
  
	  
	  });
	  
