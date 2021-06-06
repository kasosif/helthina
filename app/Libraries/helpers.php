<?php

function generate_stars ($score,$whole_star,$empty_star) {
    if (!$score) {
        $score = 0;
    }
    return str_repeat($whole_star, round($score)) . str_repeat($empty_star, 5 - round($score));
}

function image_url(string $path, int $width = null, int $height = null, string $fit='crop') : string {
    return  app(\App\Service\ImagePathGenerator::class)->generate($path,$width,$height,$fit);
}
