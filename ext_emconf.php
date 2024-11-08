<?php

$EM_CONF[$_EXTKEY] = [
    'title'        => 'News recurring',
    'description'  => 'Recurring news',
    'category'     => 'fe',
    'author'       => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state'        => 'beta',
    'version'      => '4.0.0',
    'constraints'  => [
        'depends' => [
            'typo3' => '12.4.0-13.4.99',
            'news'  => '12.0.0-12.99.99',
        ],
        'conflicts' => [],
        'suggests'  => [],
    ],
    'suggests' => [],
];
