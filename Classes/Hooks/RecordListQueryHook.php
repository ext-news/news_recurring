<?php

namespace GeorgRinger\NewsRecurring\Hooks;

/**
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Recordlist\RecordList\AbstractDatabaseRecordList;

/**
 * Hook into DatabaseRecordList to hide tt_content elements in list view
 */
class RecordListQueryHook
{

    /**
     * @param array $parameters
     * @param string $table
     * @param int $pageId
     * @param array $additionalConstraints
     * @param array $fieldList
     * @param AbstractDatabaseRecordList $parentObject
     */
    public function buildQueryParametersPostProcess(
        array &$parameters,
        string $table,
        int $pageId,
        array $additionalConstraints,
        array $fieldList,
        AbstractDatabaseRecordList $parentObject
    )
    {
        if ($table === 'tx_news_domain_model_news') {
            $parameters['where'][] = 'type != 7';
        }
    }
}
