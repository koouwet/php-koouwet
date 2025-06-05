<?php
if (isset($_GET['expression'])) {
    $expression = $_GET['expression'];

    $expression = str_replace(" ", "", $expression);
    $expression = str_replace("--", "+", $expression);

    function evaluate($expr) {
        return calculate($expr, 0, strlen($expr) - 1);
    }

    function calculate($expr, $start, $end) {
        $num = 0;
        $op = '+';
        $stack = [];
        $i = $start;

        while ($i <= $end) {
            $ch = $expr[$i];

            if (is_numeric($ch)) {
                $num = $num * 10 + (int)$ch;
            } elseif ($ch == '(') {
                $openCount = 1;
                $subStart = $i + 1;
                $subEnd = $i + 1;
                while ($openCount > 0) {
                    if ($expr[$subEnd] == '(') $openCount++;
                    elseif ($expr[$subEnd] == ')') $openCount--;
                    $subEnd++;
                }
                $subExpr = substr($expr, $subStart, $subEnd - $subStart - 1);
                $num = calculate($subExpr, 0, strlen($subExpr) - 1);
                $i = $subEnd - 1;
            }

            if ($i == $end || in_array($expr[$i], ['+', '-', '*', '/'])) {
                if ($op == '+') {
                    array_push($stack, $num);
                } elseif ($op == '-') {
                    array_push($stack, -$num);
                } elseif ($op == '*') {
                    $stack[count($stack) - 1] *= $num;
                } elseif ($op == '/') {
                    if ($num == 0) return json_encode(['result' => 'Ошибка: деление на ноль']);
                    $stack[count($stack) - 1] /= $num;
                }

                $op = $expr[$i];
                $num = 0;
            }

            $i++;
        }

        echo json_encode(['result' => array_sum($stack)]);
        exit;
    }

    evaluate($expression);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="calculator">
        <div id="display"></div>
        <div class="buttons">
            <button onclick="append('cos')">cos</button>
            <button onclick="append('sin')">sin</button>
            <button onclick="append('tg')">tg</button>
            <button onclick="append('ctg')">ctg</button>

            <button onclick="append('7')">7</button>
            <button onclick="append('8')">8</button>
            <button onclick="append('9')">9</button>
            <button onclick="append('/')">/</button>

            <button onclick="append('4')">4</button>
            <button onclick="append('5')">5</button>
            <button onclick="append('6')">6</button>
            <button onclick="append('*')">*</button>

            <button onclick="append('1')">1</button>
            <button onclick="append('2')">2</button>
            <button onclick="append('3')">3</button>
            <button onclick="append('-')">-</button>

            <button onclick="append('(')">(</button>
            <button onclick="append('0')">0</button>
            <button onclick="append(')')">)</button>
            <button onclick="append('+')">+</button>

            <button class="clearBtn" onclick="clearDisplay()">C</button>
            <button class="equallyBtn" onclick="calculate()">=</button>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>