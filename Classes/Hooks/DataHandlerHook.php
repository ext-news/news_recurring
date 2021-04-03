<?php

namespace GeorgRinger\NewsRecurring\Hooks;

use TYPO3\CMS\Core\DataHandling\DataHandler;

/**
 * This file is part of the "news_recurring" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * Copy values to recurring news
 */
class DataHandlerHook
{

    protected $copyField = ['categories'];

    public function processDatamap_beforeStart(DataHandler $dataHandler)
    {
        if (!isset($dataHandler->datamap['tx_news_domain_model_news'])) {
            return;
        }
        foreach ($dataHandler->datamap['tx_news_domain_model_news'] as $id => $singleRecord) {
            if ((string)$singleRecord['type'] !== '0' || empty($singleRecord['recurring'])) {
                continue;
            }

            $recurringRows = explode(',', $singleRecord['recurring']);
            foreach ($recurringRows as $recurringRow) {
                foreach ($this->copyField as $copyField) {
                    if (isset($singleRecord[$copyField]) && isset($dataHandler->datamap['tx_news_domain_model_news'][$recurringRow])) {
                        $dataHandler->datamap['tx_news_domain_model_news'][$recurringRow][$copyField] = $singleRecord[$copyField];
                    }
                }
            }
        }
    }

}
