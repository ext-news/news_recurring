<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Hook to filter recurring events in the list module
//$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['typo3/class.db_list_extra.inc']['getTable']['news_recurrsing'] =
//    'GeorgRinger\\NewsRecurring\\Hooks\\DatabaseRecordList';
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['TYPO3\\CMS\\Recordlist\\RecordList\\DatabaseRecordList']['buildQueryParameters'][]
    = \GeorgRinger\NewsRecurring\Hooks\RecordListQueryHook::class;

// Xclass Datamapper
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper::class] = [
    'className' => \GeorgRinger\NewsRecurring\Persistence\Generic\Mapper\DataMapper::class
];

$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/News'][] = 'news_recurring';
