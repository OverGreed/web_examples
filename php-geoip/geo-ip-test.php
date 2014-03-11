<?php
$geo = geoip_record_by_name($_SERVER['REMOTE_ADDR']);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ваши находитесь</title>
</head>
<body>
	<h1>Ваше место положение</h1>
	<form action="" method="post">
		<div>
			<label for="country">Страна:</label><input type="text" name="country" value="<?= $geo['country_name']; ?>">
		</div>
		<div>
			<label for="city">Город:</label><input type="text" name="city" value="<?= $geo['city']; ?>">
		</div>
		<div>
			<label for="zipcode">Индекс:</label><input type="text" name="zipcode" value="<?= $geo['postal_code']; ?>">
		</div>
	</form>
	<pre><?php print_r($geo);?></pre>
</body>
</html>
