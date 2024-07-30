<?php
header('Content-Type: text/html; charset=utf-8');
$activation = sha1(uniqid(rand(), true));


 ?>
<!DOCTYPE html>
<html>
<head>
<title>basic example</title>
</head>
<body>
<script src="jquery-3.3.1.js"></script>

<!--<script type="text/javascript" src="../jquery.qrcode.min.js"></script>
--><script type="text/javascript" src="jquery.qrcode.js"></script>
<script type="text/javascript" src="qrcode.js"></script>
<h1><?php echo($activation); ?></h1>
<p>Render in table</p>
<div id="qrcodeTable"></div>
<p>Render in canvas</p>
<div id="qrcodeCanvas"></div>
<script>
	//jQuery('#qrcode').qrcode("this plugin is great");
	jQuery('#qrcodeTable').qrcode({
		render	: "table",
		text	: "<?php echo($activation); ?>"
	});
	jQuery('#qrcodeCanvas').qrcode({
		text	: "<?php echo($activation); ?>"
	});
</script>

</body>
</html>
