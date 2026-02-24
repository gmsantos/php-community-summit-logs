<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/drupal',
        __DIR__ . '/expressive',
        __DIR__ . '/laravel',
        __DIR__ . '/lumen',
        __DIR__ . '/magento',
        __DIR__ . '/samples',
        __DIR__ . '/silex',
        __DIR__ . '/symfony',
        __DIR__ . '/zend-mvc',
    ])
    // uncomment to reach your current PHP version
    // ->withPhpSets()
    ->withTypeCoverageLevel(0)
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0);
