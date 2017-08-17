<?php
// Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем. Реализовать проверку на наличие в тексте запрещенных слов, матов. При наличии таких слов - выводить сообщение "Некорректный комментарий". Реализовать удаление из комментария всех тегов, кроме тега <b>.
    
require 'functions.php';
global $msg;
$bad_words = ['beach','smuck','sheet','сука','сволочь','придурок'];

define('PATH', __DIR__);

$warning = '';

    $msg=requestGet('msg'); //GET['msg]

    if($_POST){
        if(formIsValid()){
            
            //удаляем плохие слова
            $_POST['comment'] = str_ireplace($bad_words, '*****',$_POST['comment']);
            
            //удаляем теги из сообщения кроме <b>
            $_POST['comment'] = strip_tags($_POST['comment'],'<b>');
            $feedback = serialize($_POST);
            $res = file_put_contents('comments.txt',$feedback . PHP_EOL,FILE_APPEND);
            
            $msg = "Message saved";
            
            //проверяем форму на корректность
            if(strstr($_POST['comment'], '*****')){
                $msg = "Comment is not correct";
            }
            
            //redirect to same page - GET
            $my_redirection = str_replace('C:\xampp\htdocs','',__FILE__);
            $my_redirection = str_replace('\\','/',$my_redirection);
            
            redirect($my_redirection."?msg={$msg}");
            exit;
        }
                $msg = "form was submitted - invalid";
    }
$feedbacks = [];
if(file_exists(PATH.'\comments.txt')){
    $serializedFeedbacks = file('comments.txt');
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

require 'layout.php';
