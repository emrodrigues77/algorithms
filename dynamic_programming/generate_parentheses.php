<?php
/*
Given n pairs of parentheses, write a function to generate all combinations of well-formed parentheses.

Example 1:
Input: n = 3
Output: ["((()))","(()())","(())()","()(())","()()()"]

Example 2:
Input: n = 1
Output: ["()"]

Constraints:
    1 <= n <= 8
*/
class Solution {
    private function getParens(int $left, int $right, string $pattern, array &$patterns): void {
        if ($left == 0 && $right == 0) {
            $patterns[] = $pattern;
            return;
        }

        if ($right > $left)
            $this->getParens($left, $right - 1, $pattern . ')', $patterns);
        if ($left > 0)
            $this->getParens($left - 1, $right, $pattern . '(', $patterns);
    }

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $patterns = [];
        $this->getParens($n, $n, '', $patterns);
        return $patterns;
    }
}