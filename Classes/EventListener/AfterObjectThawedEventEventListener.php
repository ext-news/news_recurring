<?php

declare(strict_types=1);

namespace GeorgRinger\NewsRecurring\EventListener;

use GeorgRinger\NewsRecurring\Domain\Model\News;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Event\Persistence\AfterObjectThawedEvent;

final class AfterObjectThawedEventEventListener
{
    protected string $fallbackSkippedFields = 'uid,tstamp,crdate,datetime';

    public function __invoke(AfterObjectThawedEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof News && $object->getType() === '7') {
            $this->overlay($object);
        }
    }

    private function overlay(News $news): void
    {
        $original = clone $news;
        /** @var News $parent */
        $parent = $news->getRecurringParent();
        if ($parent === null) {
            return;
        }

        $skippedFields = $this->fallbackSkippedFields;

        try {
            $extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
            $keptFields = $extensionConfiguration->get('news_recurring', 'skippedFields');
            if ($keptFields) {
                $skippedFields = $keptFields;
            }
        } catch (\Exception $e) {
            // do nothing
        }
        $skippedFieldList = GeneralUtility::trimExplode(',', $skippedFields, true);

        foreach ($parent->_getProperties() as $field => $value) {
            if (in_array($field, $skippedFieldList, true)) {
                continue;
            }
            $news->_setProperty($field, $value);
        }

        $news->setRecurringParent($parent);
        $news->setRecurringOriginal($original->getUid());
    }
}
