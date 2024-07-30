<?php
define("ID_FRONT", (int) get_option('page_on_front'));
const TEMPLATES_DI_STYLE = [
    'PAGES' => [
        'FRONT_PAGE'      => 'front',
        'DEFAULT'         => 'default'
    ],
    'POSTS' => [
        'GAME'      => 'gamePost',
        'DEFAULT'   => 'default'
    ],
    'CATEGORY' => [
        'DEFAULT' => 'default'
    ],
    'TAX' => [
        'DEFAULT' => 'default'
    ]
];