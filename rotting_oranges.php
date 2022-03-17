<?php

/*
You are given an m x n grid where each cell can have one of three values:
    0 representing an empty cell,
    1 representing a fresh orange, or
    2 representing a rotten orange.

Every minute, any fresh orange that is 4-directionally adjacent to a rotten orange becomes rotten.
Return the minimum number of minutes that must elapse until no cell has a fresh orange. If this is impossible, return -1.

Example 1:
Input: grid = [[2,1,1],[1,1,0],[0,1,1]]
Output: 4

Example 2:
Input: grid = [[2,1,1],[0,1,1],[1,0,1]]
Output: -1
Explanation: The orange in the bottom left corner (row 2, column 0) is never rotten, because rotting only happens 4-directionally.

Example 3:
Input: grid = [[0,2]]
Output: 0
Explanation: Since there are already no fresh oranges at minute 0, the answer is just 0.

Constraints:
    m == grid.length
    n == grid[i].length
    1 <= m, n <= 10
    grid[i][j] is 0, 1, or 2.
*/
class Solution {

    function orangesRotting($grid) {

        $rotted_last_turn = true;
        $number_of_iterations = 0;
        $number_of_changes = 0;

        $grid_value_count = array_count_values(array_merge(...$grid));
        $number_of_fresh_oranges = $grid_value_count[1] ?? 0;

        if ($number_of_fresh_oranges === 0) return 0;

        while ($rotted_last_turn && $number_of_fresh_oranges > 0) {
            $rotted_last_turn = false;
            $number_of_iterations++;
            $array_of_changes = [];

            // Go through the whole array each time
            foreach ($grid as $row_key => $row) {
                foreach ($row as $column_key => $value) {
                    // Only possible to rot if its a fresh orange
                    if ($value === 1) {
                        // If the orange at the top is rotten
                        if (isset($grid[$row_key - 1][$column_key]) && $grid[$row_key - 1][$column_key] === 2) {
                            $array_of_changes[$row_key][$column_key] = 2; // Rot the orange
                            $rotted_last_turn = true;
                            $number_of_changes++;
                        } else if (isset($grid[$row_key][$column_key - 1]) && $grid[$row_key][$column_key - 1] === 2) {
                            $array_of_changes[$row_key][$column_key] = 2; // Rot the orange
                            $rotted_last_turn = true;
                            $number_of_changes++;
                        } else if (isset($grid[$row_key][$column_key + 1]) && $grid[$row_key][$column_key + 1] === 2) {
                            $array_of_changes[$row_key][$column_key] = 2; // Rot the orange
                            $rotted_last_turn = true;
                            $number_of_changes++;
                        } else if (isset($grid[$row_key + 1][$column_key]) && $grid[$row_key + 1][$column_key] === 2) {
                            $array_of_changes[$row_key][$column_key] = 2; // Rot the orange
                            $rotted_last_turn = true;
                            $number_of_changes++;
                        }
                    }
                }
            }

            // Apply to the changes to the grid (in-place)
            foreach ($array_of_changes as $changes_row_key => $changes_column) {
                foreach ($changes_column as $changes_column_key => $value) {
                    $grid[$changes_row_key][$changes_column_key] = $value;
                }
            }
        }

        // If we did as many changes as there are fresh oranges (otherwise, it's incomplete)
        if ($number_of_changes === $number_of_fresh_oranges) return $number_of_iterations - 1;
        else return -1;
    }
}

$solution = new Solution();
echo $solution->orangesRotting([[2, 1, 1], [1, 1, 0], [0, 1, 1]]);
echo $solution->orangesRotting([[2, 1, 1], [0, 1, 1], [1, 0, 1]]);
echo $solution->orangesRotting([[0, 2]]);