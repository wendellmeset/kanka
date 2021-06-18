<?php

return [
    'actions'       => [
        'add_epoch'         => 'Afegeix una època',
        'add_intercalary'   => 'Afegeix dies intercalars',
        'add_month'         => 'Afegeix un mes',
        'add_moon'          => 'Afegeix una lluna',
        'add_reminder'      => 'Afegeix un recordatori',
        'add_season'        => 'Afegeix una estació',
        'add_weather'       => 'Afegeix un fenomen climàtic',
        'add_week'          => 'Afegeix una setmana amb nom',
        'add_weekday'       => 'Afegeix un dia de la setmana',
        'add_year'          => 'Afegeix un any amb nom',
        'set_today'         => 'Aquest és el dia actual',
        'today'             => 'Avui',
    ],
    'checkboxes'    => [
        'is_recurring'  => 'Té lloc cada any',
    ],
    'create'        => [
        'description'   => 'Crea un nou calendari',
        'success'       => 'S\'ha creat el calendari «:name».',
        'title'         => 'Nou calendari',
    ],
    'destroy'       => [
        'success'   => 'S\'ha eliminat el calendari «:name».',
    ],
    'edit'          => [
        'description'   => 'Actualiza el calendari',
        'success'       => 'S\'ha actualitzat el calendari «:name».',
        'title'         => 'Edita el calendari :name',
        'today'         => 'S\'ha actualitzat la data del calendari.',
    ],
    'event'         => [
        'actions'   => [
            'existing'  => 'Entitat existent',
            'new'       => 'Nou esdeveniment',
            'switch'    => 'Canvia l\'elecció',
        ],
        'create'    => [
            'description'   => 'Crea un esdeveniment al calendari',
            'success'       => 'S\'ha creat l\'esdeveniment al calendari.',
            'title'         => 'Afegeix un esdeveniment al calendari :name',
        ],
        'destroy'   => 'S\'ha eliminat l\'esdeveniment del calendari «:name».',
        'edit'      => [
            'description'   => 'Actualitza l\'esdeveniment del calendari',
            'success'       => 'S\'ha actualitzat l\'esdeveniment al calendari.',
            'title'         => 'Actualitza l\'esdeveniment del calendari :name',
        ],
        'helpers'   => [
            'add'               => 'Afegeix un esdeveniment existent a aquest calendari.',
            'new'               => 'O crea un nou esdeveniment proporcionant un nom.',
            'other_calendar'    => 'Esteu editant un recordatori del calendari :calendar.',
        ],
        'modal'     => [
            'title' => 'Afegeix un esdeveniment al calendari',
        ],
        'success'   => 'S\'ha afegit l\'esdeveniment «:name» al calendari.',
    ],
    'events'        => [
        'description'   => 'Esdeveniments en aquest calendari.',
        'title'         => 'Esdeveniments del calendari :name',
    ],
    'fields'        => [
        'calendar'              => 'Calendari superior',
        'calendars'             => 'Calendaris',
        'colour'                => 'Color',
        'comment'               => 'Comentari',
        'current_day'           => 'Dia actual',
        'current_month'         => 'Mes actual',
        'current_year'          => 'Any actual',
        'date'                  => 'Data actual',
        'has_leap_year'         => 'Té anys de traspàs',
        'intercalary'           => 'Dies intercalars',
        'is_incrementing'       => 'Data incremental',
        'is_recurring'          => 'Recurrent',
        'leap_year_amount'      => 'Afegeix dies',
        'leap_year_month'       => 'Mes',
        'leap_year_offset'      => 'Cada',
        'leap_year_start'       => 'Any de traspàs',
        'length'                => 'Durada de l\'esdeveniment',
        'length_days'           => '{1} :count dia|[2,*] :count dies',
        'months'                => 'Mesos',
        'moons'                 => 'Llunes',
        'name'                  => 'Nom',
        'parameters'            => 'Paràmetres',
        'recurring_periodicity' => 'Periodicitat recurrent',
        'recurring_until'       => 'Recurrent fins l\'any',
        'reset'                 => 'Reinici setmanal',
        'seasons'               => 'Estacions',
        'start_offset'          => 'Retardament inicial',
        'suffix'                => 'Sufix',
        'type'                  => 'Tipus',
        'week_names'            => 'Noms de les setmanes',
        'weekdays'              => 'Dies de la setmana',
    ],
    'helpers'       => [
        'month_type'    => 'Els mesos intercalars no utilitzen els dies de la setmana, però influeixen a les llunes i les estacions.',
        'nested_parent' => 'S\'estan mostrant els calendaris de :parent.',
        'nested_without'=> 'S\'estan mostrant tots els calendaris que no tenen cap pare. Cliqueu una fila per a veure\'n els calendaris descendents.',
        'start_offset'  => 'Per defecte, el calendari comença el primer dia de la setmana de l\'any 0. Aquí es pot canviar on se situarà el primer dia del calendari.',
    ],
    'hints'         => [
        'event_length'      => 'Quant dura un esdeveniment. Un esdeveniment no pot durar més de dos mesos.',
        'intercalary'       => 'Dias que estan fora dels mesos i setmanes estàndard. No influeixen als dies de la setmana, però afecten als cicles lunars.',
        'is_incrementing'   => 'Si està activat, s\'incrementarà la data actual automàticament a les 00:00h UTC.',
        'is_recurring'      => 'Si un esdeveniment és recurrent, reapareixerà cada any a la mateixa data.',
        'months'            => 'Els calendaris han de tenir com a mínim 2 mesos.',
        'moons'             => 'Si afegiu llunes, apareixeran al calendari cada lluna plena i nova. Si el periode entre aquestes és major que 10 dies, també es mostraran els quarts creixent i minvant.',
        'parent_calendar'   => 'Els calendaris inclouen els recordatoris i fenomens climàtics del seu calendari superior.',
        'reset'             => 'Comença sempre els mesos o els anys al primer dia de la setmana.',
        'seasons'           => 'Per a crear estacions al calendari, establiu quan comença cadascuna. Kanka s\'encarregarà de tota la resta.',
        'weekdays'          => 'Escriviu els noms dels dies de la setmana. Es requereix un mínim de 2 dies.',
        'weeks'             => 'Definiu els noms de les setmanes més importants del calendari.',
        'years'             => 'Alguns anys són tan importants que tenen el seu propi nom.',
    ],
    'index'         => [
        'add'           => 'Nou calendari',
        'description'   => 'Gestiona els calendaris de :name',
        'header'        => 'Calendaris de :name',
        'title'         => 'Calendaris',
    ],
    'layouts'       => [
        'month' => 'Mes',
        'year'  => 'Any',
    ],
    'modals'        => [
        'switcher'  => [
            'title' => 'Commutador d\'any',
        ],
    ],
    'month_types'   => [
        'intercalary'   => 'Intercalar',
        'standard'      => 'Estàndard',
    ],
    'options'       => [
        'events'    => [
            'recurring_periodicity' => [
                'fullmoon'      => 'Lluna plena',
                'fullmoon_name' => 'Lluna :moon plena',
                'month'         => 'Mensual',
                'newmoon'       => 'Lluna nova',
                'newmoon_name'  => 'Lluna :moon nova',
                'none'          => 'Cap',
                'year'          => 'Anual',
            ],
        ],
        'resets'    => [
            ''      => 'Cap',
            'month' => 'Mensual',
            'year'  => 'Anual',
        ],
    ],
    'panels'        => [
        'intercalary'   => 'Dies intercalars',
        'leap_year'     => 'Any de traspàs',
        'months'        => 'Mesos',
        'weeks'         => 'Setmanes',
        'years'         => 'Anys amb nom',
    ],
    'parameters'    => [
        'intercalary'   => [
            'length'    => 'Dies de durada',
            'month'     => 'Al final de quin mes',
            'name'      => 'Nom de la intercalació',
        ],
        'month'         => [
            'alias' => 'Àlies del mes',
            'length'=> 'Nombre de dies',
            'name'  => 'Nom del mes',
            'type'  => 'Tipus',
        ],
        'moon'          => [
            'fullmoon'  => 'Lluna plena cada... dies',
            'name'      => 'Nom de la lluna',
            'offset'    => 'Retardament de la primera lluna plena',
        ],
        'seasons'       => [
            'day'   => 'Dia inicial',
            'month' => 'Mes inicial',
            'name'  => 'Nom de l\'estació',
        ],
        'weeks'         => [
            'name'      => 'Nom de la setmana',
            'number'    => 'Número',
        ],
        'year'          => [
            'name'      => 'Nom de l\'any',
            'number'    => 'Any',
        ],
    ],
    'placeholders'  => [
        'colour'            => 'Color',
        'comment'           => 'Aniversari, Festival, Solstici',
        'date'              => 'Data actual',
        'leap_year_amount'  => 'Nombre de dies afegits en un any de traspàs',
        'leap_year_month'   => 'Mes on s\'hi afegeixen els dies',
        'leap_year_offset'  => 'Cada quants anys hi ha un any de traspàs',
        'leap_year_start'   => 'Primer any que és de traspàs',
        'length'            => 'Dies que dura l\'esdeveniment',
        'months'            => 'Nombre de mesos en un any',
        'name'              => 'Nom del calendari',
        'recurring_until'   => 'Últim any recurrent (deixeu-ho buit per a que sigui etern)',
        'seasons'           => 'Nombre d\'estacions',
        'suffix'            => 'Sufix de l\'era actual (AC, BC...)',
        'type'              => 'Tipus de calendari',
        'weekdays'          => 'Nombre de dies de la setmana',
    ],
    'show'          => [
        'description'       => 'Vista detallada del calendari',
        'missing_details'   => 'Aquest calendari no es pot mostrar. Els calendaris necessiten un mínim de 2 mesos i 2 dies setmanals per a renderizar-se correctament.',
        'moon_full_moon'    => 'Lluna :moon plena',
        'moon_new_moon'     => 'Lluna :moon nova',
        'moon_waning_moon'  => 'Lluna :moon minvant',
        'moon_waxing_moon'  => 'Lluna :moon creixent',
        'tabs'              => [
            'events'        => 'Esdeveniments del calendari',
            'information'   => 'Informació',
            'weather'       => 'Clima',
        ],
        'title'             => 'Calendari :name',
    ],
    'sorters'       => [
        'after' => 'D\'avui endavant',
        'before'=> 'Fins avui',
    ],
];
