<?php

namespace GeorgRinger\NewsRecurring\Domain\Model;

class News extends \GeorgRinger\News\Domain\Model\News
{
    /** @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GeorgRinger\News\Domain\Model\News> */
    #[\TYPO3\CMS\Extbase\Annotation\ORM\Lazy]
    protected $recurring;

    /**
     * @var \GeorgRinger\News\Domain\Model\News
     */
    protected $recurringParent;

    /** @var int */
    protected $recurringOriginal = 0;

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
     * @return \GeorgRinger\News\Domain\Model\News
     */
    public function getRecurringParent()
    {
        return $this->recurringParent;
    }

    /**
     * @param \GeorgRinger\News\Domain\Model\News $recurringParent
     */
    public function setRecurringParent($recurringParent)
    {
        $this->recurringParent = $recurringParent;
    }

    /**
     * @return int
     */
    public function getRecurringOriginal(): int
    {
        return $this->recurringOriginal;
    }

    /**
     * @param int $recurringOriginal
     */
    public function setRecurringOriginal(int $recurringOriginal)
    {
        $this->recurringOriginal = $recurringOriginal;
    }
}
