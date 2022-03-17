<?php

/*
Creates power set from the itens of a list
*/
class PowerSet {

    function create($array) {
        // initialize by adding the empty set
        $results = array(array());

        foreach ($array as $element) {
            foreach ($results as $combination) {
                array_push($results, array_merge(array($element), $combination));
            }
        }

        return $results;
    }
}

$list = ["a", "b", "c"];
$solution = new PowerSet();
$set = $solution->create($list);
var_dump($set);