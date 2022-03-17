<?php

/*
Returns the n number in the Fibonacci sequence
*/

class Fibonacci {

    function fib($n) {
        if ($n <= 2) {
            return 1;
        }

        return $this->fib($n - 1) + $this->fib($n - 2);
    }
}

$solution = new Fibonacci();
echo $solution->fib(6);