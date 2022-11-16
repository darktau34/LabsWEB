<?php
session_start();

if(isset($_GET['preset'])){
    $path = $_SERVER['DOCUMENT_ROOT'] . '/LR4/presets/lr4_[preset_name].html';
    $preset = $_GET['preset'];

    $path = preg_replace('/\[preset_name\]/', $preset, $path);

    if(file_exists($path)){
        $content = file_get_contents($path);
        $_POST['text'] = $content;
    }else{
        echo 'Такого пресета не существует';

    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['text'])){
        $checkbox5 = $checkbox9 = $checkbox17 = 0;
        if(!empty($_POST['checkbox5'])){
            $checkbox5 = $_POST['checkbox5'];
        }
        if(!empty($_POST['checkbox9'])){
            $checkbox9 = $_POST['checkbox9'];
        }
        if(!empty($_POST['checkbox17'])){
            $checkbox17 = $_POST['checkbox17'];
        }

        $content = $_POST['text'];

        $task = [];
        $task['header'] = '<h2>Решение задач:</h2>';
        if($checkbox5){
            $task['task5'] = '<br>' . '<b>Задача №5:</b>' . '<br>' . task5($content);
        }
        if($checkbox9){
            $task['task9'] = '<br>' . '<b>Задача №9:</b>' . '<br>' . task9($content);
        }
        if($checkbox17){
            $task['task17'] = '<br>' . '<b>Задача №17:</b>' . '<br>' . task17($content);
        }

        $content = strip_tags($content, '<p><h1><h2><h3><h4><h5><style>');
        $allText = task5($content);
        $allText = task9($allText);

        $task15 = task15($allText);
        $task['task15'] = '<br>' . '<b>Задача №15:</b>' . '<br>' . $task15['list'];

        $allText = $task15['alltext'];
        $allText = task17($allText);

        $task['all_tasks'] = '<br>' . '<b>Введенный текст после преобразований:</b>' . '<br>' . $allText;


    }


}

function task5($content){
    $searchArr = [ ' - ', ' -- '];
    $replaceArr = ['&nbsp;&ndash; ', '&nbsp;&mdash; '];
    $result = str_replace($searchArr, $replaceArr, $content);
    return $result;
}

function addspace($matches){
    return $matches[0].' ';
}

function task9($content){
    $pattern1 = '/((?<=[А-Яа-яЁё])\s-(?!\s)(?!-))|((?<=[А-Яа-яЁё])-\s(?!\s)(?!-))/u'; // Удалить лишние пробелы между дефисом в местоимениях и наречиях
    $pattern2 = '/\s(?=[\.\,\:])/'; // Удаляем пробел перед . , :
    $pattern3 = '/[\.\,\:](?!\s)/'; // Добавляем пробел после этих знаков, если его нет

    $result = preg_replace($pattern1, '-', $content);
    $result = preg_replace($pattern2, '', $result);
    $result = preg_replace_callback($pattern3,'addspace' ,$result);
    return $result;
}

function preprocess_text($text, $stopwords){
    $pattern1 = '/(?<=\w)\-(?=\w)/';
    $pattern2 = '/[^А-Яа-яЁё-]+/u';
    $pattern3 = '/[^,\n\r]+/u';
    $pattern4 = "/(?<=[^-])\bслово\b(?!-)/iu";

    $result = preg_replace($pattern1, ' ', $text); # удаляю все кроме слов
    $result = preg_replace($pattern2, ' ', $result); # удаляю все кроме слов

    if(!empty($stopwords)){
        preg_match_all($pattern3, $stopwords, $matches); // выбираю только слова из стоп-слов
        foreach ($matches[0] as $match){
            $patt = preg_replace("/[А-Яа-яЁё]+/u", $match, $pattern4);
            $result = preg_replace($patt, ' ', $result);
        }
        unset($match);
    }

    return $result;
}

function text_to_arr($string, $toCount){
    $text = $string;
    $pattern1 = '/[^,\n\r\s]+/u';

    preg_match_all($pattern1, $text, $matches);
    $wordsArr = $matches[0];
    if($toCount){
        $wordsArr = array_count_values($wordsArr);
        arsort($wordsArr);
    }
    return $wordsArr;
}

function task15($content){
    $text = $content;
    $result = array('list' => '', 'alltext' => $text);

    $predlogi = file_get_contents('../txt/predlogi.txt');
    $souzi = file_get_contents('../txt/souzi.txt');


    $text_list = preprocess_text($text, $predlogi);
    $text_list = preprocess_text($text_list, $souzi);


    $wordsArr = text_to_arr($text_list, true);

    $pattern = '/\bслово\b/iu';
    $i = 1;
    foreach($wordsArr as $key => $value){
        if ($i <= 100){
            $link = '<a href="#link' . $i . '">' . $key . '</a>';
            $result['list'] .= $i . '. ' . $link . ' - ' . $value . ' раз.' . '<br>';

            $repl = '<span id=link' . $i . '>' . $key . '</span>';
            $pattern = preg_replace("/[А-Яа-яЁё-]+/u", $key, $pattern);
            $result['alltext'] = preg_replace($pattern, $repl, $result['alltext'], 1);

            $i++;
        }else{
            break;
        }
    }

    return $result;
}

function task17($content){
    $text = $content;
    $result = $content;
    $text = preprocess_text($text, null);
    $wordsArr = text_to_arr($text, false);

    $pattern = '/\bслово\b/iu';
    $keys = array_keys($wordsArr);
    $N = max($keys);
    $count = 1;

    for ($i = 0; $i < $N; $i++){
        $key = $i;
        $key1 = $key + 1;
        $value = $wordsArr[$key];

        if($value == $wordsArr[$key1]){
            while($value == $wordsArr[$key1]){
                $key1 += 1;
                $count++;
                if($key1 > $N){
                    break;
                }
            }
            $i = $key1-1;
            $pattern = preg_replace("/[А-Яа-яЁё-]+/u", $value, $pattern);
            $replace = '<span class="repeat">' . $value . '</span>';
            $result = preg_replace($pattern, $replace, $result, $count);
        }
        $count = 1;

    }

    return $result;
}