<?php

defined('TYPO3_MODE') or die();

// Hook to filter recurring events in the list module
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList::class]['modifyQuery'][]
    = \GeorgRinger\NewsRecurring\Hooks\RecordListQueryHook::class;

// Xclass Datamapper
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper::class] = [
    'className' => \GeorgRinger\NewsRecurring\Persistence\Generic\Mapper\DataMapper::class
];

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][]
    = \GeorgRinger\NewsRecurring\Hooks\DataHandlerHook::class;

$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/News'][] = 'news_recurring';
