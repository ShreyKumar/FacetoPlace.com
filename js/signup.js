// signup.js
// signup.js
$(document).ready(function(){
	$("#change").click(function(){
		alert("Click on a field to change it!");
		$("#main > div > div > form > table#profiletable > tbody > tr > td > #firstnamevalue").click(function(){
			//var value = $("#profiletable").find("#firstnamevalue").html();
			//alert(value);
			alert("test");
		})
	})
});