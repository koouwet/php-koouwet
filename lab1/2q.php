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
    // Арифметические операции. Дано: $a = 27; $b = 12; Найти: Значение другого катета с точностью до двух знаков после запятой
    $a = 27;
    $b = 23;

    $a_2=pow($a,2);
    $b_2=pow($b,2);

    $c=abs(pow($a_2-$b_2,1/2));
    echo "Катет_с: " . $c . "<br>";

    $cosC=(pow($a,2)+pow($b,2)-pow($c,2))/(2*$b*$a);
    echo "Угол_с: " . acos($cosC) . "<br>";


    ?>
    
</body>
</html>