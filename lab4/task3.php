<!-- На '.', символы. Дана строка 'aba aca aea abba adca abea'. Напишите регулярку, которая найдет строки abba и abea, не захватив adca -->


<?php
$string = 'aba aca aea abba adca abea';
$pattern = '/\\bab[be]a\\b/';

preg_match_all($pattern, $string, $matches);

print_r($matches[0]);
?>