 $(document).ready(function(){

 	//define global variables
 	var username = $("#username");
 	var password = $("#password");
 	var firstname = $("#firstname");
 	var lastname = $("#lastname");
 	var day = $("#day");
 	var month = $("#month");
 	var year = $("#year");
 	var email = $("#email")
 	var signin = $("#signin");
 	var signup = $("#signup");
 	var errormsgsignup = $("#errormsgsignup")

	//email validation
 	function IsEmail(email) {
  		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  		return regex.test(email);
	};

	// global functions
	function remove_button(button){
		button.removeAttr('type');
		button.attr('type', 'button');
	};
	function add_button(button){
		button.removeAttr('type');
		button.attr('type', 'submit');
	};

	signup.click(function(){
		if(username.val() == ''){
 			username.addClass('error');
 			remove_button(signup);
 		} else {
 			username.removeClass('error');
 			add_button(signup);
 		};

		if(password.val().length <= 6){
 			password.addClass('error');
 			remove_button(signup);
 		} else {
 			password.removeClass('error');
 			add_button(signup);
 		};

 		if(firstname.val() == ''){
 			firstname.addClass('error');
 			remove_button(signup);
 		} else {
 			firstname.removeClass('error');
 			add_button(signup);
 		};

 		if(lastname.val() == ''){
 			lastname.addClass('error');
 			remove_button(signup);
 		} else {
 			lastname.removeClass('error');
 			add_button(signup);
 		};

 		if(email.val() == ''){
			email.addClass('error');
			remove_button(signup);
		} else {
			email.removeClass('error');
			add_button(signup);
		};

		if(day.val() == 'None'){
			day.addClass('errordropdown');
			remove_button(signup);
		} else {
			day.removeClass('errordropdown');
			add_button(signup);
		};

		if(month.val() == 'None'){
			month.addClass('errordropdown');
			remove_button(signup);
		} else {
			month.removeClass('errordropdown');
			add_button(signup);
		};

		if(year.val().length == 4 && year.val() > 1903 && year.val() < 2012){
			year.removeClass('error');
			add_button(signup);
		} else {
			year.addClass('error');
			remove_button(signup);
		};


	});

 	//username
 	username.blur(function(){
 		if(username.val() == ''){
 			username.addClass('error');
 			remove_button(signup);
 		} else {
 			username.removeClass('error');
 			add_button(signup);
 		};
 	});

 	//password
	password.blur(function(){
		if(password.val().length <= 6){
 			password.addClass('error');
 			remove_button(signup);
 		} else {
 			password.removeClass('error');
 			add_button(signup);
 		};
 	});
 		

 	//firstname
 	firstname.blur(function(){
 		if(firstname.val() == ''){
 			firstname.addClass('error');
 			remove_button(signup);
 		} else {
 			firstname.removeClass('error');
 			add_button(signup);
 		};
 	});
 	//lastname
 	lastname.blur(function(){
 		if(lastname.val() == ''){
 			lastname.addClass('error');
 			remove_button(signup);
 		} else {
 			lastname.removeClass('error');
 			add_button(signup);
 		};
 	});
 	email.blur(function(){
 		errormsgsignup.empty();
 		errormsgsignup.removeClass('errormsg');
 	});

	//day
 	day.blur(function(){
		if(day.val() == 'None'){
			day.addClass('errordropdown');
			remove_button(signup);
		} else {
			day.removeClass('errordropdown');
			add_button(signup);
		};
	});
	
	//month
	month.blur(function(){
		if(month.val() == 'None'){
			month.addClass('errordropdown');
			remove_button(signup);
		} else {
			month.removeClass('errordropdown');
			add_button(signup);
		};
	});
	

	//year
	year.blur(function(){
		if(year.val().length == 4 && year.val() > 1903 && year.val() < 2012){
			year.removeClass('error');
			add_button(signup);
		} else {
			year.addClass('error');
			remove_button(signup);
		};
	});


	//check username availability

	username.keyup(function(){
		var userval = $("#username").val();
		$.post('process.php', {username: userval}, function(data){
			errormsgsignup.html(data);
			if(data == 'Username already taken!' || data == 'A username must be at least 5 characters and must contain alphanumeric characters :('){
				username.addClass('error');
				remove_button(signup);
			} else {
				username.removeClass('error');
				add_button(signup);
			}
		});
	});

	//check email availability

	email.keyup(function(){
		var emailval = $("#email").val();
		$.post('process.php', {email: emailval}, function(data){
			errormsgsignup.html(data);
			if(data == 'Email already in use!' || data == 'Invalid email!'){
				email.addClass('error');
				remove_button(signup);
			} else {
				email.removeClass('error');
				add_button(signup);
			};
		});
	});



	// SIGN IN FORM VALIDATION
	function remove_msg(){
		if($("#errormsgsignup").innerHTML == ''){
			$("#errormsgsignup").removeClass('errormsg');
		} else {
			$("#errormsgsignup").addClass('errormsg');
		}; 

		if($("#errormsgsignin").innerHTML == '') {
			$("#errormsgsignin").removeClass('errormsg');
		} else {
			$("#errormsgsignin").addClass('errormsg');
		};
	};


	// Handle signin here
	var user = $("#signinusername");
	var pass = $("#signinpassword");
	var userready = false;
	var passready = false;

	user.bind("keyup blur", function(){
		//get data from signin.php
		if(user.val().length == 0){
			user.addClass('error');
			userready = false;
		} else {
			user.removeClass('error');
			userready = true;
		};
	});

	pass.bind("keyup blur", function(){
		if(pass.val().length == 0){
			pass.addClass('error');
			passready = false;
		} else {
			pass.removeClass('error');
			passready = true;
		};
	});

	signin.click(function(){

		if(userready == true && passready == true){
			//Geolocation
    		if (navigator.geolocation) {
        		navigator.geolocation.getCurrentPosition(showPosition);
    		} else { 
        		alert("Geolocation is not supported by this browser.");
	    	};

			function showPosition(position) {
				var lat = position.coords.latitude;
				var lon = position.coords.longitude;
				$.post('signin.php', {
					username: user.val(),
					password: pass.val(),
					lat: lat,
					lon: lon
				}, function(data){
					if(data == 'Unable to update lat, long'){
						errormsgsignin.html('Oops, an error occurred! <a href="sendme.php">Click here</a> to send an email to Shrey immidiately.');
					} else {
						//navigate to profile.php
						window.location.href = 'profile.php?id=' + data;
					};
				});
			};
		} else {
			errormsgsignin.html('');
		}
		
	})

	




 });
