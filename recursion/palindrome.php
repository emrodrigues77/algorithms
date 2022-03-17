<?php

/*
Checks a word is a palindrome
*/

class Palindrome {

    function check($word) {
        if (strlen($word) <= 1) {
            return true;
        }

        if (substr($word, 0, 1) !== substr($word, strlen($word) - 1, 1)) {
            return false;
        }

        $word = substr($word, 1, strlen($word) - 2);
        echo $word . "<br />";


        return $this->check($word);
    }
}
try {
    $solution = new Palindrome();
    echo var_dump($solution->check("abba"));
    echo var_dump($solution->check("labba"));
} catch (Error | Exception $ex) {
    var_dump($ex);
}