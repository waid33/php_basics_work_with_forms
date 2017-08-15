<?php
// Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
    
include 'functions.php';
  
$bad_words = ['beach','smuck','sheet','сука','сволочь','придурок'];

define('PATH','C:/xampp/htdocs/php_academy/back_end/add_tasks/9/');

    $msg = requestGet('msg'); //GET['msg]

    if($_POST){
        if(formIsValid()){
            
            //удаляем плохие слова
            $_POST['string'] = str_ireplace($bad_words, '*****',$_POST['string']);
            
            //удаляем теги из сообщения кроме <b>
            $_POST['string'] = strip_tags($_POST['string'],'<b>');
            
            //переворачиваем все слова в строках
            $string_words =[];
            $rev_words ='';
            $string_words = explode(' ',$_POST['string']);
            foreach($string_words as $string){
                $rev_words.= " ".revertString($string);   
            }
            $_POST['string'] = trim($rev_words);
            
            $feedback = serialize($_POST);
            $res = file_put_contents('string.txt',$feedback . PHP_EOL,FILE_APPEND);
            
            $msg = "String revert";
            //redirect to same page - GET
            redirect("/php_academy/back_end/add_tasks/9/9.php?msg = {$msg}");
            }
        $msg = "form was submitted - invalid";
    }
if(file_exists(PATH.'string.txt')){
    $feedbacks = [];
    $serializedFeedbacks = file('string.txt');
    //первый способ
    foreach($serializedFeedbacks as $s){
        $feedbacks[] = unserialize($s);
    }

    //второй способ
    //$feedbacks = file('messages.txt');
    //array_walk($feedbacks, function (&$item) {
    //  $item = unserialize($item);
    //});
}


include_once 'layout.php';
