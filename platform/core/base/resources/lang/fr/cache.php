<?php

return [
    'cache_management' => 'Gestion du cache',
    'cache_commands'   => 'Effacer les commandes de cache',
    'commands'         => [
        'clear_cms_cache'        => [
            'title'       => 'Vider tout le cache CMS',
            'description' => 'Effacer la mise en cache du CMS: mise en cache de la base de données, blocs statiques ... Exécutez cette commande lorsque vous ne voyez pas les modifications après la mise à jour des données.',
            'success_msg' => 'Cache nettoyé',
        ],
        'refresh_compiled_views' => [
            'title'       => 'Actualiser les vues compilées',
            'description' => 'Des vues compilées claires pour rendre les vues à jour.',
            'success_msg' => 'Vue du cache rafraîchie',
        ],
        'clear_config_cache'     => [
            'title'       => 'Vider le cache de configuration',
            'description' => 'Vous devrez peut-être actualiser la mise en cache de la configuration lorsque vous modifiez quelque chose dans l\'environnement de production.',
            'success_msg' => 'Cache de configuration nettoyé',
        ],
        'clear_route_cache'      => [
            'title'       => 'Vider le cache d\'itinéraire',
            'description' => 'Effacer le routage du cache.',
            'success_msg' => 'Le cache d\'itinéraire a été nettoyé',
        ],
        'clear_log'              => [
            'title'       => 'Effacer le journal',
            'description' => 'Effacer les fichiers journaux du système',
            'success_msg' => 'Le journal système a été nettoyé',
        ],
    ],
];
