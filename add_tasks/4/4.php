<?php
//4. Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.

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


listOfFiles('C:\xampp\htdocs\php_academy\back_end\add_tasks');

?>