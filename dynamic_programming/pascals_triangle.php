<?php
/*
Given an integer numRows, return the first numRows of Pascal's triangle.
In Pascal's triangle, each number is the sum of the two numbers directly above it as shown:

Example 1:
Input: numRows = 5
Output: [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]

Example 2:
Input: numRows = 1
Output: [[1]]

Constraints:
    1 <= numRows <= 30
*/
class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {

        if ($numRows === 1) {
            return [[1]];
        }

        $rows = [[1]];

        for ($i = 1; $i < $numRows; $i++) {
            $row = [];

            for ($j = 0; $j <= $i; $j++) {
                $value = $rows[$i - 1][$j - 1] + $rows[$i - 1][$j];
                array_push($row, $value);
            }

            array_push($rows, $row);
        }

        return $rows;
    }
}