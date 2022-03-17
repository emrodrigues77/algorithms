<?php
/*
Given an array nums of distinct integers, return all the possible permutations. You can return the answer in any order.

Example 1:
Input: nums = [1,2,3]
Output: [[1,2,3],[1,3,2],[2,1,3],[2,3,1],[3,1,2],[3,2,1]]

Example 2:
Input: nums = [0,1]
Output: [[0,1],[1,0]]

Example 3:
Input: nums = [1]
Output: [[1]]

Constraints:
    1 <= nums.length <= 6
    -10 <= nums[i] <= 10
    All the integers of nums are unique.

*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $result = array();
        $this->backTracking($nums, count($nums), 0, array(), $result);
        return $result;
    }

    function backTracking($nums, $numsLength, $startIndex, $permutation, &$result) {

        if (count($permutation) == $numsLength) {
            array_push($result, $permutation);
            return;
        }

        for ($i = $startIndex; $i < $numsLength; $i++) {
            if (!in_array($nums[$i], $permutation)) {
                array_push($permutation, $nums[$i]);
                $this->backTracking($nums, $numsLength, 0, $permutation, $result);
                array_pop($permutation);
            }
        }
    }
}

try {
    $solution = new Solution();
    $permutations = $solution->permute([1, 2, 3]);
    var_dump($permutations);
} catch (Error | Exception $ex) {
    var_dump($ex);
}