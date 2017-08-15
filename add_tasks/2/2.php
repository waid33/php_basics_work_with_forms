<?php
/*
2. Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.
*/
global $error;
$error = '';

function requestPost($key){
     return isset($_POST[$key]) ? $_POST[$key] : null;
    }

function isValidForm(){
    $words = requestPost('words');
    
    if(!empty($words)){
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

function topThreeWords($a){
    $top = [];
    $tmp_arr = [];
    $max_leng = 0;
    if(is_string($a)){
         $arr1 = strConvertToArr($a);
        
        //выполняем поиск 3 слов
        $top = [];
        $tmp_arr = [];
        $max_leng = 0;
        $arr1 = ['str','stri','string','strin',];
            
        for($i = 0; $i < 3; $i++){
            //Находим самое длинное слово
            foreach($arr1 as $value){
                if(strlen($value) > $max_leng){
                    $max_leng = strlen($value);
                    if(count($tmp_arr) > 0){
                        array_pop($tmp_arr);
                        array_values($tmp_arr);
                    }
                    $tmp_arr[] = $value;
                }
            }
            $top[] = $tmp_arr[0];
            //удаляем найденное слово из исходного массива
            foreach($arr1 as $key => $value){
                if($tmp_arr[0] == $value){
                    unset($arr1[$key]);
                    array_values($arr1);
                    
                    echo "<pre>";
                    print_r($arr1);
                    echo "</pre>";
                }
            }
        }
        return $top;
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
        $arr = topThreeWords("words");
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
		<title>Вывод трёх самых длинных слов</title>
	</head>
	<body>
    <h1></h1>
    <form action="2.php" method="post">
        <p><b>Введете любые слова через запятую:</b></p>
        <p><textarea rows="10" cols="45" name="words" value="<?=requestPost('words')?>" placeholder="Some words"></textarea></p>
        <p><input type="submit" value="Отправить"></p>
    </form>
        <hr>
        3 самых больших введённых слова: <?=$result?>
    </body>
</html>
