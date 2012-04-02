<!doctype html>
<html>
<head>
	<title>PHP Site Template</title>
	<link rel="stylesheet" href="public/css/default.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	
	<script src="public/js/jquery.validate.js"></script>
	
	<script>
	$(function() {
	
		function init() {
			v = $("#myForm").validate({
				rules: {
					name: {
						required: true,
						minlength: 2,
						maxlength: 10
					},
					age: {
						required: true,
						number: true
					},
					email: {
						required: true,
						email: true,
						remote: 'remote.php'
					},
					url: {
						required: true
					},
					agree_1: {
						required: true
					},
					agree_2: {
						required: true
					}
				},
				messages: {
					name: {
						required: "Dont forget your name!",
						minlength: $.validator.format("Your minlength of {0} is not right!")
					},
					email: {
						remote: 'This is an error of epic proportions'
					}
				},
				success: function(element) {
					element.remove();
				}
			});
		}
	
		$.validator.setDefaults({
			errorClass: 'form_error',
			errorElement: 'div',
			
		});
		
		$("#email").change(function() {
			$(this).removeData();
		});
		
		$("#myForm").submit(function() {

			var valid = $("#myForm").valid();
			if (valid) {
				// Success Code..
				$.post('save.php', $(this).serialize(), function(o) {
					
					if (o.error == false) {
						window.location.href = 'success.php';
					} else {
						// Show the post error someplace
					}
										
					
				}, 'json');
			} else {
				$("#myForm").data('validator', null);
				init();
				
				// Failure Code..
			}
			
			
				
			return false;
		});
		
	});
	</script>
	
</head>
<body>

<!-- start:Wrap -->
<div id="wrap">

<?php include 'header.php'; ?>

<!-- start:Content -->
<div id="content">

<form id="myForm" method="post" action="">

	<label for="name">name</label>
	<input id="name" name="name" /><br />

	<label for="age">age</label>
	<input id="age" name="age" maxlength="2" /><br />

	<label for="email">email</label>
	<input id="email" name="email" /><br />

	<label for="url">url</label>
	<input id="url" name="url" /><br />
	
	<label for="agree_1">agree_1</label>
	<input type="checkbox" id="agree_1" name="agree_1" /><br />
	
	<label for="agree_2">agree_2</label>
	<input type="checkbox" id="agree_2" name="agree_2" /><br />
	
	<input type="submit" />
	
 </form>


</div>
<!-- end:Content -->

<?php include 'footer.php'; ?>

</div>
<!-- end:Wrap -->
</body>
</html>