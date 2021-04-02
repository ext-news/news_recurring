<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'News recurring',
    'description' => 'Recurring news',
    'category' => 'fe',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state' => 'alpha',
    'clearCacheOnLoad' => true,
    'version' => '3.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-11.1.99',
            'news' => '8.4.0-9.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'suggests' => [],
];
