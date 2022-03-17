<?php

/*
 Given a string s, find the length of the longest substring without repeating characters.

Example 1:

Input: s = "abcabcbb"
Output: 3
Explanation: The answer is "abc", with the length of 3.

Example 2:

Input: s = "bbbbb"
Output: 1
Explanation: The answer is "b", with the length of 1.

Example 3:

Input: s = "pwwkew"
Output: 3
Explanation: The answer is "wke", with the length of 3.
Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.

Constraints:

    0 <= s.length <= 5 * 104
    s consists of English letters, digits, symbols and spaces.

*/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {

        $longestSub = 0;
        $currentSub = "";
        $currentI = 0;
        echo $s . "<br />";

        for ($i = 0; $i < strlen($s); $i++) {
            $char = substr($s, $i, 1);

            if (strpos($currentSub, $char, 0) === false) {
                $currentSub .= $char;
            } else {
                $currentSub = "";
                $i = $currentI;
                $currentI++;
            }

            if (strlen($currentSub) > $longestSub) {
                $longestSub = strlen($currentSub);
            }

            echo "Ch: $char C: $currentSub L: $longestSub I: $i CI: $currentI LS:" . strlen($longestSub) . "<br />";
        }

        return $longestSub;
    }
}

try {
    $s = " ";
    $solution = new Solution();
    $output = $solution->lengthOfLongestSubstring($s);
    echo $output;
} catch (Error | Exception $ex) {
    var_dump($ex);
}