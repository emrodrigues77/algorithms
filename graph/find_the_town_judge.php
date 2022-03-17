<?php
/*
In a town, there are n people labeled from 1 to n. There is a rumor that one of these people is secretly the town judge.
If the town judge exists, then:
    The town judge trusts nobody.
    Everybody (except for the town judge) trusts the town judge.
    There is exactly one person that satisfies properties 1 and 2.

You are given an array trust where trust[i] = [ai, bi] representing that the person labeled ai trusts the person labeled bi.
Return the label of the town judge if the town judge exists and can be identified, or return -1 otherwise.

Example 1:
Input: n = 2, trust = [[1,2]]
Output: 2

Example 2:
Input: n = 3, trust = [[1,3],[2,3]]
Output: 3

Example 3:
Input: n = 3, trust = [[1,3],[2,3],[3,1]]
Output: -1

Constraints:
    1 <= n <= 1000
    0 <= trust.length <= 104
    trust[i].length == 2
    All the pairs of trust are unique.
    ai != bi
    1 <= ai, bi <= n



*/
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $trust
     * @return Integer
     */
    function findJudge($n, $trust) {
        if (empty($trust)) {
            return $n == 1 ? 1 : -1;
        }

        $trusted = array_fill(0, $n, [0, 0, 0]);

        for ($i = 0; $i < count($trust); $i++) {
            $person = $trust[$i];
            $trusted[$person[1]][0] = $person[1];
            $trusted[$person[1]][1]++;
            $trusted[$person[0]][2]++;
        }

        usort($trusted, function ($a, $b) {
            return ($a[1] <=> $b[1]);
        });

        return ($trusted[count($trusted) - 1][1] == $n - 1 && $trusted[count($trusted) - 1][2] == 0) ? $trusted[count($trusted) - 1][0] : -1;
    }
}