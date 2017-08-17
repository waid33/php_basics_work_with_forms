
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<link rel ="stylesheet" type="text/css" href="css/style.css">
        <title>перевёрнутая строка</title>
	</head>
	<body>
       <?php echo "<pre>"; print_r($feedbacks);echo "</pre>";?>
        <?php if($feedbacks){ foreach($feedbacks as $feedback) :?>
            <?php foreach($feedback as $key => $value) :?>
            <div class="message">
                <?=$value?>
                <hr/>
            </div>
            <?php endforeach; ?>
        <?php endforeach;} ?>
        <div class="form">
            <?=$msg?>
            <form method="post">
                <p><b>Введите любую строку:</b></p>
                <p><textarea name="string"></textarea></p>
                <p><input type="submit"></p>
            </form>
        </div>
	</body>
</html>