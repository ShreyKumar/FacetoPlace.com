// profile.js
$(document).ready(function(){
	//unsubmit form


	$("textarea").click(function(){
		$(this).html("");
	});
	var pin = $("#pin");

	pin.on('click', function(e){

		var content = $("#content");
		
		//DATA HANDLING
		$.post('pin.php', {content: content.val()}, function(data){
			var trimmed = data.split(" ");
			var firstname = trimmed[0];
			var lastname = trimmed[1];
			var content = trimmed[2];

			//create clone
			var newpinit = $("#pinit").clone();
			
			//replace with content
			$("#pinit > .panel-body").html('<h4>' + firstname + ' ' + lastname.substr(0, 1) + '. </h4><br />' + content);

			// move to right
			var tomove = $("#allpins > .pinned-right:first-child");

			tomove.animate({
				marginLeft: '47.4%'
			}, 1000);
			tomove.css('margin-top', '-14%');
			$("#pinit").animate({
				marginTop: '17%'
			}, 1000, '', function(){
				//add an old pinit class
				$("#pinit").addClass('oldpinit');

				//unscrew up format
				$(".profilecard").css('margin-left', '47.5%');
				$(".profilecard").css('margin-top', '-31%');
				$(".oldpinit").css('margin-left', '-40%');

				$("#pinit").removeAttr('id');
				$(".oldpinit").before(newpinit);
			});
		});

		
	});
		
});