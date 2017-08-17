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

    function unicWords($str){
        $words = [];
        $unic_words = [];
        $u = 0;
        $words = explode(' ', $str);
        for($i = 0; $i < count($words);$i++){
            foreach($words as $word){
                if($words[$i]===$word) $u++;
            }
            if($u == 1){
                $unic_words[] = $words[$i];
            }
            $u=0;
        }
        return count($unic_words);
    }

    function convertTextToRightWay($text){
        //устанавливаем русскую локаль
        setlocale(LC_ALL, 'ru_RU.UTF-8');
        
        //записываем каждое предложение с большой буквы
        $text_arr = explode('.', $text);
        $new_text =[];
        $txt = '';
        
        function upFirstLetter($str, $encoding = 'UTF-8'){
            return mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding). mb_substr($str, 1, null, $encoding);
        }
        
        foreach($text_arr as $string){
            $new_text[] = upFirstLetter(trim($string));
            
        }
        
        $txt = implode('.', $new_text);
        $txt = substr( $txt, 0);
        return $txt;
    }

    function sentencesInReverseOrder($text){
        $text_arr = explode('.', $text);
        $new_text =[];
        $txt = '';
        foreach($text_arr as $text){
            $new_text[] = ucfirst(trim($text));
        }
        $txt = implode('.', array_reverse($new_text));
        return $txt;
    }

    function statisticString($text){
        $words = explode(' ', $text);
        $statistic = [];
        $u=0;
        $max= 0;
        for($i = 0; $i < count($words);$i++){
            foreach($words as $word){
                if($words[$i] == $word) $u++;
            }
            $statistic["$words[$i]"] = $u;
            $u=0;
        }
        arsort($statistic);
        return $statistic;
    }