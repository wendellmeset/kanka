<?php

return [
    'actions'       => [
        'add'   => 'neue Ebene hinzufügen',
    ],
    'base'          => 'Basisebene',
    'bulks'         => [
        'delete'    => '{1} entferne :count layer.|[2,*] entferne :count layers.',
        'patch'     => '{1} aktualisiere :count layer.|[2,*] aktualisiere :count layers.',
    ],
    'create'        => [
        'success'   => 'Ebene :name erstellen',
        'title'     => 'neue Ebene',
    ],
    'delete'        => [
        'success'   => 'Ebene :name löschen',
    ],
    'edit'          => [
        'success'   => 'Ebene :name aktualisieren',
        'title'     => 'Ebene :name editieren',
    ],
    'fields'        => [
        'position'  => 'Position',
        'type'      => 'Ebenentyp',
    ],
    'helper'        => [
        'amount_v2' => 'Lade Ebenen auf eine Karte hoch, um das unter den Markierungen angezeigte Hintergrundbild zu wechseln.',
        'is_real'   => 'Ebenen sind bei Verwendung von OpenStreetMaps nicht verfügbar.',
    ],
    'index'         => [
        'title' => 'ebene von :name',
    ],
    'pitch'         => [
        'error' => 'Maximale Anzahl an Ebenen erreicht.',
        'until' => 'Lade bis zu :max-Layer auf jede Karte hoch.',
    ],
    'placeholders'  => [
        'name'          => 'Untergrund, Ebene 2, Schiffbruch',
        'position'      => 'Optionales Feld zum Festlegen der Reihenfolge, in der die Ebenen angezeigt werden.',
        'position_list' => 'nach :name',
    ],
    'reorder'       => [
        'save'      => 'speichere neue Reichenfolge',
        'success'   => '{1} neu ordnen :count layer.|[2,*] neu ordnen :count layers.',
        'title'     => 'Ebenen neu ordnen',
    ],
    'short_types'   => [
        'overlay'       => 'Überlagerung',
        'overlay_shown' => 'Überlagerung (automatisch gezeigt)',
        'standard'      => 'Standard',
    ],
    'types'         => [
        'overlay'       => 'Überlagerung (über der aktiven Ebene angezeigt)',
        'overlay_shown' => 'Standardmäßig wird die Überlagerung angezeigt',
        'standard'      => 'Standardebene (zwischen Ebenen wechseln)',
    ],
];
