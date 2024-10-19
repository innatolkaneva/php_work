<?php
//Реализовать основные 4 арифметические
//операции в виде функции с тремя параметрами – два параметра это числа, третий – операция.
//Обязательно использовать оператор return.
function add($a, $b, $operation){
    if ($operation == "add") {
        return $a + $b;
    }
}
function sub($a, $b, $operation){
    if ($operation == "sub") {
        return $a - $b;
    }
}
function mul($a, $b, $operation){
    if ($operation == "mul") {
        return $a * $b;
    }
}
function div($a, $b, $operation){
    if ($operation == "div") {
        return $a / $b;
    }
}
//Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
//где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
//В зависимости от переданного значения операции выполнить одну из арифметических операций
//(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
function mathOperation($a, $b, $operation){
    switch ($operation){
        case "add":
            return add($a, $b, $operation);
            break;
            case "sub":
                return sub($a, $b, $operation);
                break;
                case "mul":
                    return mul($a, $b, $operation);
                    break;
                    case "div":
                        return div($a, $b, $operation);
                        break;
        default:
            return null;
    }
}
echo mathOperation(5,5, "add");
//Объявить массив, в котором в качестве ключей будут использоваться названия областей,
//а в качестве значений – массивы с названиями городов из соответствующей области.
//Вывести в цикле значения массива, чтобы результат был таким:
//Московская область: Москва, Зеленоград, Клин
//Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт
//Рязанская область … (названия городов можно найти на maps.yandex.ru).
$arr_city = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин',
        'Дмитров'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт'
    ],
    'Белгородская область' => [
        'Белгород',
        'Старый Оскол',
        'Губкин',
        'Шебекино'
    ],
];
foreach ($arr_city as $region => $arr) {
    echo  $region . ": ";
    foreach ($arr as $city) {
        if ($city != end($arr)){
            echo $city . ", ";
        }
        else{
            echo $city . PHP_EOL;
        }
    }
}

//Объявить массив, индексами которого являются буквы русского языка,
//а значениями – соответствующие латинские
//буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.
$alfabet = [
    'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
];

function transletiration($text, $alfabet)
{
    $textTranslate = [];
   for ($i=0; $i < strlen($text); $i++) {
       $simbol = mb_substr($text, $i, 1);
       if (array_key_exists($simbol, $alfabet)) {
       $simbolNew = $alfabet[$simbol];
       array_push($textTranslate, $simbolNew);
       }
       else{
           array_push($textTranslate, $simbol);
       }
   }
    return implode($textTranslate);
}
$text = 'ПривеТ тебе, человек';
$text = mb_strtolower($text);
echo transletiration($text, $alfabet);