<?php
//Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами. Текст должен вводиться с формы.
    
include 'functions.php';
  
$bad_words = ['beach','smuck','sheet','сволочь','придурок'];

//define('PATH','C:/xampp/htdocs/php_academy/back_end/add_tasks/10/');

    $msg = requestGet('msg'); //GET['msg]
    $quantityUnicWords = 0;
    $text = '';
    if($_POST){
        if(formIsValid()){ 
            //удаляем плохие слова
            $_POST['string'] = str_ireplace($bad_words, '*****',$_POST['string']);
            $text = $_POST['string'];
            $quantityUnicWords = unicWords($_POST['string']);
        }
    }
include_once 'layout.php';
