<?php

class Solution {

    public function selection_sort($list) {
        for ($current = 0; $current < sizeof($list); $current++) {
            $smallest = $list[$current];

            for ($i = $current + 1; $i < sizeof($list); $i++) {
                if ($list[$i] < $smallest) {
                    $smallest = $list[$i];
                    $list[$i] = $list[$current];
                    $list[$current] = $smallest;
                }
            }
        }

        echo implode(", ", $list);
    }
}

$solution = new Solution();
$solution->selection_sort([3, 56, 67, 78, 89, 1020, 2, 4, 5, 12]);