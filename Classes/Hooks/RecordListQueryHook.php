<?php

declare(strict_types=1);

namespace GeorgRinger\NewsRecurring\Hooks;

/**
 * This file is part of the "news_recurring" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Database\Query\QueryBuilder;

class RecordListQueryHook
{
    public function modifyQuery(array &$parameters,
                                string $table,
                                int $pageId,
                                array $additionalConstraints,
                                array $fieldList,
                                QueryBuilder $queryBuilder): void
    {
        if ($table === 'tx_news_domain_model_news') {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->neq('type', $queryBuilder->createNamedParameter(7, \PDO::PARAM_INT))
            );
        }

    }

}
