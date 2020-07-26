<?php

/**
 * @param $position - 第幾個台階
 * @param array $cache
 * @return mixed
 */
function Fibonacci($position, $cache = []) {

    if ($position == 1) {
        // 一個台階只有 1
        $cache[$position] = 1;
    } else if ($position == 2) {
        // 第二個台階有 11 2
        $cache[$position] = 2;
    } else {
        $cache[$position] = Fibonacci($position - 1, $cache) + Fibonacci($position - 2, $cache);
    }

    return $cache[$position];
}

$result = Fibonacci(5);

echo $result;