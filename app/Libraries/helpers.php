<?php

function generate_stars ($score,$whole_star,$empty_star) {
    if (!$score) {
        $score = 0;
    }
    return str_repeat($whole_star, round($score)) . str_repeat($empty_star, 5 - round($score));
}
