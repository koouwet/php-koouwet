<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Мирешкина Дарья</h1>
    <?php
    $array = ['a', 'b', 'c', 'b', 'a'];
    $counts = array_count_values($array);

    print_r($counts);
    ?>
</body>
</html>
