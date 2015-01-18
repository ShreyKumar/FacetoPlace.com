// profile.js
$(document).ready(function(){
	//global vars
	var pin = $("#pin");
	var pinitid = $("#pinit");
	var pinit = $(".pinit");


	$("textarea").click(function(){
		$(this).html("");
	});

	pin.click(function(){
		//clone text box
		var pinformclone = pinit.clone(true);
		//grab content
		var content = $("#content").val();

		//replace pinit with content
		pinit.css("color", "#000");
		pinit.html(content);


		//move first pin sideways
		$("#allpins > .panel:first").animate({
			marginLeft: '47.4%'
		}, 2000 );

		//move pinit downwards
		pinit.animate({
			marginTop: '18.5%'
		}, 2000, function(){
			pinit.css("margin-top", "0%");
			$("#allpins > .panel:first").css("margin-left", "35px");
			pinitid.removeClass('pinit');
			//pinitid.before(pinformclone);
		});

	});
		
});