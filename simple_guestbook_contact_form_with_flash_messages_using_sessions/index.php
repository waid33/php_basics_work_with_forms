<?php
session_start();
include 'functions.php';    

$words = ['beach','smuck','sheet'];
//$uri = "/php_academy/back_end/home_work/home_work_07_08_2017_contact_form_with_flash_messages_using_sessions/";
//redirect to same page - GET
$uri = str_replace('C:\xampp\htdocs','',__FILE__);
$uri = str_replace('\\','/',$uri);    
                
//$path ='C:\xampp\htdocs\php_academy\back_end\home_work\home_work_07_08_2017_contact_form_with_flash_messages_using_sessions\\';
$path = __DIR__."\\";
$msg = getFlash('msg');

    if($_POST){
        if(formIsValid()){
            $_POST['message'] = str_ireplace($words, '*****',$_POST['message']);
            $_POST['date'] = date("Y-m-d H:i:s");
            $feedback = serialize($_POST);
            $res = @file_put_contents('messages.txt',$feedback . PHP_EOL,FILE_APPEND);
            
            //проверка возможности записывать в файл
            if($res === false){
                setFlash('Error: write to file is forbidden');
                 redirect("$uri");
            }
            
            setFlash("Message saved");
                
            //redirect to same page with GET parameters
            redirect("$uri");   
        }
        $msg = "Form invalid";
    }

$feedbacks = [];
if(file_exists($path.'messages.txt')){
       ////первый способ
    $serializedFeedbacks = file('messages.txt');

    foreach($serializedFeedbacks as $s){
        $feedbacks[] = unserialize($s);   
    }
    
    if(count($_GET) > 0 && !empty($_GET['sort'])){
        if($_GET['sort']=='DESC'){
        function mysort($a, $b){
            if ($a['date'] == $b['date']) return 0;
               return $a['date'] < $b['date'] ? 1 : -1;
           }
    //    function mysort($a, $b) {
    //        return strtotime($b['date']) - strtotime($a['date']);
    //    }
        usort($feedbacks, 'mysort');
        }

        if($_GET['sort']=='ASC'){
           function mysort($a, $b){
            if ($a['date'] == $b['date']) return 0;
               return $a['date'] > $b['date'] ? 1 : -1;
           }
        }
        usort($feedbacks, 'mysort');
    }

    //второй способ
    //$feedbacks = file('messages.txt');
    //array_walk($feedbacks, function (&$item) {
    //  $item = unserialize($item);
    //});
}

include 'layout.php';
