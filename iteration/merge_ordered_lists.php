<?php

/*
Merge two arrays
*/
class Solution {

    function merge(array $list1, array $list2) {
        sort($list1);
        sort($list2);
        $mergedList = [];

        echo implode(" - ", $list1) . "<br />";
        echo implode(" - ", $list2) . "<br /><hr />";

        while (!empty($list1) || !empty($list2)) {
            reset($list1);
            reset($list2);

            echo implode(" - ", $list1) . " COUNT: " . count($list1) . "<br />";
            echo implode(" - ", $list2) . " COUNT: " . count($list2) . "<br /><hr />";

            if (empty($list1)) {
                $mergedList[] = $list2[0];
                array_shift($list2);
            } elseif (empty($list2)) {
                $mergedList[] = $list1[0];
                array_shift($list1);
            } elseif ($list1[0] < $list2[0]) {
                $mergedList[] = $list1[0];
                array_shift($list1);
            } else {
                $mergedList[] = $list2[0];
                array_shift($list2);
            }
        }

        echo implode(" - ", $list1) . " COUNT: " . count($list1) . "<br />";
        echo implode(" - ", $list2) . " COUNT: " . count($list2) . "<br /><hr />";


        return $mergedList;
    }
}

$solution = new Solution();
$list1 = ["BRA", "ARG", "URU", "CHI", "VIE", "ENG", "ZIM"];
$list2 = ["CAN", "USA", "MEX", "RUS"];
$mergedList = $solution->merge($list1, $list2);
echo implode(" - ", $mergedList);