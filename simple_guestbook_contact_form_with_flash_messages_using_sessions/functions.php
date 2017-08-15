<?php
    function requestPost($key, $default = null){
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    function requestGet($key, $default = null){
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }
               
    function formIsValid(){
        $username = requestPost('username');
        $email = requestPost('email');
        $message = requestPost('message');
            
        //logic for check form
        return (!empty($username) && !empty($email) && !empty($message));
    }

    function redirect($to){
        header("Location:{$to}");
        exit;
    }

    function setFlash($message){
        $_SESSION['message'] = $message;
    }
    
    function getFlash($message){
        if(empty($_SESSION['message'])) return null;
        
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
        return $message;
    }
?>