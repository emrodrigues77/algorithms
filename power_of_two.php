<?php
/*
Given an integer n, return true if it is a power of two. Otherwise, return false.
An integer n is a power of two, if there exists an integer x such that n == 2x.

Example 1:
Input: n = 1
Output: true
Explanation: 20 = 1

Example 2:
Input: n = 16
Output: true
Explanation: 24 = 16

Example 3:
Input: n = 3
Output: false

Constraints:
    -231 <= n <= 231 - 1
*/
class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isPowerOfTwo($n) {

        if ($n === 0) {
            return false;
        }

        $exp = 0;
        $power = 0;

        while ($power <= $n) {
            $power = pow(2, $exp);

            if ($power === $n) {
                return true;
            }

            $exp++;
        }

        return false;
    }
}

$solution = new Solution();
echo var_dump($solution->isPowerOfTwo(68));