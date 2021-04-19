<?php

namespace GeorgRinger\NewsRecurring\Persistence\Generic\Mapper;

/**
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use GeorgRinger\NewsRecurring\Domain\Model\News;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Event\Persistence\AfterObjectThawedEvent;

/**
 * Class DataMapper
 */
class DataMapper extends \TYPO3\CMS\Extbase\Persistence\Generic\Mapper\DataMapper
{

    /**
     * Fields which needs to be from the original record
     *
     * @var array
     */
    protected $overlaidFields = ['type', 'datetime', 'recurring_parent'];

    /**
     * Maps a single row on an object of the given class
     *
     * @param string $className The name of the target class
     * @param array $row A single array with field_name => value pairs
     * @return object An object of the given class
     */
    protected function mapSingleRow($className, array $row)
    {
        if ($className === News::class) {
            $parentRow = $this->getParentRow($row['recurring_parent']);

            if ($this->persistenceSession->hasIdentifier($row['uid'], $className)) {
                $object = $this->persistenceSession->getObjectByIdentifier($row['uid'], $className);
            } else {
                $object = $this->createEmptyObject($className);
                $this->persistenceSession->registerObject($object, $row['uid']);
                $parentRow = $this->overlayRow($parentRow, $row);
                $this->thawProperties($object, $parentRow);
                $event = new AfterObjectThawedEvent($object, $row);
                $this->eventDispatcher->dispatch($event);
                $object->_memorizeCleanState();
                $this->persistenceSession->registerReconstitutedEntity($object);
            }

            return $object;
        }
        return parent::mapSingleRow($className, $row);
    }

    /**
     * Overlay record with fields which need to be from the recurring row itself
     *
     * @param array $parent parent row
     * @param array $original current row
     * @return array modified parent row
     */
    protected function overlayRow(array $parent, array $original)
    {
        foreach ($this->overlaidFields as $fieldName) {
            $parent[$fieldName] = $original[$fieldName];
        }

        try {
            $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
            $keptFields = GeneralUtility::trimExplode(',', $extensionConfiguration->get('news_recurring', 'keptFields'), true);
            if ($keptFields) {
                foreach ($keptFields as $fieldName) {
                    $parent[$fieldName] = $original[$fieldName];
                }
            }
        } catch (\Exception $e) {
            // do nothing
        }
        $parent['recurring_original'] = $original['uid'];

        return $parent;
    }

    /**
     * Get the parent row
     *
     * @param int $uid
     * @return array
     */
    protected function getParentRow($uid)
    {
        return BackendUtility::getRecord('tx_news_domain_model_news', $uid);
    }
}
