<?php

class BubbleSort {

    function sort($array) {

        $length = sizeof($array);

        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $length - 1; $j++) {
                if ($array[$j + 1] <= $array[$j]) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return $array;
    }
}

try {
    $array = [23, 5, 67, -4, 3, 23, 56, 8, -45];

    echo implode(", ", $array);
    echo "<br />";
    $solution = new BubbleSort();
    $array = $solution->sort($array);
    //echo var_dump($array);
    echo implode(", ", $array);
} catch (Error | Exception $ex) {
    var_dump($ex);
}