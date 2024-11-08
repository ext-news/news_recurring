<?php

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass'][]
    = \GeorgRinger\NewsRecurring\Hooks\DataHandlerHook::class;

$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/News']['news_recurring'] = 'news_recurring';
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/NewsDefault']['news_recurring'] = 'news_recurring';
