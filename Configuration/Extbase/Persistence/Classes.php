<?php

declare(strict_types=1);

return [
    \GeorgRinger\News\Domain\Model\News::class => [
        'tableName'  => 'tx_news_domain_model_news',
        'subclasses' => [
            7 => \GeorgRinger\NewsRecurring\Domain\Model\News::class,
        ],
    ],
    \GeorgRinger\NewsRecurring\Domain\Model\News::class => [
        'tableName'  => 'tx_news_domain_model_news',
        'recordType' => 7,
    ],
];
