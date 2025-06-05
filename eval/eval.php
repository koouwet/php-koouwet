<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $expression = file_get_contents(__DIR__ . '/expression.txt');

    $pattern = '/(sin|cos|tan|tg|ctg|cot)\s*\(([^)]+)\)/i';
    $expression = preg_replace_callback($pattern, function ($matches) {
        $func = strtolower($matches[1]);
        $arg = "deg2rad({$matches[2]})";

        if ($func === 'ctg' or $func === 'cot') {
            return "(cos($arg)/sin($arg))";
        } elseif ($func === 'tg'){
            return "tan($arg)";
        } else {
            return "$func($arg)";
        }
    }, $expression);

    try {
        $result = round(eval("return $expression;"),2);
        echo $result;
    } catch (Exception $error) {
        echo 'Ошибка в подсчетах .  $error';
    }
} else {
    echo 'Ошибка в запросе';
}
?>