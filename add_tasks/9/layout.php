
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<link rel ="stylesheet" type="text/css" href="css/style.css">
        <title>перевёрнутая строка</title>
	</head>
	<body>
         <?php if(isset($feedbacks)){ foreach($feedbacks as $feedback) :?>
        <div class="message">
            <?=$feedback['string']?>
            <hr/>
        </div>
        <?php endforeach;} ?>
        <div class="form">
            <form method="post">
                <p><b>Введите любую строку:</b></p>
                <p><textarea name="string"></textarea></p>
                <p><input type="submit"></p>
            </form>
        </div>
	</body>
</html>