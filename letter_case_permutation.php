<?php

/*
Given a string s, you can transform every letter individually to be lowercase or uppercase to create another string.
Return a list of all possible strings we could create. Return the output in any order.

Example 1:
Input: s = "a1b2"
Output: ["a1b2","a1B2","A1b2","A1B2"]

Example 2:
Input: s = "3z4"
Output: ["3z4","3Z4"]

Constraints:
    1 <= s.length <= 12
    s consists of lowercase English letters, uppercase English letters, and digits.

*/
class Solution {

    /**
     * @param String $s
     * @return String[]
     */
    function letterCasePermutation($S) {
        $this->solutions = array();
        $sol = '';
        $this->perm($sol, $S);
        return $this->solutions;
    }

    function perm($sol, $S) {
        echo strlen($sol) . " $sol ";
        if (strlen($sol) === strlen($S)) {
            array_push($this->solutions, $sol);
            return;
        }

        if (is_numeric($S[strlen($sol)])) {
            $sol .= $S[strlen($sol)];
            $this->perm($sol, $S);
        } else {
            $sol1 = $sol . strtolower($S[strlen($sol)]);
            $sol2 = $sol . strtoupper($S[strlen($sol)]);
            $this->perm($sol1, $S);
            $this->perm($sol2, $S);
        }
    }
}

$solution = new Solution();
$output = $solution->letterCasePermutation("a2d34");
var_dump($output);