
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<link rel ="stylesheet" type="text/css" href="css/style.css">
        <title>Гостевая книга</title>
	</head>
	<body>
       
        <?php if(isset($feedbacks)){ foreach($feedbacks as $feedback) :?>
        <div class="message">
            <?=$feedback['username']?>(<?=$feedback['email']?>)
            <br>
            <?=$feedback['comment']?>
            <hr/>
        </div>
        <?php endforeach;} ?>
        <div class="form">
            <form method="post">
                <p>Username<input type="text" name="username" id="username" value="<?=requestPost('username')?>"><br/></p>
                <p>Email<input type="text" name="email" id="email" value="<?=requestPost('email')?>"><br/></p>
                <p><b>Введите ваш отзыв:</b></p>
                <p><textarea name="comment"></textarea></p>
                <p><input type="submit"></p>
            </form>
        </div>
	</body>
</html>