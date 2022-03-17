<?php
/*
Given two integers n and k, return all possible combinations of k numbers out of the range [1, n].
You may return the answer in any order.

Example 1:
Input: n = 4, k = 2
Output:
[
  [2,4],
  [3,4],
  [2,3],
  [1,2],
  [1,3],
  [1,4],
]

Example 2:
Input: n = 1, k = 1
Output: [[1]]

Constraints:
    1 <= n <= 20
    1 <= k <= n
*/
class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $combinations = [];

        $this->doCombine(
            $k,
            [],
            1,
            $n,
            $k,
            $combinations
        );

        return $combinations;
    }

    function doCombine(
        $length,
        $picked,
        $origin,
        $n,
        $k,
        &$combinations
    ) {
        if (count($picked) == $length) {
            $combinations[] = $picked;
            return;
        }

        for ($i = $origin; $i <= $n; $i++) {
            $this->doCombine(
                $length,
                array_merge($picked, [$i]),
                $i + 1,
                $n,
                $k - 1,
                $combinations
            );

            echo $origin . implode(" , ", $picked) . "<br />";
        }
    }
}

$solution = new Solution();
$solution->combine(4, 2);