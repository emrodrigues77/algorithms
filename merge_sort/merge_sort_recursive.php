<?php

class MergeSortRecursive {

    function merge_sort(array $list) {
        if (count($list) === 1) {
            return $list;
        }

        $mid = floor(count($list) / 2);
        $left = array_slice($list, 0, $mid);
        $right = array_slice($list, $mid);

        return array_merge($this->merge_sort($left), $this->merge_sort($right));
    }
}

$list = [12, 14, 5, 34, 6, 67, 12];
echo implode(", ", $list) . "<br />";
$solution = new MergeSortRecursive();
$list = $solution->merge_sort($list);
echo implode(", ", $list) . "<br />";