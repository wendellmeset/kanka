<?php

return [
    'actions'       => [
        'add_epoch'         => 'Pridať epochu',
        'add_intercalary'   => 'Pridať priestupný deň',
        'add_month'         => 'Pridať kalendárny mesiac',
        'add_moon'          => 'Pridať družicu',
        'add_reminder'      => 'Pridať pripomienku',
        'add_season'        => 'Pridať ročné obdobie',
        'add_weather'       => 'Nastaviť efekt počasia',
        'add_week'          => 'Pridať týždeň',
        'add_weekday'       => 'Pridať deň týždňa',
        'add_year'          => 'Pridať názov roka',
        'set_today'         => 'Nastaviť aktuálny deň',
        'today'             => 'Dnes',
    ],
    'checkboxes'    => [
        'is_recurring'  => 'Opakuje sa ročne',
    ],
    'create'        => [
        'description'   => 'Vytvoriť nový kalendár',
        'success'       => 'Kalendár ":name" vytvorený.',
        'title'         => 'Nový kalendár',
    ],
    'destroy'       => [
        'success'   => 'Kalendár ":name" odstránený.',
    ],
    'edit'          => [
        'description'   => 'Upraviť kalendár',
        'success'       => 'Kalendár ":name" upravený.',
        'title'         => 'Upraviť kalendár :name',
        'today'         => 'Kalendárny dátum upravený.',
    ],
    'event'         => [
        'actions'   => [
            'existing'  => 'Existujúci objekt',
            'new'       => 'Nová udalosť',
            'switch'    => 'Zmeniť výber',
        ],
        'create'    => [
            'description'   => 'Vytvoriť novú udalosť',
            'success'       => 'Nová udalosť vytvorená',
            'title'         => 'Pridať udalosť do :name',
        ],
        'destroy'   => 'Udalosť z kalendára ":name" odstránená.',
        'edit'      => [
            'description'   => 'Upraviť udalosť',
            'success'       => 'Udalosť upravená',
            'title'         => 'Upraviť udalosť v :name',
        ],
        'helpers'   => [
            'add'               => 'Pridať existujúcu udalosť do tohto kalendára.',
            'new'               => 'Alebo vytvoriť novú udalosť zadaním jej názvu.',
            'other_calendar'    => 'Upravuješ pripomienku, ktorá je v kalendári :calendar.',
        ],
        'modal'     => [
            'title' => 'Pridať udalosť do kalendára',
        ],
        'success'   => 'Udalosť ":event" pridaná do kalendára.',
    ],
    'events'        => [
        'description'   => 'Udalosti v tomto kalendári.',
        'title'         => 'Udalosti kalendára :name',
    ],
    'fields'        => [
        'calendar'              => 'Nadradený kalendár',
        'calendars'             => 'Kalendáre',
        'colour'                => 'Farba',
        'comment'               => 'Komentár',
        'current_day'           => 'Aktuálny deň',
        'current_month'         => 'Aktuálny mesiac',
        'current_year'          => 'Aktuálny rok',
        'date'                  => 'Aktuálny dátum',
        'has_leap_year'         => 'Má priestupné roky',
        'intercalary'           => 'Priestupné dni',
        'is_incrementing'       => 'Narastajúce dni',
        'is_recurring'          => 'Opakujúce',
        'leap_year_amount'      => 'Pridať dni',
        'leap_year_month'       => 'Mesiac',
        'leap_year_offset'      => 'Každý',
        'leap_year_start'       => 'Priestupný rok',
        'length'                => 'Dĺžka udalosti',
        'length_days'           => ':count deň|:count dní',
        'months'                => 'Mesiace',
        'moons'                 => 'Družice',
        'name'                  => 'Názov',
        'parameters'            => 'Parametre',
        'recurring_periodicity' => 'Periodicita opakovania',
        'recurring_until'       => 'Opakujúce sa do roku',
        'reset'                 => 'Týždenný reset',
        'seasons'               => 'Ročné obdobia',
        'start_offset'          => 'Posun prvého dňa',
        'suffix'                => 'Prípona',
        'type'                  => 'Typ',
        'week_names'            => 'Názvy týždňov',
        'weekdays'              => 'Dni v týždni',
    ],
    'helpers'       => [
        'month_type'    => 'Priestupné mesiace nepoužívajú dni v týždni, ale ovplyvňujú družice a ročné obdobia.',
        'nested'        => 'Najprv sa zobrazujú kalendáre nepodradené žiadnemu inému kalendáru. Klikni na kalendár, aby sa zobrazili podradené kalendáre.',
        'nested_parent' => 'Zobraziť kalendáre :parent.',
        'nested_without'=> 'Zobraziť všetky kalendáre, ktoré nemajú nadradený kalendár. Kliknutím na riadok zobrazíš podradené kalendáre.',
        'start_offset'  => 'Štandardne začína kalendár prvý deň v týždni v roku 0. Nastavenie tejto hodnoty ovplyvňuje, na ktorý deň v kalendári pripadne prvý deň.',
    ],
    'hints'         => [
        'event_length'      => 'Ako dlho má trvať daná udalosť. Udalosť nemôže trvať dlhšie ako dva mesiace.',
        'intercalary'       => 'Dni, ktoré spadajú mimo štandardné mesiace a týždne. Neovplyvňujú dni v týždni, ale ovplyvňujú cykly družíc.',
        'is_incrementing'   => 'Narastajúci kalendár automaticky posunie aktuálny deň o 00:00 UTC.',
        'is_recurring'      => 'Udalosť je možné nastaviť ako opakujúcu sa. Bude sa následne zobrazovať každý rok v ten istý deň.',
        'months'            => 'Kalendár by mal mať min. 2 mesiace.',
        'moons'             => 'Pridané družice sa zobrazia v kalendári počas ich splnu.',
        'parent_calendar'   => 'Ak kalendáru priradíš nadradený kalendár, priradíš mu aj pripomienky a efekty počasia z tohto nadradeného kalendáru.',
        'reset'             => 'Začiatok mesiaca alebo roku začína stále na prvom dni týždňa.',
        'seasons'           => 'Vytvor v tvojom kalendári ročné obdobia tým, že označíš, kedy sa začínajú. O ostatné sa už postará Kanka.',
        'weekdays'          => 'Nastav názvy tvojich dní v týždni. Podmienkou je pridanie min. 2 dní v týždni.',
        'weeks'             => 'Definuj názvy pre najdôležitejšie týždne v tvojom kalendári.',
        'years'             => 'Niektoré roky sú tak dôležité, že dostali vlastné pomenovanie.',
    ],
    'index'         => [
        'add'           => 'Nový kalendár',
        'description'   => 'Spravovať kalendár :name.',
        'header'        => 'Kalendár :name',
        'title'         => 'Kalendáre',
    ],
    'layouts'       => [
        'month' => 'Mesiac',
        'year'  => 'Rok',
    ],
    'modals'        => [
        'switcher'  => [
            'title' => 'Prepínač roku',
        ],
    ],
    'month_types'   => [
        'intercalary'   => 'Priestupný',
        'standard'      => 'Štandardný',
    ],
    'options'       => [
        'events'    => [
            'recurring_periodicity' => [
                'fullmoon'      => 'Spln',
                'fullmoon_name' => 'Spln :moon',
                'month'         => 'Mesačne',
                'newmoon'       => 'Nov',
                'newmoon_name'  => 'Nov :moon',
                'none'          => 'Žiadna',
                'year'          => 'Ročne',
            ],
        ],
        'resets'    => [
            ''      => 'Žiadne',
            'month' => 'Mesačne',
            'year'  => 'Ročne',
        ],
    ],
    'panels'        => [
        'intercalary'   => 'Priestupné dni',
        'leap_year'     => 'Priestupný rok',
        'months'        => 'Mesiace',
        'weeks'         => 'Týždne',
        'years'         => 'Pomenované roky',
    ],
    'parameters'    => [
        'intercalary'   => [
            'length'    => 'Trvanie v dňoch',
            'month'     => 'Na konci ktorého mesiaca',
            'name'      => 'Názov priestupného mesiaca',
        ],
        'month'         => [
            'alias' => 'Skratka mesiaca',
            'length'=> 'Počet dní',
            'name'  => 'Názov mesiaca',
            'type'  => 'Typ',
        ],
        'moon'          => [
            'fullmoon'  => 'Spln každých (dní)',
            'name'      => 'Názov družice',
            'offset'    => 'Deň prvého splnu',
        ],
        'seasons'       => [
            'day'   => 'Prvý deň',
            'month' => 'Prvý mesiac',
            'name'  => 'Názov ročného obdobia',
        ],
        'weeks'         => [
            'name'      => 'Názov týždňa',
            'number'    => 'Číslo',
        ],
        'year'          => [
            'name'      => 'Názov roku',
            'number'    => 'Rok',
        ],
    ],
    'placeholders'  => [
        'colour'            => 'Farba',
        'comment'           => 'Deň narodenia, festival, slnovrat',
        'date'              => 'Aktuálny dátum',
        'leap_year_amount'  => 'Počet dní pridaných v priestupnom roku',
        'leap_year_month'   => 'Mesiac, do ktorého budú pridané',
        'leap_year_offset'  => 'Každých koľko rokov sa opakuje priestupný rok',
        'leap_year_start'   => 'Prvý rok, ktorý je priestupný',
        'length'            => 'Dĺžka udalosti v dňoch',
        'months'            => 'Počet mesiacov v roku',
        'name'              => 'Názov kalendára',
        'recurring_until'   => 'Posledný rok opakovania (ponechať prázdne pre opakovanie donekonečna)',
        'seasons'           => 'Počet ročných období',
        'suffix'            => 'Prípona aktuálnej éry (pnl., nl.)',
        'type'              => 'Typ kalendára',
        'weekdays'          => 'Počet dní v týždni',
    ],
    'show'          => [
        'description'       => 'Detailné zobrazenie kalendára',
        'missing_details'   => 'Tento kalendár nie je možné zobraziť. Kalendár vyžaduje min. 2 mesiace a min. 2 dni v týždni, aby bol vytvorený.',
        'moon_full_moon'    => 'Spln :moon',
        'moon_new_moon'     => 'Nov :moon',
        'moon_waning_moon'  => 'Ubúdajúci :moon',
        'moon_waxing_moon'  => 'Pribúdajúci :moon',
        'tabs'              => [
            'events'        => 'Kalendárne udalosti',
            'information'   => 'Informácia',
            'weather'       => 'Počasie',
        ],
        'title'             => 'Kalendár :name',
    ],
    'sorters'       => [
        'after' => 'Dnes a potom',
        'before'=> 'Dnes a predtým',
    ],
];
