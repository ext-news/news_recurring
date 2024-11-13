<?php

$columns = [
    'recurring_parent' => [
        'label'  => 'recurring_parent',
        'config' => [
            'type'         => 'group',
            'allowed'      => 'tx_news_domain_model_news',
            'table'        => 'tx_news_domain_model_news',
            'relationship' => 'manyToOne',
        ],
    ],
    'recurring_original' => [
        'label'  => 'recurring_original',
        'config' => [
            'type' => 'passthrough',
        ],
    ],
    'recurring' => [
        'exclude'   => true,
        'l10n_mode' => 'mergeIfNotBlank',
        'label'     => 'LLL:EXT:news_recurring/Resources/Private/Language/locallang_db.xlf:tx_news_domain_model_news.recurring',
        'config'    => [
            'type'             => 'inline',
            'allowed'          => 'tx_news_domain_model_news',
            'foreign_table'    => 'tx_news_domain_model_news',
            'foreign_sortby'   => 'sorting',
            'foreign_field'    => 'recurring_parent',
            'relationship'     => 'oneToMany',
            'overrideChildTca' => [
                'columns' => [
                    'type' => [
                        'config' => [
                            'default' => 7,
                        ],
                    ],
                ],
            ],
            'size'       => 5,
            'minitems'   => 0,
            'maxitems'   => 100,
            'appearance' => [
                'collapseAll'                     => 1,
                'expandSingle'                    => 1,
                'levelLinksPosition'              => 'bottom',
                'useSortable'                     => 1,
                'showPossibleLocalizationRecords' => 1,
                'showRemovedLocalizationRecords'  => 1,
                'showAllLocalizationLink'         => 1,
                'showSynchronizationLink'         => 1,
                'enabledControls'                 => [
                    'info' => false,
                ],
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $columns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'recurring', '', 'after:datetime');

$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['type']['config']['items'][] = ['label' => 'Recurring', 'value' => 7];

$GLOBALS['TCA']['tx_news_domain_model_news']['types'][7] = [
    'showitem' => 'l10n_parent, l10n_diffsource,type,datetime',
];

$GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['formattedLabel_userFunc'] = \GeorgRinger\NewsRecurring\Hooks\Label::class.'->getNewsLabel';
$GLOBALS['TCA']['tx_news_domain_model_news']['ctrl']['formattedLabel_userFunc_options'] = [
    'tx_news_domain_model_news' => [
        'title',
        'datetime',
        'type',
    ],
];
