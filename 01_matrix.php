<?php

/*
Given an m x n binary matrix mat, return the distance of the nearest 0 for each cell.
The distance between two adjacent cells is 1.

Example 1:
Input: mat = [[0,0,0],[0,1,0],[0,0,0]]
Output: [[0,0,0],[0,1,0],[0,0,0]]

Example 2:
Input: mat = [[0,0,0],[0,1,0],[1,1,1]]
Output: [[0,0,0],[0,1,0],[1,2,1]]

Constraints:
    m == mat.length
    n == mat[$i].length
    1 <= m, n <= 104
    1 <= m * n <= 104
    mat[$i][$j] is either 0 or 1.
    There is at least one 0 in mat.
*/
class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    function updateMatrix($matrix) {

        $rows = sizeof($matrix);

        if ($rows == 0) {
            return $matrix;
        }

        $cols = sizeof($matrix[0]);
        $dist = array_fill(0, $rows, array_fill(0, $cols, 100000));

        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $cols; $j++) {
                if ($matrix[$i][$j] === 0) {
                    $dist[$i][$j] = 0;
                } else {
                    if ($i > 0)
                        $dist[$i][$j] = min($dist[$i][$j], $dist[$i - 1][$j] + 1);
                    if ($j > 0)
                        $dist[$i][$j] = min($dist[$i][$j], $dist[$i][$j - 1] + 1);
                }
            }
        }

        for ($i = $rows - 1; $i >= 0; $i--) {
            for ($j = $cols - 1; $j >= 0; $j--) {
                if ($i < $rows - 1)
                    $dist[$i][$j] = min($dist[$i][$j], $dist[$i + 1][$j] + 1);
                if ($j < $cols - 1)
                    $dist[$i][$j] = min($dist[$i][$j], $dist[$i][$j + 1] + 1);
            }
        }

        return $dist;
    }
}

$solution = new Solution();
$solution->updateMatrix([[0, 0, 0], [0, 1, 0], [0, 0, 0]]);