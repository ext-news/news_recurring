<?php

namespace GeorgRinger\NewsRecurring\Persistence\Generic\Mapper;

/**
 * This file is part of the "news" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */
use GeorgRinger\NewsRecurring\Domain\Model\News;

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

            $object = $this->createEmptyObject($className);
            $this->persistenceSession->registerObject($object, $row['uid']);
            $parentRow = $this->overlayRow($parentRow, $row);
            $this->thawProperties($object, $parentRow);
            $this->emitAfterMappingSingleRow($object);
            $object->_memorizeCleanState();
            $this->persistenceSession->registerReconstitutedEntity($object);

            return $object;
        } else {
            return parent::mapSingleRow($className, $row);
        }
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
        return $GLOBALS['TYPO3_DB']->exec_SELECTgetSingleRow('*', 'tx_news_domain_model_news', 'uid=' . (int)$uid);
    }
}
