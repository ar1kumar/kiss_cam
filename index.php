<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Ebola</title>
	<script src="js/jquery.js"></script>
	<script src="js/script.js"></script>
	<link rel="stylesheet" href="css/style.css" />
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="lib/webcam.js"></script>
</head>
<body>
	<div class="wrapper">
		<div id="results"> captured image </div>
	
	<h1></h1>
	
	
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="lib/webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<!-- A button for taking snaps -->
	<form>
		<div id="pre_take_buttons">
			<input type=button value="Take Snapshot" onClick="preview_snapshot()">
		</div>
		<div id="post_take_buttons" style="display:none">
			<input type=button value="&lt; Take Another" onClick="cancel_preview()">
			<input type=button value="Save Photo &gt;" onClick="save_photo()" style="font-weight:bold;">
		</div>
	</form>
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
	
		//on key press
		$(document).ready(function(){
		    $(document).on('keydown', function (event) {
		        if (event.keyCode == 32) {
		            console.log('captured');
		            //call the function to take the picture
		            preview_snapshot();
		        }
		    });
		});
		
		
		function preview_snapshot() {
			// freeze camera so user can preview pic
			Webcam.freeze();
			
			// swap button sets
			document.getElementById('pre_take_buttons').style.display = 'none';
			document.getElementById('post_take_buttons').style.display = '';
		}
		
		function cancel_preview() {
			// cancel preview freeze and return to live camera feed
			Webcam.unfreeze();
			
			// swap buttons back
			document.getElementById('pre_take_buttons').style.display = '';
			document.getElementById('post_take_buttons').style.display = 'none';
		}
		
		function save_photo() {
			// actually snap photo (from preview freeze) and display it
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
				
				// swap buttons back
				document.getElementById('pre_take_buttons').style.display = '';
				document.getElementById('post_take_buttons').style.display = 'none';
			} );
		}
	</script>

	</div>
</body>
</html>