function openMenu() {
	$(".menuItemsForMobile").toggle("fade", { direction: "up" }, 500);
}

function registration() {
	var username = $('.username').val();
	var firstname = $('.firstname').val();
	var lastname = $('.lastname').val();
	var email = $('.email').val();
	var password = $('.password').val();
	var mobile = $('.mobile').val();
	var actionType = $('.actionType').val();
	if(username != "" && firstname != "" && lastname != "" && email != "" && password !=""  && mobile != "" && actionType != "") {
	$.ajax({
		type: "POST",
		url: "http://localhost/up/action.php",
		data: "username="+username+"&firstname="+firstname+"&lastname="+lastname+"&email="+email+"&password="+password+"&mobile="+mobile+"&actionType="+actionType, 
		cache: false,
		beforeSend: function() {
			$('.loader').html('<i class="fa fa-spinner" aria-hidden="true"></i>').fadeIn('fast');
			},
		success: function(response) {
			$('.loader').fadeOut('fast');
			$('.response').html(response).fadeIn();
			$('.response').delay(200).fadeOut();
			$('.registrationForm')[0].reset();
		}
	});	
	} else {
	$('.loader').html('Fill all the details correctly').fadeIn('fast');	
	}
}
function userLogin() {
	var email = $('.email').val();
	var password = $('.password').val();
	var actionType = $('.actionType').val();
	if(email != "" && password != "" && actionType != "") {
	$.ajax({
		type: "POST",
		url: "http://localhost/up/action.php",
		data: "email="+email+"&password="+password+"&actionType="+actionType, 
		cache: false,
		beforeSend: function() {
			$('.loader').html('<i class="fa fa-spinner" aria-hidden="true"></i>').fadeIn('fast');
			},
		success: function(response) {
			$('.loader').fadeOut('fast');
			$('.response').html(response).fadeIn();
			$('.response').delay(200).fadeOut();
			window.location.reload(false);
		if (String(response)=="success"){
			console.log('dhfsdh');
		window.location.reload(false);
		} 
		}
	});	
	} else {
	$('.loader').html('Fill all the details correctly').fadeIn('fast');	
	}
}

function userLogout() {
	
	var actionType = "logout";
	
	$.ajax({
		type: "POST",
		url: "http://localhost/up/action.php",
		data: "actionType="+actionType, 
		cache: false,
		beforeSend: function() {
			$('.loader').html('<i class="fa fa-spinner" aria-hidden="true"></i>').fadeIn('fast');
			},
		success: function(response) {
			alert();
			$('.loader').fadeOut('fast');
			$('.response').html(response).fadeIn();
			$('.response').delay(200).fadeOut();
		}
	});	
}
