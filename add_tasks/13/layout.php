
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<link rel ="stylesheet" type="text/css" href="css/style.css">
        <title></title>
	</head>
	<body>
        <div class="message">
        <ul>
            <?php foreach($text_arr as $key => $value):?>
                <li><?=$value."-".$key?></li>
            <?php endforeach;?>
        </ul>
        <hr/>
        </div>
        <div class="form">
            <form method="post">
                <p><b>Введите любую строку:</b></p>
                <p><textarea name="string"></textarea></p>
                <p><input type="submit"></p>
            </form>
        </div>
	</body>
</html>