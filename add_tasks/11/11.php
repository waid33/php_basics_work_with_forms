<?php
/*11. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что каждое новое предложение начиняется с большой буквы.
Пример:

Входная строка: 'а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';

Строка, возвращенная функцией : 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался.А там хоть трава не расти.';
*/
    
include 'functions.php';
  
$bad_words = ['beach','smuck','sheet','сволочь','придурок'];

//устанавливаем русскую локаль
setlocale(LC_ALL, 'ru_RU.UTF-8');

    $msg = requestGet('msg'); //GET['msg]
    $quantityUnicWords = 0;
    $text = '';
    if($_POST){
        if(formIsValid()){ 
            //удаляем плохие слова
            $_POST['string'] = str_ireplace($bad_words, '*****',$_POST['string']);
            
            $text ='';
            $text = convertTextToRightWay($_POST['string']);
        }
    }
include_once 'layout.php';
