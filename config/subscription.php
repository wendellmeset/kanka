<?php
/**
 * Description of
 *
 * @author Jeremy Payne hello@kanka.io
 * 24/04/2020
 */

return [
    'owlbear' => [
        'eur' => [
            'monthly' => env('STRIPE_OWLBEAR_EUR'),
            'yearly' => env('STRIPE_OWLBEAR_EUR_YEARLY'),
        ],
        'usd' => [
            'monthly' => env('STRIPE_OWLBEAR_USD'),
            'yearly' => env('STRIPE_OWLBEAR_USD_YEARLY')
        ],
        'monthly' => [
            env('STRIPE_OWLBEAR_EUR'),
            env('STRIPE_OWLBEAR_USD'),
        ],
        'yearly' => [
            env('STRIPE_OWLBEAR_EUR_YEARLY'),
            env('STRIPE_OWLBEAR_USD_YEARLY'),
        ],
    ],
    'wyvern' => [
        'eur' => [
            'monthly' => env('STRIPE_WYVERN_EUR'),
            'yearly' => env('STRIPE_WYVERN_EUR_YEARLY'),
        ],
        'usd' => [
            'monthly' => env('STRIPE_WYVERN_USD'),
            'yearly' => env('STRIPE_WYVERN_USD_YEARLY')
        ],
        'monthly' => [
            env('STRIPE_WYVERN_EUR'),
            env('STRIPE_WYVERN_USD'),
        ],
        'yearly' => [
            env('STRIPE_WYVERN_EUR_YEARLY'),
            env('STRIPE_WYVERN_USD_YEARLY'),
        ],
    ],
    'elemental' => [
        'eur' => [
            'monthly' => env('STRIPE_ELEMENTAL_EUR'),
            'yearly' => env('STRIPE_ELEMENTAL_EUR_YEARLY'),
        ],
        'usd' => [
            'monthly' => env('STRIPE_ELEMENTAL_USD'),
            'yearly' => env('STRIPE_ELEMENTAL_USD_YEARLY')
        ],
        'monthly' => [
            env('STRIPE_ELEMENTAL_EUR'),
            env('STRIPE_ELEMENTAL_USD'),
        ],
        'yearly' => [
            env('STRIPE_ELEMENTAL_EUR_YEARLY'),
            env('STRIPE_ELEMENTAL_USD_YEARLY'),
        ],
    ],

    'premium' => [
        'eur' => [
            'monthly' => env('STRIPE_PREMIUM_USD'),
        ],
        'usd' => [
            'monthly' => env('STRIPE_PREMIUM_USD')
        ],
    ],
];
