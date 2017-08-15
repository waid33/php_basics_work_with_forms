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
        $comment = requestPost('comment');
            
        //logic for check form
        return (!empty($username) && !empty($email) && !empty($comment));
    }

    function redirect($to){
        header("Location:{$to}");
        exit;
    } 