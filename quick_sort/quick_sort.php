<?php

class QuickSort {

    function sort(&$array, $left, $right) {
        if ($left < $right) {
            // find pivot
            $pivotIndex = $this->partition($array, $left, $right);
            // sort left
            $this->sort($array, $left, $pivotIndex - 1);
            // sort right
            $this->sort($array, $pivotIndex, $right);
            return $array;
        }
    }

    function partition(&$array, $left, $right) {
        $pivotValue = $array[floor(($left + $right) / 2)];

        while ($left <= $right) {
            // find element on left that should be on right
            while (($array[$left] < $pivotValue)) {
                $left++;
            }

            // find element on right that should be on left
            while (($array[$right] > $pivotValue)) {
                $right--;
            }

            // swap elements and move indices
            if ($left <= $right) {
                $temp = $array[$left];
                $array[$left] = $array[$right];
                $array[$right] = $temp;
                $left++;
                $right--;
            }
        }
        return $left;
    }
}

for ($i = 0; $i < 10; $i++) {
    $array[] = rand(0, 200);
}

echo implode(", ", $array) . "<br />";
$solution = new QuickSort();
$array = $solution->sort($array, 0, count($array) - 1);
echo implode(", ", $array);