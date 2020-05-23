<?php

use Botble\RealEstate\Enums\ProjectStatusEnum;

return [
    'name'     => 'Projets',
    'create'   => 'Nouveau projet',
    'edit'     => 'Modifier le projet',
    'form'     => [
        'general_info' => 'informations générales',
        'name'         => 'Nom',
        'description'  => 'La description',
        'basic_info'   => 'Informations de base',
        'location'     => 'Emplacement',
        'investor'     => 'Investisseur',
        'number_block' => 'Blocs numériques',
        'number_floor' => 'Nombre d\'étages',
        'number_flat'  => 'Nombre d\'appartements',
        'date_finish'  => 'Date de fin',
        'date_sell'    => 'Date de vente ouverte',
        'images'       => 'Images',
        'price_from'   => 'Prix le plus bas',
        'price_to'     => 'Prix max',
        'currency'     => 'Devise',
        'city'         => 'Ville',
        'category' => 'Catégorie',
    ],
    'statuses' => [
        ProjectStatusEnum::NOT_AVAILABLE => 'Indisponible',
        ProjectStatusEnum::PRE_SALE      => 'Préparer la vente',
        ProjectStatusEnum::SELLING       => 'Vente',
        ProjectStatusEnum::SOLD          => 'Vendu',
        ProjectStatusEnum::BUILDING      => 'Bâtiment',
    ],
];
