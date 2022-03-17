<?php

/*
Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it 
would be if it were inserted in order.

You must write an algorithm with O(log n) runtime complexity.

Example 1:

Input: nums = [1,3,5,6], target = 5
Output: 2

Example 2:

Input: nums = [1,3,5,6], target = 2
Output: 1

Example 3:

Input: nums = [1,3,5,6], target = 7
Output: 4

 

Constraints:

    1 <= nums.length <= 104
    -104 <= nums[i] <= 104
    nums contains distinct values sorted in ascending order.
    -104 <= target <= 104
*/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {

        $insertPosition = array_search($target, $nums);

        if ($insertPosition === false) {
            $prior = $target - 1;
            $next = $target + 1;

            while (true) {

                $priorPosition = array_search($prior, $nums);
                $nextPosition = array_search($next, $nums);

                if ($priorPosition !== false) {
                    $insertPosition = $priorPosition + 1;
                    break;
                } else if ($nextPosition !== false) {
                    $insertPosition = $nextPosition - 1;
                    break;
                } else {
                    $priorPosition--;
                    $nextPosition++;
                }
            }
        }

        return $insertPosition;
    }
}

try {
    $nums = [1, 3, 5, 6];
    $target = 5;
    $solution = new Solution();
    echo $solution->searchInsert($nums, $target);
} catch (Error | Exception) {
    var_dump($ex);
}