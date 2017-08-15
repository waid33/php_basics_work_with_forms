<?php
//6. Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
include "functions.php";

global $path;
//$path = "C:\\xampp\\htdocs\\php_academy\\back_end\\add_tasks\\6\\gallery\\";
$path = "gallery\\";
$i = 0;

if(isset($_FILES['photo'])){
    if($_FILES['photo']['error'] == 0 && $_FILES['photo']['size'] > 0){
        $uploadfile = $path;
        $uploadfile.=basename($_FILES['photo']['name']);
        
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)){
            echo "File is uploaded";
        }else{
            echo "Error in upload";
        }
    }else{
        echo "Error in upload2";   
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset = utf-8">
		<link rel ="stylesheet" type="text/css" href="css/style.css">
        <title>Фотогалерея</title>
	</head>
	<body>
        <div class="form">
            <form enctype="multipart/form-data" action="6.php" method="POST">
                <!-- Название элемента input определяет имя в массиве $_FILES -->
                Загрузить фотографию:<br> <input name="photo" type="file" /><br><br>
                <input type="submit" value="Send photo" />
            </form>
        </div>
            <!-- отображение будет тут-->
        <table>
            <?php 
            foreach(listOfFiles($path) as $value){
                if($i===0 || $i%3===0)echo "<tr>";
                echo "<td>";    
                echo "<img src='".$path.$value."' height='200' width='150' alt='Photo'>";
                echo "</td>";
                if($i===0 || $i%3===0)echo "</td>"; 
                $i++;
            }
            ?>
        </table>
	</body>
</html>