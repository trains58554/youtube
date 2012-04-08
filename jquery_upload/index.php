<!doctype html>
<html>
<head>
	<title>PHP Site Template</title>
	<link rel="stylesheet" href="css/default.css" />
	<link rel="stylesheet" href="css/fileuploader.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
	
	<script src="js/fileuploader.js"></script>
	
	<script>
	function initUploader()
	{
		var upload = new qq.FileUploader({
			element: $("#upload")[0]
			,action: 'upload.php'
			,allowedExtensions: ['jpg', 'jpeg', 'png', 'gif']
			,onComplete: function(id, filename, json) {
				if (json.success == true) {
					$("#upload").find('.qq-upload-button').html('<div class="qq-upload-button-disabled"></div>');
				}
			}
			,template: '<div class="qq-uploader">' + 
				'<div class="qq-upload-drop-area"><span>Drop files here to upload</span></div>' +
				'<div class="qq-upload-button"></div>' +
				'<ul class="qq-upload-list"></ul>' + 
			 '</div>'
		});
	}
	
	$(function() {
	
		$(".reset").click(function() {
			initUploader();
			return false;
		});
		
		initUploader();
	
	});
	</script>
	
</head>
<body>

<!-- start:Wrap -->
<div id="wrap">

<header>
Site Template
</header>


<!-- start:Content -->
<div id="content">

	<div id="upload"></div>

	<a class="reset" href="#">Reset</a>

</div>
<!-- end:Content -->

<footer>
&copy; 2012 Site Template
</footer>

</div>
<!-- end:Wrap -->
</body>
</html>