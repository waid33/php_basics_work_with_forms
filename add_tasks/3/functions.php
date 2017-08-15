<?php
    function requestPost($key, $default = null){
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    function requestGet($key, $default = null){
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }
               
    function formIsValid(){
        $length = requestPost('length');
            
        //logic for check form
        return (!empty($length) && is_numeric($length));
    }

//    function redirect($to){
//        header("Location:{$to}");
//        exit;
//    }
?>