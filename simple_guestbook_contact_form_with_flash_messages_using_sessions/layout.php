<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<title>Title</title>
		 <link href="css/style.css" rel="stylesheet">
	</head>
	<body>
        <div class='form'>
            <h1>Contact us</h1>
            <?=$msg?>
            <form method="post" class="reg-form">
                <div class="form-row">
                    Username<input type="text" name="username" id="username" value="<?=requestPost('username')?>">
                </div>
                <div class="form-row">
                    Email<input type="text" name="email" id="email" value="<?=requestPost('email')?>">
                </div>
                <div class="form-row">
                    Message<textarea name="message" id="message" ></textarea>
                </div>
                <div class="form-row">
                    <input type="submit" value="Отправить" />
                </div>
            </form>
        </div>
        
        <p>Сортировка по времени <a href= "<?="/php_academy/back_end/home_work/home_work_07_08_2017_contact_form_with_flash_messages_using_sessions/?sort=ASC"?>">возрастанию</a></p>
        <p>Сортировка по времени <a href= "<?="/php_academy/back_end/home_work/home_work_07_08_2017_contact_form_with_flash_messages_using_sessions/?sort=DESC"?>">убыванию</a></p>

        <hr>
        <?php if(count($feedbacks) > 0):?>
            <?php foreach($feedbacks as $feedback) :?>
            <b><?=$feedback['date']?></b><br><br>
                <?=$feedback['username']?>(<?=$feedback['email']?>)
                <br>
                <?=$feedback['message']?>
                <hr/>
            <?php endforeach; ?>
        <?php endif;?>
    </body>
</html>