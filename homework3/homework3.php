<?php
/* 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка. */
echo "Задание №1 по уроку 3<br><br>";

$a = 0;
while ($a <= 100) {
    if ($a % 3 === 0) {
        echo $a . ' | ';
    }
    $a++;
}


/* 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число. */
echo "<br><br>Задание №2 по уроку 3<br><br>";

function output_numbers($num_start, $num_end)
{
    do {
        if ($num_start === 0) {
            echo "{$num_start} – ноль. <br>";
        } elseif ($num_start & 1) {
            echo "{$num_start} – нечетное число. <br>";
        } else {
            echo "{$num_start} – четное число. <br>";
        }
        $num_start++;
    } while ($num_start <= $num_end);
    return;
}

output_numbers(0, 10);


/* 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений
– массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru) */
echo "<br><br>Задание №3 по уроку 3<br><br>";

$city_list = [
    'Московская' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская' => ['Рязань', 'Шилово', 'Скопин']
];

function output_city(array $city_list)
{
    $result = '';
    foreach ($city_list as $region => $cities) {
        $result_cities = '';
        if (is_array($cities)) {
            foreach ($cities as $city) {
                $result_cities .= ((empty($result_cities)) ? "{$city}" : ", {$city}");
            }
        } elseif (isset($cities)) {
            $result_cities .= "{$cities}";
        }
        if (!empty($result_cities)) {
            $result .= "<b>{$region} область:</b> <br> {$result_cities}.<br>";
        }
    }
    return $result;
}

echo output_city($city_list);


/* 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские
буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк. */
echo "<br><br>Задание №4 по уроку 3<br><br>";

$letters_for_translate = [
    'а' => 'a', 'к' => 'k', 'х' => 'kh',
    'б' => 'b', 'л' => 'l', 'ц' => 'ts',
    'в' => 'v', 'м' => 'm', 'ч' => 'ch',
    'г' => 'g', 'н' => 'n', 'ш' => 'sh',
    'д' => 'd', 'о' => 'o', 'щ' => 'shch',
    'е' => 'ye', 'п' => 'p', 'ъ' => '',
    'ё' => 'ye', 'р' => 'r', 'ы' => 'y',
    'ж' => 'zh', 'с' => 's', 'ь' => '',
    'з' => 'z', 'т' => 't', 'э' => 'e',
    'и' => 'i', 'у' => 'u', 'ю' => 'yu',
    'й' => 'y', 'ф' => 'f', 'я' => 'ya',
];

$text = '! Привет мир !';

function translate($text, $letters_template)
{
    $words_result = '';
    $letter = '';
    $letter_lower = '';
    for ($i = 0; $i <= mb_strlen($text); $i++) {
        $letter = mb_substr($text, $i, 1);
        $letter_lower = mb_strtolower($letter);
        if (array_key_exists($letter_lower, $letters_template)) {
            $words_result .= (($letter_lower == $letter) ?
                $letters_template[$letter_lower] : mb_strtoupper($letters_template[$letter_lower]));
        } else {
            $words_result .= $letter;
        }
    }
    return $words_result;
}

echo translate($text, $letters_for_translate);


/* 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку. */
echo "<br><br>Задание №5 по уроку 3<br><br>";

function replace_text($text)
{
    $words = [];
    $words = explode(' ', $text);
    return implode('_', $words);
}

echo replace_text($text);


/* 6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP. Необходимо представить
 пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю?
 Попробовать его реализовать. */
echo "<br><br>Задание №6 по уроку 3 по ссылке <a href=\"homework3_6.php\">homework3_6</a><br><br>";


/* 7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
for (…){ // здесь пусто} */
echo "<br><br>Задание №7 по уроку 3<br><br>";

for ($i = 0; $i <= 9; print "{$i} | ", $i++) {
};


/* 8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К». */
echo "<br><br>Задание №8 по уроку 3<br><br>";

function output_city_k(array $city_list)
{
    $result = '';
    foreach ($city_list as $region => $cities) {
        $result_cities = '';
        $letter = '';
        if (is_array($cities)) {
            foreach ($cities as $city) {
                $letter = mb_strtoupper(mb_substr($city, 0, 1));
                if ($letter === 'К') {
                    $result_cities .= ((empty($result_cities)) ? "{$city}" : ", {$city}");
                }
            }
        } elseif (isset($cities)) {
            $letter = mb_strtoupper(mb_substr($cities, 0, 1));
            if ($letter === 'К') {
                $result_cities .= "{$cities}";
            }
        }

        if (!empty($result_cities)) {
            $result .= "<b>{$region} область:</b> <br> {$result_cities}.<br>";
        }
    }
    return $result;
}

echo output_city_k($city_list);


/* 9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит
транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов
на основе названия статьи в блогах). */
echo "<br><br>Задание №9 по уроку 3<br><br>";

function translate_replace($text, $letters_template)
{
    $result = '';
    $result = translate($text, $letters_template);
    $result = replace_text($result);
    return $result;
}

echo translate_replace($text, $letters_for_translate);