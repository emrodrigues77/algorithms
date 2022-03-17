<?php

/*
Algorithm receives an array and returns if the value is in the list
*/

class Solution {

    function binarySearch($array, $x, $low, $high) {

        if ($high >= $low) {
            $mid = (int) (($low + $high) / 2);

            // If found at mid, then return it
            if ($array[$mid] === $x) {
                return $mid;
            }

            // Search the left half
            if ($array[$mid] > $x) {
                return $this->binarySearch($array, $x, $low, $mid - 1);
            }

            // Search the right half
            return $this->binarySearch($array, $x, $mid + 1, $high);
        }

        return -1;
    }
}

$solution = new Solution();
$array = [1, 3, 5, 7, 9, 11, 13, 15];

echo $solution->binarySearch($array, 13, 0, sizeof($array));
echo $solution->binarySearch($array, 4, 0, sizeof($array));