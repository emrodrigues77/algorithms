<?php

class Solution {

    function encrypt($string) {
        $string = str_replace(" ", "", $string);
        $rows = ceil(sqrt(strlen($string)));
        $column = 0;
        $row = 0;
        $encryptedArray = array();


        for ($i = 0; $i < strlen($string); $i++) {
            echo "$row $column " .  substr($string, $i, 1) . "<br />";
            $encryptedArray[$row][$column] = substr($string, $i, 1);

            $row++;

            if ($row === intval($rows)) {
                $row = 0;
                $column++;
            }
        }

        return implode("", array_merge(...$encryptedArray));
    }
}

$solution = new Solution();
echo $solution->encrypt("have a nice day");