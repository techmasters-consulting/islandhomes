<?php

use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Enums\PropertyPeriodEnum;
use Botble\RealEstate\Enums\PropertyStatusEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;

return [
    'name'     => 'Propriétés',
    'create'   => 'Immobilier neuf',
    'edit'     => 'Modifier un bien immobilier',
    'form'     => [
        'main_info'        => 'informations générales',
        'basic_info'       => 'Informations de base',
        'name'             => 'Titre',
        'type'             => 'Type',
        'images'           => 'Images',
        'button_add_image' => 'Ajouter des images',
        'location'         => 'Emplacement de la propriété',
        'number_bedroom'   => 'Nombre de chambres',
        'number_bathroom'  => 'Nombre de salles de bain',
        'number_floor'     => 'Nombre d\'étages',
        'square'           => 'Carré (m2)',
        'price'            => 'Prix',
        'features'         => 'Caractéristiques',
        'project'          => 'Projet',
        'date'             => 'Informations sur la date',
        'currency'         => 'Devise',
        'city'             => 'Ville',
        'period'           => 'Période',
        'category'    => 'Catégorie',
    ],
    'statuses' => [
        PropertyStatusEnum::NOT_AVAILABLE => 'Indisponible',
        PropertyStatusEnum::PRE_SALE      => 'Préparer la vente',
        PropertyStatusEnum::SELLING       => 'Vente',
        PropertyStatusEnum::SOLD          => 'Vendu',
        PropertyStatusEnum::RENTING       => 'Location',
        PropertyStatusEnum::RENTED        => 'Loué',
        PropertyStatusEnum::BUILDING      => 'Bâtiment',
    ],
    'types'    => [
        PropertyTypeEnum::SALE => 'Vente',
        PropertyTypeEnum::RENT => 'Location',
    ],
    'periods'  => [
        PropertyPeriodEnum::DAY   => 'journée',
        PropertyPeriodEnum::MONTH => 'Mois',
        PropertyPeriodEnum::YEAR  => 'An',
    ],
    'moderation_status'   => 'Statut de modération',
    'moderation-statuses' => [
        ModerationStatusEnum::PENDING  => 'En attente',
        ModerationStatusEnum::APPROVED => 'Approuvé',
        ModerationStatusEnum::REJECTED => 'Rejeté',
    ],
];
