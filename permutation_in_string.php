<?php

/*
Given two strings s1 and s2, return true if s2 contains a permutation of s1, or false otherwise.
In other words, return true if one of s1's permutations is the substring of s2.

Example 1:
Input: s1 = "ab", s2 = "eidbaooo"
Output: true
Explanation: s2 contains one permutation of s1 ("ba").

Example 2:
Input: s1 = "ab", s2 = "eidboaoo"
Output: false

Constraints:
    1 <= s1.length, s2.length <= 104
    s1 and s2 consist of lowercase English letters.
*/
class Solution {

    /**
     * @param String $s1
     * @param String $s2
     * @return Boolean
     */
    function checkInclusion($s1, $s2) {

        $s1Lenght = strlen($s1);
        echo "$s1 $s2 <br />";
        $s1Map = $this->getMap($s1, $s1Lenght);
        $s2Map = $this->getMap($s2, $s1Lenght);
        echo "<hr />";

        for ($i = 0; $i < (strlen($s2) - $s1Lenght + 1); $i++) {

            echo $s2[$i] . " " . $s2[$i + $s1Lenght] . "<br />";
            echo implode(" ", $s1Map) . "<br />";
            echo implode(" ", $s2Map) . "<br />";

            if ($s1Map == $s2Map) {
                echo implode(" ", $s1Map) . "<br />";
                echo implode(" ", $s2Map) . "<br />";
                echo "<hr />";
                return true;
            }

            --$s2Map[ord($s2[$i]) - ord('a')];
            ++$s2Map[ord($s2[$i + $s1Lenght]) - ord('a')];
            echo implode(" ", $s1Map) . "<br />";
            echo implode(" ", $s2Map) . "<br />";
            echo "<hr />";
        }

        return false;
    }

    function getMap($s, $l) {
        $count = array_fill(0, 26, 0);

        for ($i = 0; $i < $l; $i++) {
            $index = ord($s[$i]) - ord('a');
            $count[$index] += 1;
        }

        echo implode(" ", $count) . "<br />";

        return $count;
    }
}

$solution = new Solution();
echo var_dump($solution->checkInclusion("adc", "dcda"));
echo "<br />";
echo var_dump($solution->checkInclusion("hello", "ooolleoooleh"));
echo "<br />";