<?php
/*
Given a string s and a dictionary of strings wordDict, return true if s can be segmented into a space-separated sequence of one or more dictionary words.
Note that the same word in the dictionary may be reused multiple times in the segmentation.

Example 1:
Input: s = "leetcode", wordDict = ["leet","code"]
Output: true
Explanation: Return true because "leetcode" can be segmented as "leet code".

Example 2:
Input: s = "applepenapple", wordDict = ["apple","pen"]
Output: true
Explanation: Return true because "applepenapple" can be segmented as "apple pen apple".
Note that you are allowed to reuse a dictionary word.
Example 3:
Input: s = "catsandog", wordDict = ["cats","dog","sand","and","cat"]
Output: false

Constraints:
    1 <= s.length <= 300
    1 <= wordDict.length <= 1000
    1 <= wordDict[i].length <= 20
    s and wordDict[i] consist of only lowercase English letters.
    All the strings of wordDict are unique.
*/
class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {
        if ($s === '') return true;

        $len = strlen($s);
        $cache = [0 => true] + array_fill(1, $len, false);

        for ($i = 0; $i < $len; $i++) {

            for ($j = $i + 1; $j <= $len; $j++) {
                $prefix = substr($s, $i, $j - $i);

                if (in_array($prefix, $wordDict) && $cache[$i]) {
                    $cache[$j] = true;

                    if ($cache[$len]) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}