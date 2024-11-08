<?php

namespace GeorgRinger\NewsRecurring\Hooks;

use TYPO3\CMS\Backend\Utility\BackendUtility;

/**
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * Class Label.
 */
class Label
{
    /**
     * @param array $params
     *
     * @return void
     */
    public function getNewsLabel(array &$params)
    {
        $type = (is_array($params['row']['type'])) ? $params['row']['type'][0] : $params['row']['type'];
        if ((int) $type === 7) {
            $date = (int) $params['row']['datetime'] > 0 ? $params['row']['datetime'] : $GLOBALS['EXEC_TIME'];

            $params['title'] = BackendUtility::datetime($date);
        } else {
            $params['title'] = $params['row']['title'];
        }
    }
}
