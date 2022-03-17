<?php

/*
You are given a network of n nodes, labeled from 1 to n.
You are also given times, a list of travel times as directed edges times[i] = (ui, vi, wi), where ui is the source node, vi is the target node, 
and wi is the time it takes for a signal to travel from source to target.
We will send a signal from a given node k. Return the time it takes for all the n nodes to receive the signal. 
If it is impossible for all the n nodes to receive the signal, return -1.

Example 1:
Input: times = [[2,1,1],[2,3,1],[3,4,1]], n = 4, k = 2
Output: 2

Example 2:
Input: times = [[1,2,1]], n = 2, k = 1
Output: 1

Example 3:
Input: times = [[1,2,1]], n = 2, k = 2
Output: -1

Constraints:
    1 <= k <= n <= 100
    1 <= times.length <= 6000
    times[i].length == 3
    1 <= ui, vi <= n
    ui != vi
    0 <= wi <= 100
    All the pairs (ui, vi) are unique. (i.e., no multiple edges.)
*/
class Solution {

    /**
     * @param Integer[][] $times
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function networkDelayTime($times, $n, $k) {
        if (empty($times)) {
            return -1;
        }

        $links = array_fill(0, $n - 1, [0, 0, 0]);

        usort($times, function ($a, $b) {
            return ($a[0] <=> $b[0]);
        });

        for ($i = 0; $i < count($times); $i++) {
            if ($times[$i][0] === $k) {
                $links[$times[$i][1]][0] = $times[$i][1]; // node id
                $links[$times[$i][1]][1] = $links[$times[$i][1]][1] == 0 ?
                    $times[$i][2]
                    : min($links[$times[$i][1]][1], $times[$i][2]); // distance to k  
                $links[$k][2]++; // number of connections for k
            } else if (in_array($times[$i][0], array_column($links, 0))) {
                $links[$times[$i][1]][0] = $times[$i][1]; // node id
                $links[$times[$i][1]][1] = $links[$times[$i][1]][1] == 0 ?
                    $times[$i][2] + $times[$i - 1][2]
                    : min($links[$times[$i][1]][1], $times[$i][2] + $times[$i - 1][2]); // distance to k     
                //$links[$times[$i][1]][2]++; // number of connections
            }
        }

        echo $links[$k][2] . " | ";
        if (array_sum(array_column($links, 1)) === 0 || $links[$k][2] < $n - 1) {
            return -1;
        }

        usort($links, function ($a, $b) {
            return ($a[1] <=> $b[1]);
        });

        return $links[count($links) - 1][1];
    }
}