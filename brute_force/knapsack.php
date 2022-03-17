<?php

/*
Finds the best combination of items that can be carried on a knapsack
*/

class Knapsack {

    function findBestCombination($items, $maxWeight) {
        $combinations = $this->powerset($items);
        $bestValue = 0;

        foreach ($combinations as $combination) {
            $value = $this->sumCombination($combination, "value");
            $weight = $this->sumCombination($combination, "weight");
            //echo $value . $weight;

            if ($value > $bestValue && $weight <= $maxWeight) {
                $bestValue = $value;
                $bestCombination = $combination;
            }
        }

        return $bestCombination;
    }

    function sumCombination(array $array, $field, $sum = 0) {

        foreach ($array as $child) {
            $sum += is_array($child) ? $this->sumCombination($child, $field, $sum) : (int) $child["$field"];
            echo "Sum: " . $sum . " Child: " . $child["$field"];
        }

        echo "$field: " . $sum . " | ";
        return $sum;
    }


    function powerset($items) {
        // initialize by adding the empty set
        $results = array(array());

        foreach ($items as $item) {
            foreach ($results as $combination) {
                array_push($results, array_merge(array($item), $combination));
            }
        }

        return $results;
    }
}

$items[] = ["value" => 10, "weight" => 10];
$items[] = ["value" => 15, "weight" => 15];
$items[] = ["value" => 20, "weight" => 20];
$items[] = ["value" => 25, "weight" => 25];

$solution = new Knapsack();
$bestCombination = $solution->findBestCombination($items, 30);
echo var_dump($bestCombination);