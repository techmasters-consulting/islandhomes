<?php

use Botble\Base\Enums\BaseStatusEnum;

return [
    'statuses' => [
        BaseStatusEnum::DRAFT     => 'Brouillon',
        BaseStatusEnum::PENDING   => 'En attente',
        BaseStatusEnum::PUBLISHED => 'Publié',
    ],
];
