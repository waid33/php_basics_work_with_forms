<?php
//3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов. Значение N задавать через форму. Проверить работу на кириллических строках - найти ошибку, найти решение.
$text = 
'Воспитанные люди, по моему мнению, должны удовлетворять следующим условиям: …Они уважают человеческую личность, а потому всегда снисходительны, мягки, вежливы, уступчивы… Они сострадательны не к одним только нищим и кошкам. Они болеют душой и оттого, чего не увидишь простым глазом… Они чистосердечны и боятся лжи, как огня. Не лгут они даже в пустяках. Ложь оскорбительна для слушателя и опошляет его в глазах говорящего. Они не рисуются, держат себя на улице так же, как дома, не пускают пыль в глаза меньшей братии… Они не болтливы и не лезут с откровенностями, когда их не спрашивают… Из уважения к чужим ушам, они чаще молчат… Они не уничижают себя с тою целью, чтобы вызвать в другом сочувствие. Они не играют на струнах чужих душ, чтобы в ответ им вздыхали и нянчились с ними… Они не суетны… Истинные таланты всегда сидят в потемках, в толпе, подальше от выставки… Таковы воспитанные… Чтобы воспитаться, нужны беспрерывный дневной и ночной труд, вечное чтение, штудировка, воля… Тут дорог каждый час… ';


$text_edited ='';
include('functions.php');
 
if($_POST){
    if(formIsValid()){
        
        //ограничение длинны слов
        $len = $_POST['length'];

        if(file_exists('some_text.txt')){
            $arr = file('some_text.txt');
            
            foreach($arr as $key => $value){
                $not_need = [',','.',':','\'','"','/','-','\\','?','!'];
                
                //убираем из текста строки все лишние символы
                $arr_words = str_replace($not_need,'',explode(" ",$value));
                                                    
                //убираем из текста строки слова длиннее $len
                foreach($arr_words as $key => $word){
                    if(mb_strlen($word) > $len){
                        unset($arr_words[$key]);
                    }
                }

                //сохраняем редактированный текст
                $text_edited.= implode(' ',$arr_words);
            }

            // открываем файл, если файл не существует,
            //делается попытка создать его
            $fp = fopen("some_text.txt", "w");

            // записываем в файл текст
            fwrite($fp, $text_edited);

            // закрываем
            fclose($fp);    
        }else{
            // открываем файл, если файл не существует,
        //делается попытка создать его
            $fp = fopen("some_text.txt", "w");

        // записываем в файл текст
        fwrite($fp, $text);

        // закрываем
        fclose($fp);
        }
    }else{
        echo "Форма не валидна";
    }
}else{
    echo "Форма не была отправлена";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<title>Форма фильтрации файла</title>
	</head>
	<body>
        <form method="post">
            <label for="length">Введите ограничение на длинну слов </label><br/><br/>
            <input type="text" name="length" id="length" value="<?=requestPost('length')?>"><br/>
            <button>Go</button>
        </form>

        <hr>
        <p><b>Текст изначальный</b></p>
        <?=$text?>
        <hr>
        <p><b>Текст отфильтрованный</b></p>
        <?=$text_edited?>
    </body>
</html>