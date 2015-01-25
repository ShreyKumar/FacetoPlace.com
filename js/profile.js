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


		$("div#pane-right > div.pane-right:first").animate({
			marginTop: '32%'
		}, 2000);
		pinitid.animate({
			marginTop: '25%'
		}, 2000);

	});
		
});