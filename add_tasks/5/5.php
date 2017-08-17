<?php
//5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.  Директория и искомое слово задаются как параметры функции.
//$path = 'C:\xampp\htdocs\php_academy\back_end\add_tasks\5';
$path = __DIR__;
$search_word = 'hello';
function findWord($file, $search_word){
    if(is_file($file)){
        //получаем массив строк
        $lines = file("$file");
        
        foreach($lines as $key => $value){
            $not_need = [',','.',':','\'','"','/','-','\\','?','!','\"',';'];
                
            //убираем из текста строки все лишние символы
            $arr_words = str_replace($not_need,'',explode(" ",$value));
            
            //проверяем на наличие искомого слова в файле
            foreach($arr_words as $word){
                $word = trim($word);
                if($word === $search_word){
                    return true;
                }
            }
        }
        //слово не нашли
        return false;
    }
}

function listOfFilesFindWords($dir, $word){
    $names = scandir($dir);
    $files = array();
        
    //отбираем только файлы
    foreach($names as $name){
        if(is_file($dir.'\\'.$name)){
            $files[] = $name; 
        }
    }
    
    //выводим список файлов содержащих слово
    foreach($files as $file){
        if(findWord($dir.'\\'.$file, $word)){
            echo $file."<br>";    
        }
    }
}

function listOfFiles($dir){
    $names = scandir($dir);
    $files = array();
    
//    echo "<pre>";
//    print_r($names);
//    echo "</pre>";
    
    //отбираем только файлы
    foreach($names as $name){
        if(is_file($dir.'\\'.$name)){
            $files[] = $name; 
        }
    }
    
    //выводим на экран список файлов
    foreach($files as $file){
        echo $file."<br>";
    }
}

echo "<hr><h1>All files</h1>";
listOfFiles($path);

echo "<hr><h1>Files with search word</h1>";
listOfFilesFindWords($path, $search_word);
?>