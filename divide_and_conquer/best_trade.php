<?php

class BestTrade {
    function trade($prices) {
        if (count($prices) === 1) {
            return 0;
        }

        $mid = count($prices) / 2;
        $former = array_slice($prices, 0, $mid);
        $latter = array_slice($prices, $mid);
        $case3 = max($latter) - min($former);
        return max($this->trade($former), $this->trade($latter), $case3);
    }
}

$prices = [27, 53, 07, 25, 33, 02, 32, 47, 43];

$solution = new BestTrade();
$bestTrade = $solution->trade($prices);
var_dump($bestTrade);