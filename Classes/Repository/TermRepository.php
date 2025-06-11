<?php

declare(strict_types=1);
namespace StraschekIo\Hyphenator\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\QueryBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class TermRepository
{
    public function fetchAll(): ?array
    {
        $queryBuilder = $this->getQueryBuilder();
        $records = $queryBuilder
            ->select('from', 'to')
            ->from('tx_hyphenator_term')
            ->executeQuery()
            ->fetchAllAssociative();

        if (!empty($records)) {
            return $records;
        }

        return null;
    }

    private function getQueryBuilder(): QueryBuilder
    {
        return GeneralUtility::makeInstance(ConnectionPool::class)
                ->getQueryBuilderForTable('tx_hyphenator_term');
    }
}
