
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<link rel ="stylesheet" type="text/css" href="css/style.css">
        <title></title>
	</head>
	<body>
        <div class="message">
        <?php if($_POST) :?>
            <p>В тексте <b><?=$_POST['string']?></b></p>
        <?php endif;?>
        <ul>
            <?php foreach($text_arr as $key => $value):?>
                <li><?=$key."-".$value?></li>
            <?php endforeach;?>
        </ul>
        <hr/>
        </div>
        <div class="form">
            <form method="post">
                <p><b>Введите строку:</b></p>
                <p>Например: <?=$string?></p>
                <p><textarea name="string"></textarea></p>
                <p><input type="submit"></p>
            </form>
        </div>
	</body>
</html>