<?php
// Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
    
include 'functions.php';
header('Content-Type: text/html; charset=utf-8');

$bad_words = ['beach','smuck','sheet','сука','сволочь','придурок'];

define('PATH',__DIR__);

    $msg = requestGet('msg'); //GET['msg]

    if($_POST){
        if(formIsValid()){
            
            //удаляем плохие слова
            $_POST['string'] = str_ireplace($bad_words, '*****',$_POST['string']);
            
            //удаляем теги из сообщения кроме <b>
            $_POST['string'] = strip_tags($_POST['string'],'<b>');
            
            //переворачиваем все слова в строках
            $strings =[];
            $rev_strings ='';
            $strings = explode(PHP_EOL,$_POST['string']);
            foreach($strings as $string){
                $rev_strings.= " ".revertString($string);   
            }
            
            $_POST['string'] = mb_convert_encoding(trim($rev_strings), "UTF-8");
            //$feedback = serialize(base64_encode($_POST['string']));
            $feedback = json_encode($_POST, JSON_UNESCAPED_UNICODE);
            
            $res = file_put_contents('string.txt',$feedback . PHP_EOL,FILE_APPEND);
            $res = mb_convert_encoding($res, 'utf-8');
            
            $msg = "String revert";
            //redirect to same page - GET
            $my_redirection = str_replace('C:\xampp\htdocs','',__FILE__);
            $my_redirection = str_replace('\\','/',$my_redirection);
            redirect($my_redirection."?msg = {$msg}");
            exit;
            }
        $msg = "form was submitted - invalid";
    }
$feedbacks = [];
if(file_exists(PATH.'\string.txt')){
    $str_arr = file('string.txt');
    
    foreach($str_arr as $str){
        $feedbacks[] = json_decode($str,true);    
    }
}

include 'layout.php';
