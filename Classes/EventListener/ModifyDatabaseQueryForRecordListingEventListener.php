<?php

declare(strict_types=1);

namespace GeorgRinger\NewsRecurring\EventListener;

use TYPO3\CMS\Backend\View\Event\ModifyDatabaseQueryForRecordListingEvent;
use TYPO3\CMS\Core\Database\Connection;

final class ModifyDatabaseQueryForRecordListingEventListener
{
    public function __invoke(ModifyDatabaseQueryForRecordListingEvent $event)
    {
        if ($event->getTable() === 'tx_news_domain_model_news') {
            $event->getQueryBuilder()->andWhere(
                $event->getQueryBuilder()->expr()->neq('type', $event->getQueryBuilder()->createNamedParameter(7, Connection::PARAM_STR))
            );
        }
    }
}
