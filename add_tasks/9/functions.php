<?php
    function requestPost($key, $default = null){
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    function requestGet($key, $default = null){
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    function formIsValid(){
        $string = requestPost('string');
            
        //logic for check form
        return (!empty($string));
    }

    function redirect($to){
        header("Location:{$to}");
        exit;
    } 
    
    function strConvertToArr($clu){
        $arr = explode(' ', requestPost("$clu"));
        return $arr;
    }

    function getCommon($a, $b){
        if(!is_array($a)){
             $a = strConvertToArr($a);
        }
        if(!is_array($b)){
             $b = strConvertToArr($b);
        }
        $common = [];
        foreach($arr1 as $value1){
            foreach($b as $value2){
                if($value1 === $value2){
                    $common[] = $value1;
                }
            }
        }
        if(count($common) > 0){
            return true;    
        }
        return false;
    }

    function revertString($str){
        $rev_str ='';
        for($i = mb_strlen($str)-1; $i >= 0; $i--){
            $rev_str.= $str{$i}; 
        }
        $rev_str = "$rev_str";
        return $rev_str;
    }