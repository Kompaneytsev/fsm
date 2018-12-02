<?php

/**
 * Return first word and sentence without this word
 * 
 * @param string $sentence
 * @return array
 */
function extractFirstWord(string $sentence) {
    if ($sentence === '') return ['', ''];
    return [
        $word = explode(' ', $sentence)[0],
        substr($sentence, mb_strlen($word) + 1)
    ];
}
