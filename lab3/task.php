<!-- Запись в файл. 
Пусть в корне вашего сайта лежит файл test.txt. 
Запишите в него текст '12345'. -->
<?php
file_put_contents('test.txt', '12345');
echo "Данные записаны.";
?>


<!-- Запись и чтение из файла. Пусть в корне вашего сайта лежит файл test.txt, 
в котором записано некоторое число. 
Откройте этот файл, возведите число в квадрат и запишите обратно в файл. -->
<?php
$file='test.txt';
$num=file_get_contents($file);
$sq_num=$num**2;
file_put_contents('$file', '$sq_num');
?>

<!-- Копия файла. Пусть в корне вашего сайта лежит файл test.txt. 
Скопируйте его в файл copy.txt. -->
<?php
$sourceFile = 'test.txt';
$destinationFile = 'copy.txt';

$content = file_get_contents($sourceFile);
$bytesWritten = file_put_contents($destinationFile, $content);
?>



<!-- Определение размера файла. 
Положите в корень вашего сайта какую-нибудь картинку размером более мегабайта.
Узнайте размер этого файла и переведите его в мегабайты. -->
<?php
$filename = 'image.png';
$sizeBytes = filesize($filename);
$sizeMB = round($sizeBytes / 1048576, 2);
echo "Размер файла: " . $sizeMB . " МБ";
?>

<!-- Переименовывание файлов. 
Пусть в корне вашего сайта лежит файл old.txt.
Переименуйте его на new.txt. -->

<?php
$oldName = 'old.txt';
$newName = 'new.txt';
if (rename($oldName, $newName)) {
    echo "Файл успешно переименован из $oldName в $newName.";
} else {
    echo "Ошибка при переименовании файла.";
}
?>