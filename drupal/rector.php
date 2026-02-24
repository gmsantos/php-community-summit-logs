<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use DrupalRector\Set\Drupal10SetList; // Adjust if upgrading to Drupal 11

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/web/modules/custom',
        __DIR__ . '/web/themes/custom',
    ]);

    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_85,
        Drupal10SetList::DRUPAL_10, // Applies Drupal-specific deprecation fixes
    ]);
};
