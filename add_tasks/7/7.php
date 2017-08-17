<?php
//7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.    
include 'functions.php';
  
$bad_words = ['beach','smuck','sheet','сука','сволочь','придурок'];

define('PATH',__DIR__);

    $msg=requestGet('msg'); //GET['msg]

    if($_POST){
        if(formIsValid()){
            
            $_POST['comment'] = str_ireplace($bad_words, '*****',$_POST['comment']);
            $feedback = serialize($_POST);
            $res = file_put_contents('comments.txt',$feedback . PHP_EOL,FILE_APPEND);
            
            $msg="Message saved";
                
            //redirect to same page - GET
            $my_redirection = str_replace('C:\xampp\htdocs','',__FILE__);
            $my_redirection = str_replace('\\','/',$my_redirection);
            
            redirect($my_redirection."?msg={$msg}");
            exit;
        }
                $msg="form was submitted - invalid";
    }

$feedbacks = [];
if(file_exists(PATH.'\\'.'comments.txt')){
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

include 'layout.php';
