<?php

$color_words = ['red', 'blue', 'green', 'yellow', 'lime', 'magenta', 'black', 'gold', 'gray', 'tomato'];

$result = [];

foreach (range(0, 24) as $index) {
    $word = array_rand($color_words);
    $color = array_rand($color_words);

    while ($word == $color) { $color = array_rand($color_words); }

    $result[] = [
        'word' => $color_words[$word],
        'color' => $color_words[$color],
    ];
}

$word_in_row = 0;

foreach ($result as $color_word) {
    echo '<span style="color:'.$color_word['color'].'">'.$color_word['word'].'</span> ';
    
    if ($word_in_row == 5) {
        $word_in_row = 0;
        echo '</br>';
    }

    $word_in_row++;
}