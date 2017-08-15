<?php
    function requestPost($key, $default = null){
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    function requestGet($key, $default = null){
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }
               
    function formIsValid(){
       return true;
        //logic for check form
        return (!empty($length) && is_numeric($length));
    }

    function listOfFiles($dir){
        $names = scandir($dir);
        $files = array();
        //отбираем только файлы
        foreach($names as $name){
            if(is_file($dir.'\\'.$name)){
                $files[] = $name; 
            }
        }
        return $files;
    }

//    function redirect($to){
//        header("Location:{$to}");
//        exit;
//    }
?>