<?php

namespace GeorgRinger\NewsRecurring\Domain\Model;

class News extends \GeorgRinger\News\Domain\Model\News
{

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GeorgRinger\News\Domain\Model\News>
     * @lazy
     */
    protected $recurring;

    /**
     * @var \GeorgRinger\News\Domain\Model\News
     * @lazy
     */
    protected $recurringParent;

    /** @var int */
    protected $recurringOriginal;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getRecurring()
    {
        return $this->recurring;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $recurring
     */
    public function setRecurring($recurring)
    {
        $this->recurring = $recurring;
    }

    /**
     * @return Tx_News_Domain_Model_News
     */
    public function getRecurringParent()
    {
        return $this->recurringParent;
    }

    /**
     * @param Tx_News_Domain_Model_News $recurringParent
     */
    public function setRecurringParent($recurringParent)
    {
        $this->recurringParent = $recurringParent;
    }

    /**
     * @return int
     */
    public function getRecurringOriginal()
    {
        return $this->recurringOriginal;
    }

    /**
     * @param int $recurringOriginal
     */
    public function setRecurringOriginal($recurringOriginal)
    {
        $this->recurringOriginal = $recurringOriginal;
    }
}
