<?php

class DynamicFibonacci {

    private $map = [1 => 1, 2 => 2];

    function fib($n) {
        if (!in_array($n, $this->map)) {
            $result = ($this->fib($n - 1) + $this->fib($n - 2));
            $this->map[$n] = $result;
        }

        return $this->map[$n];
    }
}

try {
    $solution = new DynamicFibonacci();
    echo $solution->fib(7);
} catch (Error | Exception $ex) {
    var_dump($ex);
}