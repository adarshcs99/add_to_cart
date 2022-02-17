<?php
	include_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="style.css"  rel="stylesheet">

<body>
<div id="main">
<?php include "header.php";?>

		<div id="products">
			<?php
				display();
			?>
		</div>
<?php include "footer.php";?>
	</div>
</body>
</html>