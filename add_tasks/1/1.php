<?php
/*
1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые есть и в первом и во втором поле ввода.
Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами.
*/
global $error;
$error = '';

function requestPost($key){
     return isset($_POST[$key]) ? $_POST[$key] : null;
    }

function isValidForm(){
    $text1 = requestPost('text1');
    $text2 = requestPost('text2');
    
    if(!empty($text1) && !empty($text1)){
        return true;        
    }else{
        $error = "Error: Some of your needed data is empty";
        return false;
    }
}

function strConvertToArr($clu){
    $arr = explode(',', requestPost("$clu"));
    return $arr;
}

function getCommonWords($a, $b){
    if(is_string($a) && is_string($b)){
        $arr1 = strConvertToArr($a);
        $arr2 = strConvertToArr($b);
        $common = [];
        
        foreach($arr1 as $value1){
            foreach($arr2 as $value2){
                if($value1 === $value2){
                    $common[] = $value1;
                }
            }
        }
        
        return $common;
    }else{
        //Переданы не строки
        return false;
    }
}

//logic
$result ='';

if($_POST){
   //form was submitted
    if(isValidForm()){
        $arr = getCommonWords("text1", "text2");
        
        $result = join('<br>', $arr);
        
    }else{
        //форма была отправлена но она не валидна
       
    }

}else{
    // form was not submitted
    echo "Form was not submitted";
}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<title>Поиск общих слов</title>
	</head>
	<body>
    <h1></h1>
    <form action="1.php" method="post">
        <p><b>Введете любые слова через запятую:</b></p>
        <p><textarea rows="10" cols="45" name="text1" value="<?=requestPost('text1')?>" placeholder="Some words"></textarea></p>
        <p><textarea rows="10" cols="45" name="text2" value="<?=requestPost('text2')?>" placeholder="Some words"></textarea></p>
        <p><input type="submit" value="Отправить"></p>
    </form>
        <hr>
        <p>Совпадения слов:</p>
        <p><?=$result?></p>
    </body>
</html>
