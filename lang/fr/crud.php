<?php

return [
    'actions'                   => [
        'actions'           => 'Actions',
        'apply'             => 'Appliquer',
        'back'              => 'Retour',
        'change'            => 'Changer',
        'copy'              => 'Copier',
        'copy_mention'      => 'Copier mention [ ]',
        'copy_to_campaign'  => 'Copier vers une campagne',
        'disable'           => 'Désactiver',
        'enable'            => 'Activer',
        'explore_view'      => 'Vue Imbriquée',
        'export'            => 'Export',
        'find_out_more'     => 'En savoir plus',
        'go_to'             => 'Aller à :name',
        'help'              => 'Aide',
        'json-export'       => 'Export (JSON)',
        'manage_links'      => 'Gérer les liens',
        'move'              => 'Déplacer',
        'new'               => 'Nouveau',
        'new_child'         => 'Nouvel enfant',
        'new_post'          => 'Nouvelle entrée',
        'next'              => 'Suivant',
        'print'             => 'Imprimer',
        'reset'             => 'Réinitialiser',
        'transform'         => 'Transformer',
    ],
    'add'                       => 'Ajouter',
    'alerts'                    => [
        'copy_attribute'    => 'La mention de l\'attribut à été copiée au presse-papier.',
        'copy_invite'       => 'Le lien d\'invitation a été copié au presse-papier.',
        'copy_mention'      => 'La mention avancée de cette entité a été copiée au presse-papier.',
    ],
    'boosted'                   => 'Boosté',
    'boosted_campaigns'         => 'Campagnes Boostées',
    'bulk'                      => [
        'actions'       => [
            'edit'          => 'Opération de masse',
            'permissions'   => 'Changer les permissions',
            'templates'     => 'Appliquer un modèle d\'attributs',
        ],
        'age'           => [
            'helper'    => 'Il est possible de préfixer le numéro avec + ou - pour modifier l\'âge dynamiquement.',
        ],
        'buttons'       => [
            'label' => 'Pour la sélection',
        ],
        'delete'        => [
            'warning'   => 'Es-tu sûr de vouloir supprimer les entités sélectionnées?',
        ],
        'edit'          => [
            'tagging'   => 'Action pour les étiquettes',
            'tags'      => [
                'add'       => 'Ajouter',
                'remove'    => 'Retirer',
            ],
            'title'     => 'Modifications de plusieurs entités',
        ],
        'errors'        => [
            'admin'     => 'Seulement les membres administrateur de la campagne peuvent changer le statut des entités.',
            'general'   => 'Un problème est survenu lors de l\'exécution. Prière de ressayer de nouveau ou nous contacter en cas de problème persistant. Message d\'erreur: :hint.',
        ],
        'permissions'   => [
            'fields'    => [
                'override'  => 'Remplacer',
            ],
            'helpers'   => [
                'override'  => 'Si sélectionné, les permissions des entités sélectionnées seront remplacées par celles-ci. Si non-sélectionné, les permissions sélectionnées seront ajoutées à celles existantes.',
            ],
            'title'     => 'Changer les permissions pour plusieurs entités',
        ],
        'success'       => [
            'copy_to_campaign'  => '{1} :count entité copiée à :campaign.|[2,*] :count entités copiées à :campaign.',
            'editing'           => '{1} :count entité modifiée.|[2,*]:count entités modifiées.',
            'editing_partial'   => '{1} :count/:total entité modifiée.|[2,*]:count/:total entités modifiées.',
            'permissions'       => 'Permissions changées pour :count entité. |Permissions changées pour :count entités.',
            'private'           => ':count entité est maintenant privée.|:count entités sont maintenant privées.',
            'public'            => ':count entité est maintenant visible.|:count entités sont maintenant visibles.',
            'templates'         => 'Le modèle d\'attribute a été appliqué sur :count entité.|Le modèle d\'attribut a été appliqué sur :count entités.',
        ],
    ],
    'bulk_templates'            => [
        'bulk_title'    => 'Appliquer un modèle d\'attribute aux entités',
    ],
    'cancel'                    => 'Annuler',
    'click_modal'               => [
        'close'     => 'Fermer',
        'confirm'   => 'Confirmer',
        'title'     => 'Confirme ton action',
    ],
    'copy_to_campaign'          => [
        'bulk_title'    => 'Copier vers une campagne',
        'panel'         => 'Copier',
        'title'         => 'Copier \':name\' vers une autre campagne',
    ],
    'create'                    => 'Créer',
    'datagrid'                  => [
        'empty' => 'Rien à afficher.',
    ],
    'delete_modal'              => [
        'callout'           => 'Oyé!',
        'close'             => 'Fermer',
        'delete'            => 'Supprimer',
        'description_v2'    => 'Tu supprimes ":tag".',
        'permanent'         => 'Cette action est permanente.',
        'recoverable'       => 'Les entités supprimées peuvent être récupérées pendant :day jours avec une :boosted-campaign.',
        'title'             => 'Confirmation de la suppression',
    ],
    'destroy_many'              => [
        'success'   => ':count élément supprimé.|:count éléments supprimés.',
    ],
    'edit'                      => 'Modifier',
    'errors'                    => [
        'boosted'                       => 'Cette fonctionnalité n\'est accessible qu\'aux campagnes boostées..',
        'boosted_campaigns'             => 'Cette fonctionnalité n\'est que disponible que pour les :boosted.',
        'cannot_move_node_into_itself'  => 'Le parent sélectionné est invalide. Cela peut être causé par le parent ayant cette entité comme parent.',
        'node_must_not_be_a_descendant' => 'Node invalide (étiquette, lieu parent): l\'entité serait un descendant de lui-même.',
        'unavailable_feature'           => 'Fonctionnalité indisponible',
    ],
    'events'                    => [],
    'export'                    => 'Export',
    'fields'                    => [
        'ability'               => 'Pouvoirs',
        'attribute_template'    => 'Modèle d\'attribut',
        'calendar'              => 'Calendrier',
        'calendar_date'         => 'Date calendrier',
        'character'             => 'Personnage',
        'child'                 => 'Enfant',
        'closed'                => 'Fermée',
        'colour'                => 'Couleur',
        'copy_abilities'        => 'Copier les pouvoirs',
        'copy_attributes'       => 'Copier les attributs',
        'copy_inventory'        => 'Copier l\'inventaire',
        'copy_links'            => 'Copier les liens d\'entité',
        'copy_permissions'      => 'Copier les permissions (cela ignore les permissions définies dans l\'onglet de permissions)',
        'copy_posts'            => 'Copier les notes (cela inclus les permissions des notes)',
        'creator'               => 'Créateur',
        'date_range'            => 'Plage de dates',
        'dice_roll'             => 'Jet de dés',
        'entity'                => 'Entité',
        'entity_type'           => 'Type d\'entité',
        'entry'                 => 'Entrée',
        'event'                 => 'Evénement',
        'excerpt'               => 'Extrait',
        'family'                => 'Famille',
        'files'                 => 'Fichiers',
        'gallery_header'        => 'Entête de la galerie',
        'gallery_image'         => 'Galerie d\'image',
        'has_attributes'        => 'Possède des attributs',
        'has_entity_files'      => 'Possède des fichiers',
        'has_entity_notes'      => 'Possède des notes',
        'has_image'             => 'Possède une image',
        'header_image'          => 'Image d\'en-tête',
        'image'                 => 'Image',
        'is_closed'             => 'La conversation est fermée et n\'acceptera plus de nouveau messages.',
        'is_private'            => 'Privé',
        'is_private_v3'         => 'Seulement afficher cet élément aux membres du rôle :admin-role. Cette option remplace toutes autres permissions.',
        'is_star'               => 'Epinglé',
        'item'                  => 'Objet',
        'journal'               => 'Journal',
        'location'              => 'Lieu',
        'locations'             => ':first dans :second',
        'map'                   => 'Carte',
        'name'                  => 'Nom',
        'organisation'          => 'Organisation',
        'position'              => 'Position',
        'privacy'               => 'Visibilité',
        'race'                  => 'Race',
        'replace_mentions'      => 'Remplace les mentions d\'attributs avec ceux de la nouvelle entité.',
        'tag'                   => 'Etiquette',
        'tags'                  => 'Etiquettes',
        'template'              => 'Modèle',
        'timeline'              => 'Chronologie',
        'tooltip'               => 'Infobulle',
        'type'                  => 'Type',
        'visibility'            => 'Visibilité',
    ],
    'files'                     => [
        'actions'   => [
            'drop'      => 'Ajouter un fichier en cliquant ou en glissant déposant',
            'manage'    => 'Gérer les fichiers d\'entité',
        ],
        'errors'    => [
            'max'       => 'Nombre maximal de fichier (:max) atteint pour cette entité.',
            'no_files'  => 'Aucun fichier.',
        ],
        'files'     => 'Fichiers uploadés',
        'hints'     => [
            'limit'         => 'Chaque entité peut avoir un nombre maximal de :max fichiers uploadés.',
            'limitations'   => 'Formats pris en charge: :formats. Taille maximale: :size',
        ],
        'title'     => 'Fichiers d\'entité pour :name',
    ],
    'filter'                    => 'Filtre',
    'filters'                   => [
        'all'                       => 'Afficher tous les descendants',
        'clear'                     => 'Effacer les filtres',
        'copy_helper'               => 'Utilises les filtres copiers dans ton presse-papier comme valeurs de filtre pour les widget de tableau de bord et liens rapides.',
        'copy_helper_no_filters'    => 'Dès que des filtres sont définis, ils peuvent être copiés au presse-papier',
        'copy_to_clipboard'         => 'Copier les filtres',
        'direct'                    => 'Afficher seulement les descendants directs',
        'filtered'                  => 'Affichant :count de :total :entity.',
        'hide'                      => 'Cacher les filtres',
        'lists'                     => [
            'desktop'   => [
                'all'       => 'Afficher tous les descendants (:count)',
                'filtered'  => 'Afficher les descendants directs (:count)',
            ],
            'mobile'    => [
                'all'       => 'Afficher tous (:count)',
                'filtered'  => 'Afficher directs (:count)',
            ],
        ],
        'mobile'                    => [
            'clear' => 'Effacer',
            'copy'  => 'Presse-papier',
        ],
        'options'                   => [
            'children'  => 'Correspond à ceci ou ses descendants',
            'exclude'   => 'Ne correspond pas à',
            'hide'      => 'Cacher',
            'include'   => 'Correspond à',
            'none'      => 'Aucun(e)',
            'show'      => 'Afficher',
        ],
        'show'                      => 'Afficher les filtres',
        'sorting'                   => [
            'asc'       => ':field ascendant',
            'desc'      => ':field descendant',
            'helper'    => 'Contrôler l\'ordre d\'affichage des résultats.',
        ],
        'title'                     => 'Filtres',
    ],
    'fix-this-issue'            => 'Réparer ce problème',
    'forms'                     => [
        'actions'       => [
            'calendar'  => 'Ajouter une date de calendrier',
        ],
        'copy_options'  => 'Option de copie',
    ],
    'helpers'                   => [
        'copy_options'  => 'Copier les éléments liés suivant de la source à la nouvelle entité.',
        'learn_more'    => 'En savoir plus sur cette fonctionnalité dans notre :documentation.',
        'linking'       => 'Lier d\'autres entités',
        'nested_parent' => 'Affichage des enfants de :parent.',
    ],
    'hidden'                    => 'Caché',
    'hints'                     => [
        'attribute_template'    => 'Appliquer un modèle d\'attribut lors de la création ou l\'édition de cette entité.',
        'calendar_date'         => 'Une date de calendrier permet un triage plus facile dans les listes, et garde à jour un événement de calendrier dans le calendrier sélectionné.',
        'gallery_header'        => 'Si l\'entité n\'a pas d\'entête, afficher une image depuis la galerie de la campagne.',
        'gallery_image'         => 'Si l\'entité n\'a pas d\'image, afficher une image depuis la galerie de la campagne.',
        'header_image'          => 'Cette image s\'affiche au-delà de l\'entité. Les images larges mènent a un meilleur résultat.',
        'image_limitations'     => 'Formats supportés: :formats. Taille maximale: :size.',
        'image_recommendation'  => 'Dimensions recommandées: :width par :height px.',
        'is_star'               => 'Les éléments épinglés sont affichés sur le menu de l\'entité.',
        'tooltip'               => 'Remplace l\'infobulle automatiquement généré avec le texte ci-dessous.',
        'visibility'            => 'Si la visibilité est définie à Admin, seuls les membres du rôle Admin de la campagne verront ceci. La visibilité "Soi-même" signifie que tu es le seul à le voir.',
    ],
    'history'                   => [
        'created_clean'         => 'Créé par :name :date',
        'created_date_clean'    => 'Créé :date',
        'unknown'               => 'Inconnu',
        'updated_clean'         => 'Dernière modification par :name :date',
        'updated_date_clean'    => 'Dernière modification :date',
        'view'                  => 'Visionner les journaux de l\'entité',
    ],
    'image'                     => [
        'error' => 'Impossible de récupérer l\'image demandée. Il est possible que le site web ne nous permet pas de télécharger des images (cela arrive par example avec squarespace et DeviantArt), ou le lien n\'est plus valide.',
    ],
    'is_not_private'            => 'Cette entité n\'est pas privée.',
    'is_private'                => 'Cet élément est privé et pas visible.',
    'keyboard-shortcut'         => 'Raccourci clavier :code',
    'legacy'                    => 'Ancien',
    'linking_help'              => 'Comment lier vers d\'autres éléments?',
    'manage'                    => 'Gérer',
    'navigation'                => [
        'cancel'            => 'annuler',
        'or_cancel'         => 'ou :cancel',
        'skip_to_content'   => 'Aller au contenu',
    ],
    'new_entity'                => [
        'error' => 'Vérifier les valeurs.',
        'fields'=> [
            'name'  => 'Nom',
        ],
        'title' => 'Nouvel élément',
    ],
    'panels'                    => [
        'appearance'            => 'Apparence',
        'attribute_template'    => 'Modèle d\'attribut',
        'calendar_date'         => 'Date Calendrier',
        'entry'                 => 'Entrée',
        'general_information'   => 'Information Generale',
        'move'                  => 'Déplacer',
        'system'                => 'Système',
    ],
    'permissions'               => [
        'action'            => 'Action',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Ajouter',
                'deny'      => 'Refuser',
                'ignore'    => 'Ignorer',
                'remove'    => 'Retirer',
            ],
            'bulk_entity'   => [
                'allow'     => 'Permettre',
                'deny'      => 'Refuser',
                'inherit'   => 'Hériter',
            ],
            'delete'        => 'Supprimer',
            'edit'          => 'Modifier',
            'entity_note'   => 'Notes d\'entité',
            'read'          => 'Lire',
            'toggle'        => 'Basculer',
        ],
        'allowed'           => 'Permis',
        'fields'            => [
            'member'    => 'Membre',
            'role'      => 'Rôle',
        ],
        'helper'            => 'En utilisant cette interface, il est possible d\'affiner les permissions des membres et rôles de la campagne pouvant interagir avec cette entité.',
        'helpers'           => [
            'setup' => 'Utilise cette interface pour affiner la manière dont les rôles et les utilisateurs peuvent interagir avec cette entité. :allow permettra à l\'utilisateur ou au rôle d\'effectuer cette action. :deny leur empêchera de prendre cette action. :inherit utilisera le rôle de l\'utilisateur ou l\'autorisation de leur rôle. Un utilisateur avec :allow peut effectuer l\'action en question, même si son rôle est en :deny.',
        ],
        'inherited'         => 'Ce rôle a déjà cette permission pour ce type d\'entité.',
        'inherited_by'      => 'Cet utilisateur fait partie du rôle :role qui permet cette permission pour ce type d\'entité.',
        'success'           => 'Permissions enregistrées.',
        'title'             => 'Permissions',
        'too_many_members'  => 'Cette campagne a trop de members (>10) pour afficher cette interface correctement. Prière d\'utiliser le boutton Permission sur la vue de l\'entité pour gérer les permissions.',
    ],
    'placeholders'              => [
        'ability'       => 'Choix d\'un pouvoir',
        'calendar'      => 'Choix du calendrier',
        'character'     => 'Choix du personnage',
        'creature'      => 'Choix d\'une créature',
        'entity'        => 'Entité',
        'event'         => 'Choix de l\'événement',
        'family'        => 'Choix de la famille',
        'gallery_image' => 'Choix d\'une image depuis la galerie',
        'image_url'     => 'Ou depuis une URL',
        'item'          => 'Choix d\'un objet',
        'journal'       => 'Choix d\'un journal',
        'location'      => 'Choix du lieu',
        'map'           => 'Choix d\'une carte',
        'note'          => 'Choix d\'une note',
        'organisation'  => 'Choix d\'une organisation',
        'quest'         => 'Choix d\'une quête',
        'race'          => 'Choix d\'une race',
        'tag'           => 'Choix d\'une étiquette',
        'timeline'      => 'Choix d\'une chronologie',
    ],
    'relations'                 => [
        'fields'    => [
            'location'  => 'Lieu',
            'name'      => 'Nom',
            'relation'  => 'Relation',
        ],
        'hint'      => 'Des relations entre les entités peuvent être définies pour représenter leur connexion.',
    ],
    'remove'                    => 'Supprimer',
    'rename'                    => 'Renommer',
    'save'                      => 'Enregistrer',
    'save_and_close'            => 'Enregistrer et Fermer',
    'save_and_copy'             => 'Enregistrer et Copier',
    'save_and_new'              => 'Enregistrer et Nouveau',
    'save_and_update'           => 'Enregistrer et continuer la modification',
    'save_and_view'             => 'Enregistrer et Afficher',
    'search'                    => 'Rechercher',
    'select'                    => 'Sélection',
    'superboosted_campaigns'    => 'Campagnes Superboostées',
    'tabs'                      => [
        'abilities'     => 'Pouvoirs',
        'assets'        => 'Ressources',
        'attributes'    => 'Attributs',
        'boost'         => 'Boost',
        'calendars'     => 'Calendriers',
        'connections'   => 'Connexions',
        'default'       => 'Défaut',
        'events'        => 'Événements',
        'inventory'     => 'Inventaire',
        'links'         => 'Liens',
        'map-points'    => 'Points de carte',
        'mentions'      => 'Mentions',
        'menu'          => 'Menu',
        'notes'         => 'Notes',
        'overview'      => 'Aperçu',
        'permissions'   => 'Permissions',
        'profile'       => 'Profil',
        'quests'        => 'Quêtes',
        'relations'     => 'Relations',
        'reminders'     => 'Rappels',
        'story'         => 'Histoire',
        'timelines'     => 'Chronologies',
        'tooltip'       => 'Infobulle',
    ],
    'titles'                    => [
        'editing'   => 'Modification de :name',
    ],
    'tooltips'                  => [
        'boosted_feature'   => 'Fonctionnalité de campagne boostée',
        'new_post'          => 'Ajouter un nouveau post à cette entité.',
    ],
    'update'                    => 'Modifier',
    'users'                     => [
        'unknown'   => 'Inconnu',
    ],
    'view'                      => 'Voir',
    'visibilities'              => [
        'admin'         => 'Admin',
        'admin-self'    => 'Soi-même & Admin',
        'all'           => 'Tous',
        'members'       => 'Membres',
        'self'          => 'Soi-même',
    ],
];
