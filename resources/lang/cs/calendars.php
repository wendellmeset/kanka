<?php

return [
    'actions'       => [
        'add_epoch'         => 'Přidat epochu',
        'add_intercalary'   => 'Přidat přestupné dny',
        'add_month'         => 'Přidat kalendářní měsíc',
        'add_moon'          => 'Přidat planetární měsíc',
        'add_reminder'      => 'Přidat připomínku',
        'add_season'        => 'Přidat roční období',
        'add_weather'       => 'Nastavit projev počasí',
        'add_week'          => 'Přidat týden',
        'add_weekday'       => 'Přidat den týdne',
        'add_year'          => 'Přidat název roku',
        'set_today'         => 'Nastavit dnešní den',
        'today'             => 'Dnes',
    ],
    'checkboxes'    => [
        'is_recurring'  => 'Opakuje se ročně',
    ],
    'create'        => [
        'description'   => 'Vytvořit nový kalendář',
        'success'       => 'Kalendář \':name\' vytvořen',
        'title'         => 'Nový kalendář',
    ],
    'destroy'       => [
        'success'   => 'Kalendář \':name\' odstraněn',
    ],
    'edit'          => [
        'description'   => 'Upravit kalendář',
        'success'       => 'Kalendář \':name\' upraven',
        'title'         => 'Upravit kalendář \':name\'',
        'today'         => 'Datum kalendáře upraveno',
    ],
    'event'         => [
        'actions'   => [
            'existing'  => 'Existující objekt',
            'new'       => 'Nová událost',
            'switch'    => 'Změnit výběr',
        ],
        'create'    => [
            'description'   => 'Vytvořit novou událost',
            'success'       => 'Nová událost vytvořena',
            'title'         => 'Přidat událost do :name',
        ],
        'destroy'   => 'Událost z kalendáře \':name\' odstraněna',
        'edit'      => [
            'description'   => 'Upravit událost',
            'success'       => 'Událost upravena',
            'title'         => 'Upravit událost kalendáře :name',
        ],
        'helpers'   => [
            'add'               => 'Přidat existující událost do tohoto kalendáře',
            'new'               => 'Nebo vytvořit novou událost zadáním názvu',
            'other_calendar'    => 'Upravujete připomínku kalendáře :calendar',
        ],
        'modal'     => [
            'title' => 'Přidat událost do kalendáře',
        ],
        'success'   => 'Událost \':event\' přidána do kalendáře',
    ],
    'events'        => [
        'description'   => 'Události v tomto kalendáři',
        'title'         => 'Události kalendáře :name',
    ],
    'fields'        => [
        'calendar'              => 'Nadřazený kalendář',
        'calendars'             => 'Kalendáře',
        'colour'                => 'Barva',
        'comment'               => 'Komentář',
        'current_day'           => 'Současný den',
        'current_month'         => 'Současný měsíc',
        'current_year'          => 'Současný rok',
        'date'                  => 'Současné datum',
        'has_leap_year'         => 'Obsahuje přestupné roky',
        'intercalary'           => 'Přestupné dny',
        'is_incrementing'       => 'Živý kalendář',
        'is_recurring'          => 'Opakující se',
        'leap_year_amount'      => 'Přidat dny',
        'leap_year_month'       => 'Kalendářní měsíc',
        'leap_year_offset'      => 'Každých',
        'leap_year_start'       => 'Přestupný rok',
        'length'                => 'Trvání události',
        'length_days'           => '{1} :count den|[2,4] :count dny|[5,*] :count dní',
        'months'                => 'Kalendářní měsíce',
        'moons'                 => 'Planetární měsíce',
        'name'                  => 'Název',
        'parameters'            => 'Parametry',
        'recurring_periodicity' => 'Opakování',
        'recurring_until'       => 'Opakování do roku',
        'reset'                 => 'Týden od začátku',
        'seasons'               => 'Roční období',
        'start_offset'          => 'Posun prvního dne týdne',
        'suffix'                => 'Přípona',
        'type'                  => 'Typ',
        'week_names'            => 'Názvy týdnů',
        'weekdays'              => 'Názvy dnů v týdnu',
    ],
    'helpers'       => [
        'month_type'    => 'Přestupné měsíce souvisí s oběhem měsíců a ročními obdobími, ale nerespektují dny v týdnu.',
        'nested_parent' => 'Zobrazuje kalendáře, podřazené kalendáři :parent',
        'nested_without'=> 'Kalendáře, které nemají nadřazený kalendář (jsou na vrcholu stromu kalendářů). Klepnutím na řádek se zobrazí podřazené kalendáře.',
        'start_offset'  => 'V roce 0 kalendář obvykle začíná prvním dnem týdne. Tato hodnota ovlivňuje, který den týdne připadne na první den kalendáře',
    ],
    'hints'         => [
        'event_length'      => 'Doba trvání události. Událost nemůže trvat déle než dva měsíce.',
        'intercalary'       => 'Dny, které nezapadají do pravidelných měsíců a týdnů. Souvisí s oběhem planetárních měsíců a nerespektují dny v týdnu.',
        'is_incrementing'   => 'Živé kalendáře automaticky přejdou na další den o půlnoci Greenwichského času.',
        'is_recurring'      => 'Událost se může opakovat. Bude se zobrazovat ve stejný den každého roku.',
        'months'            => 'Rok musí obsahovat alespoň dva kalendářní měsíce.',
        'moons'             => 'V kalendáři se bude zobrazovat úplněk a nov každého měsíce. Při době oběhu delší než 10 dní se budou zobrazovat také čtvrtiny periody - nárůst a ubývání.',
        'parent_calendar'   => 'V kalendáři se zobrazují připomínky a projevy počasí případného nadřazeného kalendáře.',
        'reset'             => 'Každý měsíc i rok začíná prvním dnem týdne.',
        'seasons'           => 'Roční období se určuje jejich počátkem.',
        'weekdays'          => 'Názvy dnů v týdnu. Týden musí obsahovat alespoň dva dny.',
        'weeks'             => 'Názvy důležitých týdnů kalendáře.',
        'years'             => 'Názvy důležitých roků kalendáře.',
    ],
    'index'         => [
        'add'           => 'Nový kalendář',
        'description'   => 'Upravit kalendáře :name.',
        'header'        => 'Kalendáře :name',
        'title'         => 'Kalendáře',
    ],
    'layouts'       => [
        'month' => 'Kalendářní měsíc',
        'year'  => 'Rok',
    ],
    'modals'        => [
        'switcher'  => [
            'title' => 'Přepínač roku',
        ],
    ],
    'month_types'   => [
        'intercalary'   => 'Přestupný',
        'standard'      => 'Běžný',
    ],
    'options'       => [
        'events'    => [
            'recurring_periodicity' => [
                'fullmoon'      => 'Úplněk',
                'fullmoon_name' => 'Úplněk měsíce :moon',
                'month'         => 'Měsíčně',
                'newmoon'       => 'Nov',
                'newmoon_name'  => 'Nov měsíce :moon',
                'none'          => 'Žádné',
                'unnamed_moon'  => 'Měsíc číslo :number',
                'year'          => 'Ročně',
            ],
        ],
        'resets'    => [
            ''      => 'Žádné',
            'month' => 'Měsíčně',
            'year'  => 'Ročně',
        ],
    ],
    'panels'        => [
        'intercalary'   => 'Přestupné dny',
        'leap_year'     => 'Přestupný rok',
        'months'        => 'Kalendářní měsíce',
        'weeks'         => 'Týdny',
        'years'         => 'Pojmenované roky',
    ],
    'parameters'    => [
        'intercalary'   => [
            'length'    => 'Trvání ve dnech',
            'month'     => 'Na konci kterého měsíce',
            'name'      => 'Název přestupného období',
        ],
        'month'         => [
            'alias' => 'Zkratka kalendářního měsíce',
            'length'=> 'Počet dní',
            'name'  => 'Název kalendářního měsíce',
            'type'  => 'Typ',
        ],
        'moon'          => [
            'fullmoon'  => 'Doba oběhu (dny)',
            'name'      => 'Název planetárního měsíce',
            'offset'    => 'Posun prvního den úplňku',
        ],
        'seasons'       => [
            'day'   => 'První den období',
            'month' => 'První měsíc období',
            'name'  => 'Název ročního období',
        ],
        'weeks'         => [
            'name'      => 'Název týdne',
            'number'    => 'Číslo týdne',
        ],
        'year'          => [
            'name'      => 'Název roku',
            'number'    => 'Číslo roku',
        ],
    ],
    'placeholders'  => [
        'colour'            => 'Barva',
        'comment'           => 'Narozeniny, oslava, slunovrat',
        'date'              => 'Dnešní datum',
        'leap_year_amount'  => 'Počet přidaných dní přestupného roku',
        'leap_year_month'   => 'Měsíc, ve kterém se přidávají dny přestupného roku',
        'leap_year_offset'  => 'Po kolika letech se opakuje přestupný rok',
        'leap_year_start'   => 'První přestupný rok',
        'length'            => 'Trvání události ve dnech',
        'months'            => 'Počet měsíců v roku',
        'name'              => 'Název kalendáře',
        'recurring_until'   => 'Poslední rok opakování (pokud zůstane prázdné, opakuje se stále)',
        'seasons'           => 'Počet ročních období',
        'suffix'            => 'Přípona současné éry (LP, n.l., př.n.l.)',
        'type'              => 'Typ kalendáře',
        'weekdays'          => 'Počet dní v týdnu',
    ],
    'show'          => [
        'description'       => 'Detailní zobrazení kalendáře',
        'missing_details'   => 'Kalendář nelze použít. Kalendář musí obsahovat alespoň 2 měsíce a každý týden musí zahrnovat alespoň 2 dny.',
        'moon_full_moon'    => 'Úplněk měsíce :moon',
        'moon_new_moon'     => 'Nov měsíce :moon',
        'moon_waning_moon'  => 'Ubývání měsíce :moon',
        'moon_waxing_moon'  => 'Nárůst měsíce :moon',
        'tabs'              => [
            'events'        => 'Připomínky',
            'information'   => 'Informace',
            'weather'       => 'Počasí',
        ],
        'title'             => 'Kalendář :name',
    ],
    'sorters'       => [
        'after' => 'Ode dneška dále',
        'before'=> 'Dodnes',
    ],
];
